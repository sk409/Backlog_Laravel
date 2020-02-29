<?php

namespace App\Services;

interface TaskStatusService
{
    public function all();
    public function findAll(array $option);
    public function findOne(array $option);
}
