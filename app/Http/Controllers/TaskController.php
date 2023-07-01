<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.kanban.index", [
            "title" => "Kanban",
            "tasks" => $this->taskRepository->index()->latest('updated_at')->filter(request(["status", "search"]))->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.kanban.create", [
            "title" => "Create Task"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->taskRepository->store($request);

        return redirect('dashboard/kanban')->with("task_success", "$request->title has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("dashboard.kanban.show", [
            "title" => "Detail Task",
            "task" => $this->taskRepository->index()->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("dashboard.kanban.edit", [
            "title" => "Edit Task",
            "task" => $this->taskRepository->index()->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->taskRepository->update($request, $id);

        return redirect("dashboard/kanban/$id")->with("update_success", "$request->title has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->taskRepository->index()->find($id)->delete();

        return redirect("dashboard/kanban")->with("delete_success", "Task has been deleted");
    }
}
