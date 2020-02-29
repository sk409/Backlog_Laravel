<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserServiceDefault implements UserService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAll(array $option)
    {
        return $this->userRepository->findAll($option);
    }
}
