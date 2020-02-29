<?php

namespace App\Repositories;

use App\User;

class UserRepositoryEloquent extends RepositoryEloquent implements UserRepository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
