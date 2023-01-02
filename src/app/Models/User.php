<?php

require_once '../app/Core/Model.php';

class User extends Model
{
    public $name;
    public $email;
    public $passwordHash;

    public function __construct($name, $email, $passwordHash)
    {
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function validPassword($password): bool
    {
        return password_verify($password, $this->passwordHash);
    }

    protected function serialize(): array
    {
        $object = [
            'name' => $this->name,
            'email' => $this->email,
            'passwordHash' => $this->passwordHash
        ];

        return array_merge(parent::serialize(), $object);
    }

    static protected function deserialize($object): User
    {
        $instance = new static ($object['name'], $object['email'], $object['passwordHash']);

        $instance->id = (string) $object['_id'];

        return $instance;
    }

    static public function getCurrentUser()
    {
        // return isset($_SESSION['user']) ? User::get(['name' => $_SESSION['user']]) : null;
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    static public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}