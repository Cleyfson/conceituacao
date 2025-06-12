<?php

namespace Tests\Mocks;

use App\Domains\User\Entities\User;
use App\Domains\User\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepositoryMock implements UserRepositoryInterface
{
    private array $users = [];
    private int $nextId = 1;

    public function create(array $data): User
    {
        $user = new User($data);
        $user->id = $this->nextId++;

        $this->users[] = $user;

        return $user;
    }

    public function all(): Collection
    {
        return new Collection($this->users);
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function clear(): void
    {
        $this->users = [];
        $this->nextId = 1;
    }
}