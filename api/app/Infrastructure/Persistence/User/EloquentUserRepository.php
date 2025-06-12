<?php

namespace App\Infrastructure\Persistence\User;

use App\Domains\User\Contracts\UserRepositoryInterface;
use App\Domains\User\Entities\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
