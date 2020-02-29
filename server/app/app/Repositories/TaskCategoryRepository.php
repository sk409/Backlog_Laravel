<?php

namespace App\Repositories;

interface TaskCategoryRepository
{
    public function all();
    public function save(string $name, int $projectId);
}
