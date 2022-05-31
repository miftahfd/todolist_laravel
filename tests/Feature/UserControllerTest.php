<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText('Login');
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            'username' => 'miftah',
            'password' => '123456'
        ])->assertRedirect('/')->assertSessionHas('username', 'miftah');
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])->assertSeeText('user and password is required');
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            'username' => 'miftah',
            'password' => '987654'
        ])->assertSeeText('Wrong username or password');
    }

    public function testLogout()
    {
        $this->withSession([
            'username' => 'miftah'
        ])->post('/logout')->assertRedirect('/')->assertSessionMissing('username');
    }
}
