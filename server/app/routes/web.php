<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get("/", "DashboardController@index");
    Route::post("/projects", "ProjectsController@store");
    Route::get("/projects/{id}", "ProjectsController@show");
    Route::post("/projects/join", "ProjectsController@join");
    Route::get("/projects/{projectId}/tasks", "TasksController@index")->name("tasks.index");
    Route::post("/projects/{projectId}/tasks", "TasksController@store");
    Route::get("/projects/{projectId}/tasks/create", "TasksController@create");
    Route::post("/task_categories", "TaskCategoriesController@store");
    Route::post("/task_milestones", "TaskMilestonesController@store");
    Route::get("/users/current", "UsersController@current");
});
