<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskServiceDefault implements TaskService
{

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function count($where = []): int
    {
        return $this->taskRepository->count($where);
    }

    public function findAll($option)
    {
        return $this->taskRepository->findAll($option);
    }

    public function save(string $subject, string $details, float $scheduledTime, float $actualTime, string $startOn, string $dueOn, int $taskPriorityId, int $taskStatusId, int $taskTypeId, int $responsibleUserId, int $projectId)
    {
        return $this->taskRepository->save($subject, $details, $scheduledTime, $actualTime, $startOn, $dueOn, $taskPriorityId, $taskStatusId, $taskTypeId, $responsibleUserId, $projectId);
    }
}
