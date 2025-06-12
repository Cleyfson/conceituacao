<?php

namespace App\Domains\User\Contracts;

use App\Domains\User\Entities\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
}
