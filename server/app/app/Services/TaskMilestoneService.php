<?php

namespace App\Services;

interface TaskMilestoneService
{
    public function all();
    public function save(string $name, string $details, string $startOn, string $endOn, int $projectId);
}
