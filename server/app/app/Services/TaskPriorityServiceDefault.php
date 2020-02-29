<?php

namespace App\Services;

use App\Repositories\TaskPriorityRepository;

class TaskPriorityServiceDefault implements TaskPriorityService
{

    private $taskPriorityRepository;

    public function __construct(TaskPriorityRepository $taskPriorityRepository)
    {
        $this->taskPriorityRepository = $taskPriorityRepository;
    }

    public function all()
    {
        return $this->taskPriorityRepository->all();
    }
}
