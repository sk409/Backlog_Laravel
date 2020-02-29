<?php

namespace App\Services;

use App\Repositories\TaskStatusRepository;

class TaskStatusServiceDefault implements TaskStatusService
{

    private $taskStatusRepository;

    public function __construct(TaskStatusRepository $taskStatusRepository)
    {
        $this->taskStatusRepository = $taskStatusRepository;
    }

    public function all()
    {
        return $this->taskStatusRepository->all();
    }

    public function findAll(array $option)
    {
        return $this->taskStatusRepository->findAll($option);
    }

    public function findOne(array $option)
    {
        return $this->taskStatusRepository->findOne($option);
    }
}
