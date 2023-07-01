<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class KanbanController extends Controller
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
        return view("kanban.index", [
            "title" => "Kanban App",
            'tasks' => $this->taskRepository->index()->latest('updated_at')->filter(request(["status", "search"]))->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->taskRepository->update_quantity($request, $id);

        return redirect()->back()->with("update_task_success", "task $request->title has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
