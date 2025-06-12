<?php

namespace App\Domains\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Domains\User\Entities\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function all(): Collection;
}
