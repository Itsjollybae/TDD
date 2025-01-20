<?php
namespace App;

class Users
{
    private array $users = [];


    public function createUser(string $username, string $password)
    {
        $hash = sha1($username . ':' . $password);
        $this->users[$username] = $hash;
    }

    public function selectUser(string $username)
    {
        return isset($this->users[$username]) ? $this->users[$username] : null;
    }
}