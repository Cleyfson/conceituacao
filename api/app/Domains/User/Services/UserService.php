<?php

namespace App\Domains\User\Services;

use App\Domains\User\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use App\Domains\User\Entities\User;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function getAll(): Collection
    {
        return $this->userRepository->all();
    }

    public function create(array $data): User
    {
        $user = $this->userRepository->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function getById(int $id): User
    {
        return $this->userRepository->findById($id);
    }
}
