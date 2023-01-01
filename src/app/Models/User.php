<?php

// class User
// {
//     protected $id;
//     protected $email;
//     protected $password;
//     protected $name;

//     public function __construct($id, $email, $password, $name)
//     {
//         $this->id = $id;
//         $this->email = $email;
//         $this->password = $password;
//         $this->name = $name;
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function getEmail()
//     {
//         return $this->email;
//     }

//     public function getPassword()
//     {
//         return $this->password;
//     }

//     public function getName()
//     {
//         return $this->name;
//     }

//     public function setName($name)
//     {
//         $this->name = $name;
//     }

//     public static function isLoggedIn(): bool
//     {
//         return isset($_SESSION['user']);
//     }
// }





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

    // public function getAll()
    // {
    //     $response = Database::get()->posts->find([]);
    //     $posts = [];

    //     foreach ($response as $post) {
    //         $posts[] = new Post($post['title'], $post['contents']);
    //     }

    //     return $posts;
    // }

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

    static public function getCurrentUser(): User
    {
        return isset($_SESSION['user']) ? User::get(['name' => $_SESSION['user']]) : null;
    }

    static public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}