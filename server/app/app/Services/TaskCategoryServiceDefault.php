<?php

namespace App\Services;

use App\Repositories\TaskCategoryRepository;

class TaskCategoryServiceDefault implements TaskCategoryService
{
    private $taskCategoryRepository;

    public function __construct(TaskCategoryRepository $taskCategoryRepository)
    {
        $this->taskCategoryRepository = $taskCategoryRepository;
    }

    public function all()
    {
        return $this->taskCategoryRepository->all();
    }

    public function save(string $name, int $projectId)
    {
        return $this->taskCategoryRepository->save($name, $projectId);
    }
}
