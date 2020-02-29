<?php

namespace App\Repositories;

use App\TaskPriority;

class TaskPriorityRepositoryEloquent extends RepositoryEloquent implements TaskPriorityRepository
{

    public function __construct()
    {
        parent::__construct(TaskPriority::class);
    }
}
