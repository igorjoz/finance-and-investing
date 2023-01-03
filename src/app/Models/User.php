<?php

require_once '../app/Core/Model.php';

class User extends Model
{
    public $login;
    public $email;
    public $passwordHash;

    public function __construct(string $login, string $email, string $passwordHash)
    {
        $this->login = $login;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function isPasswordValid(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }

    protected function serialize(): array
    {
        $user = [
            'login' => $this->login,
            'email' => $this->email,
            'passwordHash' => $this->passwordHash
        ];

        return array_merge(parent::serialize(), $user);
    }

    static public function deserialize($user): User
    {
        $instance = new static ($user['login'], $user['email'], $user['passwordHash']);

        $instance->id = (string) $user['_id'];

        return $instance;
    }

    static public function getCurrentUser()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    static public function getLogin(): string
    {
        return $_SESSION['user']->login;
    }

    static public function getEmail(): string
    {
        return $_SESSION['user']->email;
    }

    static public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}