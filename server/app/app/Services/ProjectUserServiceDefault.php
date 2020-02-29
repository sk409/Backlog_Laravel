<?php

namespace App\Services;

use App\Repositories\ProjectUserRepository;

class ProjectUserServiceDefault implements ProjectUserService
{

    private $projectUserRepository;

    public function __construct(ProjectUserRepository $projectUserRepository)
    {
        $this->projectUserRepository = $projectUserRepository;
    }

    public function findAll(array $option)
    {
        return $this->projectUserRepository->findAll($option);
    }
}
