<?php

namespace App\Providers;

use App\Services\ProjectService;
use App\Services\ProjectServiceDefault;
use App\Services\ProjectUserService;
use App\Services\ProjectUserServiceDefault;
use App\Services\TaskCategoryService;
use App\Services\TaskCategoryServiceDefault;
use App\Services\TaskMilestoneService;
use App\Services\TaskMilestoneServiceDefault;
use App\Services\TaskPriorityService;
use App\Services\TaskPriorityServiceDefault;
use App\Services\TaskService;
use App\Services\TaskServiceDefault;
use App\Services\TaskStatusService;
use App\Services\TaskStatusServiceDefault;
use App\Services\TaskTypeService;
use App\Services\TaskTypeServiceDefault;
use App\Services\UserService;
use App\Services\UserServiceDefault;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectService::class, ProjectServiceDefault::class);
        $this->app->bind(ProjectUserService::class, ProjectUserServiceDefault::class);
        $this->app->bind(TaskCategoryService::class, TaskCategoryServiceDefault::class);
        $this->app->bind(TaskMilestoneService::class, TaskMilestoneServiceDefault::class);
        $this->app->bind(TaskPriorityService::class, TaskPriorityServiceDefault::class);
        $this->app->bind(TaskService::class, TaskServiceDefault::class);
        $this->app->bind(TaskStatusService::class, TaskStatusServiceDefault::class);
        $this->app->bind(TaskTypeService::class, TaskTypeServiceDefault::class);
        $this->app->bind(UserService::class, UserServiceDefault::class);
    }
}
