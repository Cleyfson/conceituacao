<?php

namespace Tests\Mocks;

use App\Domains\Profile\Entities\Profile;
use App\Domains\Profile\Contracts\ProfileRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProfileRepositoryMock implements ProfileRepositoryInterface
{
    private array $profiles = [];
    private int $nextId = 1;

    public function create(array $data): Profile
    {
        $profile = new Profile($data);
        $profile->id = $this->nextId++;

        $this->profiles[] = $profile;

        return $profile;
    }

    public function all(): Collection
    {
        return new Collection($this->profiles);
    }

    public function clear(): void
    {
        $this->profiles = [];
        $this->nextId = 1;
    }
}