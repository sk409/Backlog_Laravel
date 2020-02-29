<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use App\Repositories\ProjectUserRepository;

class ProjectServiceDefault implements ProjectService
{

    private $projectRepository;
    private $projectUserRepository;

    public function __construct(ProjectRepository $projectRepository, ProjectUserRepository $projectUserRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectUserRepository = $projectUserRepository;
    }

    public function findAll(array $option)
    {
        return $this->projectRepository->findAll($option);
    }

    public function findOne(array $option)
    {
        return $this->projectRepository->findOne($option);
    }

    public function join(int $projectId, int $userId)
    {
        return $this->projectUserRepository->save($projectId, $userId);
    }

    public function save(string $name, string $outline, string $thumbnailPath)
    {
        return $this->projectRepository->save($name, $outline, $thumbnailPath);
    }

    public function update(int $id, array $params)
    {
        return $this->projectRepository->update($id, $params);
    }
}
