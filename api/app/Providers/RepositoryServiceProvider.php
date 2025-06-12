<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domains\User\Contracts\UserRepositoryInterface;
use App\Infrastructure\Persistence\User\EloquentUserRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
