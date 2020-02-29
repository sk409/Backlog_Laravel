<?php

namespace App\Repositories;

interface TaskStatusRepository
{
    public function all();
    public function findAll(array $option);
    public function findOne(array $option);
}
