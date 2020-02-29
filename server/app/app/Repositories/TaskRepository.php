<?php

namespace App\Repositories;

interface TaskRepository
{
    public function count(array $option): int;
    public function findAll(array $option);
    public function save(string $subject, string $details, float $scheduledTime, float $actualTime, string $startOn, string $dueOn, int $taskPriorityId, int $taskStatusId, int $taskTypeId, int $responsibleUserId, int $projectId);
}
