<?php

namespace App\Providers;

use App\Repositories\ProjectRepository;
use App\Repositories\ProjectRepositoryEloquent;
use App\Repositories\ProjectUserRepository;
use App\Repositories\ProjectUserRepositoryEloquent;
use App\Repositories\TaskCategoryRepository;
use App\Repositories\TaskCategoryRepositoryEloquent;
use App\Repositories\TaskMilestoneRepository;
use App\Repositories\TaskMilestoneRepositoryEloquent;
use App\Repositories\TaskPriorityRepository;
use App\Repositories\TaskPriorityRepositoryEloquent;
use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryEloquent;
use App\Repositories\TaskStatusRepository;
use App\Repositories\TaskStatusRepositoryEloquent;
use App\Repositories\TaskTypeRepository;
use App\Repositories\TaskTypeRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectRepository::class, ProjectRepositoryEloquent::class);
        $this->app->bind(ProjectUserRepository::class, ProjectUserRepositoryEloquent::class);
        $this->app->bind(TaskCategoryRepository::class, TaskCategoryRepositoryEloquent::class);
        $this->app->bind(TaskMilestoneRepository::class, TaskMilestoneRepositoryEloquent::class);
        $this->app->bind(TaskPriorityRepository::class, TaskPriorityRepositoryEloquent::class);
        $this->app->bind(TaskRepository::class, TaskRepositoryEloquent::class);
        $this->app->bind(TaskStatusRepository::class, TaskStatusRepositoryEloquent::class);
        $this->app->bind(TaskTypeRepository::class, TaskTypeRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
    }
}
