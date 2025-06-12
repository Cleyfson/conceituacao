<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Mocks\ProfileRepositoryMock;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\Profile\Entities\Profile;

class ProfileServiceTest extends TestCase
{
    private ProfileRepositoryMock $profileRepository;
    private ProfileService $profileService;

    protected function setUp(): void
    {
        $this->profileRepository = new ProfileRepositoryMock();
        $this->profileService = new ProfileService($this->profileRepository);
    }

    public function test_get_all_profiles()
    {
        $this->profileService->create([
            'name' => 'Editor',
        ]);

        $profiles = $this->profileService->getAll();

        $this->assertCount(1, $profiles);
        $this->assertEquals('Editor', $profiles[0]->name);
    }

    protected function tearDown(): void
    {
        $this->profileRepository->clear();
        parent::tearDown();
    }
}
