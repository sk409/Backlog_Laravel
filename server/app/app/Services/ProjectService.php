<?php

namespace App\Services;

interface ProjectService
{
    public function findAll(array $option);
    public function findOne(array $option);
    public function join(int $projectId, int $userId);
    public function save(string $name, string $outline, string $thumbnailPath);
    public function update(int $id, array $params);
}
