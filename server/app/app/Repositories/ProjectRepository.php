<?php

namespace App\Repositories;

interface ProjectRepository
{
    public function findAll(array $option);
    public function findOne(array $option);
    public function save(string $name, string $outline, string $thumbnailPath);
    public function update(int $id, array $params);
}
