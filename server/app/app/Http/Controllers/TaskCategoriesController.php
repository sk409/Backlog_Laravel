<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCategoryStoreRequest;
use App\Services\TaskCategoryService;

class TaskCategoriesController extends Controller
{

    private $taskCategoryService;

    public function __construct(TaskCategoryService $taskCategoryService)
    {
        $this->taskCategoryService = $taskCategoryService;
    }

    public function store(TaskCategoryStoreRequest $request)
    {
        return $this->taskCategoryService->save($request->name, (int) $request->projectId);
    }
}
