<?php

namespace App\Services;

use App\Repositories\TaskTypeRepository;

class TaskTypeServiceDefault implements TaskTypeService
{
    private $taskTypeRepository;

    public function __construct(TaskTypeRepository $taskTypeRepository)
    {
        $this->taskTypeRepository = $taskTypeRepository;
    }

    public function all()
    {
        return $this->taskTypeRepository->all();
    }
}
