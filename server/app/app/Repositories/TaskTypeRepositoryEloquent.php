<?php

namespace App\Repositories;

use App\TaskType;

class TaskTypeRepositoryEloquent extends RepositoryEloquent implements TaskTypeRepository
{
    public function __construct()
    {
        parent::__construct(TaskType::class);
    }
}
