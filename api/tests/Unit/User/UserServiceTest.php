<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Mocks\UserRepositoryMock;
use App\Domains\User\Services\UserService;
use App\Domains\User\Entities\User;

class UserServiceTest extends TestCase
{
    private UserRepositoryMock $userRepository;
    private UserService $userService;

    protected function setUp(): void
    {
        $this->userRepository = new UserRepositoryMock();
        $this->userService = new UserService($this->userRepository);
    }

    public function test_get_all_users()
    {
        $this->userService->create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => 'secret',
        ]);

        $users = $this->userService->getAll();

        $this->assertCount(1, $users);
        $this->assertEquals('Bob', $users[0]->name);
    }

    protected function tearDown(): void
    {
        $this->userRepository->clear();
        parent::tearDown();
    }
}
