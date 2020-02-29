<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = ["subject", "details", "scheduled_time", "actual_time", "start_on", "due_on", "task_priority_id", "task_status_id", "task_type_id", "responsible_user_id", "project_id"];

    public function priority(): BelongsTo {
        return $this->belongsTo(TaskPriority::class, "task_priority_id");
    }

    public function responsibleUser(): BelongsTo {
        return $this->belongsTo(User::class, "responsible_user_id");
    }

    public function status(): BelongsTo {
        return $this->belongsTo(TaskStatus::class, "task_status_id");
    }

    public function type(): BelongsTo {
        return $this->belongsTo(TaskType::class, "task_type_id");
    }
}
