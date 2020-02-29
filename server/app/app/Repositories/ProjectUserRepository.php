<?php

namespace App\Repositories;

interface ProjectUserRepository
{
    public function findAll(array $option);
    public function save(int $projectId, int $userId);
}
