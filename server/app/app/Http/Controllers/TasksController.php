<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Services\ProjectService;
use App\Services\ProjectUserService;
use App\Services\TaskCategoryService;
use App\Services\TaskMilestoneService;
use App\Services\TaskPriorityService;
use App\Services\TaskService;
use App\Services\TaskStatusService;
use App\Services\TaskTypeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasksController extends Controller
{

    private $projectService;
    private $projectUserService;
    private $taskCategoryService;
    private $taskMilestoneService;
    private $taskPriorityService;
    private $taskService;
    private $taskStatusService;
    private $taskTypeService;
    private $userService;

    public function __construct(ProjectService $projectService, ProjectUserService $projectUserService, TaskCategoryService $taskCategoryService, TaskMilestoneService $taskMilestoneService, TaskPriorityService $taskPriorityService, TaskService $taskService, TaskStatusService $taskStatusService, TaskTypeService $taskTypeService, UserService $userService)
    {
        $this->projectService = $projectService;
        $this->projectUserService = $projectUserService;
        $this->taskCategoryService = $taskCategoryService;
        $this->taskMilestoneService = $taskMilestoneService;
        $this->taskPriorityService = $taskPriorityService;
        $this->taskService = $taskService;
        $this->taskStatusService = $taskStatusService;
        $this->taskTypeService = $taskTypeService;
        $this->userService = $userService;
    }

    public function create(int $projectId): View
    {
        $project = $this->projectService->findOne(["where" => ["id", $projectId]]);
        $taskCategories = $this->taskCategoryService->all();
        $taskMilestones = $this->taskMilestoneService->all();
        $taskPriorities = $this->taskPriorityService->all();
        $taskTypes = $this->taskTypeService->all();
        $userIds = array_map(function ($projectUser) {
            return $projectUser->user_id;
        }, $this->projectUserService->findAll([
            "where" => ["project_id", $projectId]
        ]));
        $users = $this->userService->findAll([
            "primary" => $userIds
        ]);
        return view("tasks.create", [
            "project" => $project,
            "taskCategories" => $taskCategories,
            "taskMilestones" => $taskMilestones,
            "taskPriorities" => $taskPriorities,
            "taskTypes" => $taskTypes,
            "users" => $users,
        ]);
    }

    public function index(Request $request, int $projectId): View
    {
        $project = $this->projectService->findOne(["where" => ["id", $projectId]]);
        $currentPage = $request->page;
        $totalNumber = $this->taskService->count(["where" => ["project_id", $projectId]]);
        $size = 2;
        $displayStartAt = ($currentPage  - 1) * $size + 1;
        $displayEndAt = min($totalNumber, $currentPage * $size);
        $pageMax = ceil($totalNumber / $size);
        $pageLeft = 2;
        $pageRight = 3;
        $pageStartAt = max(1, $currentPage - $pageLeft);
        $pageEndAt = min($pageMax, $currentPage + $pageRight);
        $pageStartAt = max(1, $pageStartAt + min(0, $pageMax - ($currentPage + $pageRight)));
        $pageEndAt = min($pageMax, $pageEndAt + max(0, $pageLeft - $currentPage + 1));
        $showPreButton = $pageStartAt != 1;
        $showNextButton = $pageEndAt != $pageMax;
        $tasks = $this->taskService->findAll([
            "where" => ["project_id", $projectId],
            "offset" => $displayStartAt - 1,
            "limit" => $size
        ]);
        return view("tasks.index", [
            "currentPage" => $currentPage,
            "displayEndAt" => $displayEndAt,
            "displayStartAt" => $displayStartAt,
            "totalNumber" => $totalNumber,
            "pageEndAt" => $pageEndAt,
            "pageStartAt" => $pageStartAt,
            "project" => $project,
            "showNextButton" => $showNextButton,
            "showPreButton" => $showPreButton,
            "tasks" => $tasks
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        $taskStatus = $this->taskStatusService->findOne([
            "where" => ["name" => "未対応"]
        ]);
        return $this->taskService->save(
            $request->subject,
            $request->details,
            (float) $request->scheduledTime,
            (float) $request->actualTime,
            $request->startOn,
            $request->dueOn,
            (int) $request->taskPriorityId,
            $taskStatus->id,
            (int) $request->taskTypeId,
            (int) $request->responsibleUserId,
            (int) $request->projectId
        );
    }
}
