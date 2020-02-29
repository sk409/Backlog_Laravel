<?php

namespace App\Services;

interface TaskCategoryService
{
    public function all();
    public function save(string $name, int $projectId);
}
