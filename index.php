<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Users;

$users = new Users();

$users->createUser('example_user', 'example_password');
echo $users->selectUser('example_user');