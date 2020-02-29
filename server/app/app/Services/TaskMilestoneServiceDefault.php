<?php

namespace App\Services;

use App\Repositories\TaskMilestoneRepository;

class TaskMilestoneServiceDefault implements TaskMilestoneService
{

    private $taskMilestoneRepository;

    public function __construct(TaskMilestoneRepository $taskMilestoneRepository)
    {
        $this->taskMilestoneRepository = $taskMilestoneRepository;
    }

    public function all()
    {
        return $this->taskMilestoneRepository->all();
    }

    public function save(string $name, string $details, string $startOn, string $endOn, int $projectId)
    {
        return $this->taskMilestoneRepository->save($name, $details, $startOn, $endOn, $projectId);
    }
}
