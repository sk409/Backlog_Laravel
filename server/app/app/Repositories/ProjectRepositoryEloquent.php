<?php

namespace App\Repositories;

use App\Project;

class ProjectRepositoryEloquent extends RepositoryEloquent implements ProjectRepository
{

    public function __construct()
    {
        parent::__construct(Project::class);
    }

    public function save(string $name, string $outline, string $thumbnailPath)
    {
        return Project::create(["name" => $name, "outline" => $outline, "thumbnail_path" => $thumbnailPath]);
    }
}
