<?php

namespace App\Infrastructure\Persistence\Profile;

use App\Domains\Profile\Contracts\ProfileRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Domains\Profile\Entities\Profile;

class EloquentProfileRepository implements ProfileRepositoryInterface
{
    public function all(): Collection
    {
        return Profile::all();
    }

    public function findById(int $id): Profile
    {
        return Profile::findOrFail($id);
    }
}
