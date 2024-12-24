<?php
class Users
{
    private array $users;

    public function createUser(string $username, string $password)
    {
        $hash = sha1($username . ':' . $password);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result = $mysqli->query($query);
        $mysqli->errorHandler();
    }

    public function selectUser(string $username)
    {
        $query = "SELECT username, password FROM users WHERE username = ? LIMIT 1";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $username);
        $result = $stmt->fetch();
        return $result['password'];
    }
}
