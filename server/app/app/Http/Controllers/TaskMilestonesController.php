<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskMilestoneStoreRequest;
use App\Services\TaskMilestoneService;

class TaskMilestonesController extends Controller
{

    private $taskMilestoneService;

    public function __construct(TaskMilestoneService $taskMilestoneService)
    {
        $this->taskMilestoneService = $taskMilestoneService;
    }

    public function store(TaskMilestoneStoreRequest $request)
    {
        return $this->taskMilestoneService->save($request->name, $request->details, $request->startOn, $request->endOn, (int) $request->projectId);
    }
}
