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
        $login = Helper::post('login');
        $email = Helper::post('email');
        $password = Helper::post('password');
        $repeatedPassword = Helper::post('repeated_password');
        $user = User::get(['login' => $login]);

        $isValid = UserValidationService::validateStoreData($login, $email, $password, $repeatedPassword, $user);

        if ($isValid) {
            $user = new User($login, $email, password_hash($password, PASSWORD_DEFAULT));
            $user->save();

            FlashMessageService::info("Your account has been created succesfully!");
            // return new RedirectView('/login', 303);
            self::login($login, $password);
            require_once '../views/home/index.php';

        } else {
            require_once '../views/user/create.php';
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

    public function login($login = null, $password = null)
    {
        if ($login === null) {
            $login = Helper::post('login');
        }

        if ($password === null) {
            $password = Helper::post('password');
        }

        $user = User::get(['login' => $login]);

        if (!$user or !$user->isPasswordValid($password)) {
            FlashMessageService::error("Wrong credentials");
            require_once '../views/user/login-form.php';
        } else {
            $_SESSION['user'] = $user;

            FlashMessageService::info("Welcome <b>" . $user->login . "</b>! You have successfully logged in!");
            return new RedirectView('/', 303);
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        session_destroy();

        FlashMessageService::info("You have logged out successfully!");
        return new RedirectView('/', 303);
    }
}