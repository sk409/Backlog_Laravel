<?php

namespace App\Repositories;

use App\Project;
use App\ProjectUser;

class ProjectUserRepositoryEloquent extends RepositoryEloquent implements ProjectUserRepository
{

    public function __construct()
    {
        parent::__construct(ProjectUser::class);
    }

    public function save(int $projectId, int $userId)
    {
        Project::find($projectId)->users()->attach($userId);
    }
}
