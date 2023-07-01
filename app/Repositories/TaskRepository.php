<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function index()
    {
        $kanban = new Task();
        return $kanban;
    }

    public function store($request)
    {
        $validated_data = $request->validate([
            "title" => "required",
            "assigned" => "required",
            "target_quantity" => "required",
            "deadline" => "required",
            "description" => "required"
        ]);

        Task::create($validated_data);
    }

    public function update($request, $id)
    {
        $validated_data = $request->validate([
            "title" => "required",
            "assigned" => "required",
            "target_quantity" => "required",
            "current_quantity" => "required",
            "deadline" => "required",
            "description" => "required"
        ]);

        $task = Task::find($id);
        $task->fill($validated_data);
        $task->save();
        $task->touch();
    }

    public function update_quantity($request, $id)
    {
        $validated_data = $request->validate([
            "current_quantity" => "required",
        ]);

        $task = Task::find($id);
        $task->fill($validated_data);
        $task->save();
        $task->touch();
    }
}
