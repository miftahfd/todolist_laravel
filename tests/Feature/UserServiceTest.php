<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("miftah", "123456"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("agus", "654321"));
    }

    public function testWrongPassword()
    {
        self::assertFalse($this->userService->login("miftah", "876543"));
    }
}
