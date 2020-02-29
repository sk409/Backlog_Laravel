<?php

namespace App\Repositories;

use App\TaskMilestone;

class TaskMilestoneRepositoryEloquent extends RepositoryEloquent implements TaskMilestoneRepository
{

    public function __construct()
    {
        parent::__construct(TaskMilestone::class);
    }

    public function save(string $name, string $details, string $startOn, string $endOn, int $projectId)
    {
        return TaskMilestone::create(["name" => $name, "details" => $details, "start_on" => $startOn, "end_on" => $endOn, "project_id" => $projectId]);
    }
}
