<?php

require_once '../app/Models/User.php';
require_once '../app/Services/UserValidationService.php';
require_once '../app/Services/Helper.php';
require_once '../app/Services/FlashMessageService.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class UserController
{
    public function index()
    {
        $users = User::getAll();

        if (!User::getAll()) {
            return new RedirectView('/', 303);
        } else {
            require_once '../views/user/index.php';
        }
    }
    public function create()
    {
        if (User::getCurrentUser()) {
            return new RedirectView('/', 303);
        } else {
            require_once '../views/user/create.php';
        }
    }

    public function store()
    {
        $name = Helper::post('name');
        $email = Helper::post('email');
        $password = Helper::post('password');
        $repeatedPassword = Helper::post('repeated_password');
        $user = User::get(['name' => $name]);

        $isValid = UserValidationService::validateStoreData($name, $email, $password, $repeatedPassword, $user);

        if ($isValid) {
            $user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
            $user->save();
            FlashMessageService::info("You can now log in");
            return new RedirectView('/login', 303);
        } else {
            var_dump($isValid);
            return new RedirectView('/signup', 303);
        }
    }

    public function loginForm()
    {
        if (User::isLoggedIn()) {
            return new RedirectView('/', 303);
        } else {
            require_once '../views/user/login-form.php';
        }
    }

    public function login()
    {
        $name = Helper::post('name');
        $password = Helper::post('password');
        $user = User::get(['name' => $name]);

        if (!$user or !$user->validPassword($password)) {
            FlashMessageService::error("Wrong credentials");
            return new RedirectView('/user/login', 303);
        } else {
            $_SESSION['user'] = $name;
            FlashMessageService::info("Welcome! You're now logged in.");
            return new RedirectView('/', 303);
        }
    }

// public function logout()
//     {
//         session_start();
//         // Log the user out and redirect to the home page
//         session_destroy();
//         header('Location: /');

//         exit;
//     }
}