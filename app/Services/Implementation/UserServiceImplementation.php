<?php

namespace App\Services\Implementation;

use App\Services\UserService;

class UserServiceImplementation implements UserService
{

    private array $users = ["miftah" => "123456"];

    public function login(string $username, string $password): bool
    {
        if(!isset($this->users[$username])) return false;

        $correctPassword = $this->users[$username];
        return $password == $correctPassword;
    }
}