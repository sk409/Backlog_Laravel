<?php

namespace App\Repositories;

use App\TaskCategory;

class TaskCategoryRepositoryEloquent extends RepositoryEloquent implements TaskCategoryRepository
{

    public function __construct()
    {
        parent::__construct(TaskCategory::class);
    }

    public function save(string $name, int $projectId)
    {
        return TaskCategory::create(["name" => $name, "project_id" => $projectId]);
    }
}
