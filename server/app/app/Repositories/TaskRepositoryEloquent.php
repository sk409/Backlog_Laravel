<?php

namespace App\Repositories;

use App\Task;

class TaskRepositoryEloquent extends RepositoryEloquent implements TaskRepository
{

    public function __construct()
    {
        parent::__construct(Task::class);
    }

    public function save(string $subject, string $details, float $scheduledTime, float $actualTime, string $startOn, string $dueOn, int $taskPriorityId, int $taskStatusId, int $taskTypeId, int $responsibleUserId, int $projectId)
    {
        return Task::create(["subject" => $subject, "details" => $details, "scheduled_time" => $scheduledTime, "actual_time" => $actualTime, "start_on" => $startOn, "due_on" => $dueOn, "task_priority_id" => $taskPriorityId, "task_status_id" => $taskStatusId, "task_type_id" => $taskTypeId, "responsible_user_id" => $responsibleUserId, "project_id" => $projectId]);
    }
}
