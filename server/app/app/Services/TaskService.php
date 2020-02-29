<?php

namespace App\Services;

interface TaskService
{
    public function count($where = []): int;
    public function findAll($option);
    public function save(string $subject, string $details, float $scheduledTime, float $actualTime, string $startOn, string $dueOn, int $taskPriorityId, int $taskStatusId, int $taskTypeId, int $responsibleUserId, int $projectId);
}
