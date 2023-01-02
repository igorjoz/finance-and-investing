<?php

require_once '../app/Core/Model.php';

class User extends Model
{
    public $login;
    public $email;
    public $passwordHash;

    public function __construct($login, $email, $passwordHash)
    {
        $this->login = $login;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function isPasswordValid($password): bool
    {
        return password_verify($password, $this->passwordHash);
    }

    protected function serialize(): array
    {
        $object = [
            'login' => $this->login,
            'email' => $this->email,
            'passwordHash' => $this->passwordHash
        ];

        return array_merge(parent::serialize(), $object);
    }

    static protected function deserialize($object): User
    {
        $instance = new static ($object['login'], $object['email'], $object['passwordHash']);

        $instance->id = (string) $object['_id'];

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