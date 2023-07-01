<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, function ($query, $search) {
            return $query->where("title", "LIKE", "%" . $search . "%");
        });

        $query->when($filters["status"] ?? false, function ($query, $status) {
            return $query->whereHas("task_status", function ($query) use ($status) {
                $query->where("task_status_id", $status);
            });
        });
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($task) {
            if ($task->current_quantity < 1) {
                $task->task_status_id = 1;
            } else if ($task->current_quantity >= $task->target_quantity) {
                $task->task_status_id = 3;
            } else {
                $task->task_status_id = 2;
            }

            $progress = ceil($task->current_quantity / $task->target_quantity * 100);

            if ($progress > 50) {
                $task->progress = floor($task->current_quantity / $task->target_quantity * 100);
            } else {
                $task->progress = $progress;
            }
        });
    }

    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class);
    }
}
