<?php

namespace App\Repositories;

use App\TaskStatus;

class TaskStatusRepositoryEloquent extends RepositoryEloquent implements TaskStatusRepository
{

    public function __construct()
    {
        parent::__construct(TaskStatus::class);
    }
}
