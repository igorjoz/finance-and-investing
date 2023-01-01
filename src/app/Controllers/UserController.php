<?php

// require_once '../app/Services/PathService.php';

// class UserController
// {
//     public $directoryPath = VIEWS_PATH_PREFIX . 'user/';

//     public function register()
//     {
//         // Render the registration form view
//         require_once($this->directoryPath . 'register.php');

//         // Handle form submission
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             // Validate the form data
//             // ...

//             // Create a new user in the database
//             // ...

//             // Redirect to the login page
//             header('Location: /user/login');
//             exit;
//         }
//     }

//     public function login()
//     {
//         // Render the login form view
//         require_once($this->directoryPath . 'login.php');

//         // Handle form submission
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             // Validate the form data
//             // ...

//             // Look up the user in the database
//             // ...

//             // If the user is found, log them in and redirect to the dashboard
//             // ...

//             // Otherwise, show an error message
//             $error = 'Invalid username or password';
//         }
//     }

//     public function logout()
//     {
//         session_start();
//         // Log the user out and redirect to the home page
//         session_destroy();
//         header('Location: /');

//         exit;
//     }
// }






require_once '../app/Models/User.php';
require_once '../app/Services/Helper.php';
require_once '../app/Services/FlashMessageService.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class UserController
{
    public function create()
    {
        if (User::getCurrentUser()) {
            return new RedirectView('/', 303);
        } else {
            return new LayoutView('user_register');
        }
    }

    public function store()
    {
        $name = Helper::post('name');
        $email = Helper::post('email');
        $password = Helper::post('password');
        $repeatedPassword = Helper::post('password_r');
        $user = User::get(['name' => $name]);

        $isValid = UserValidationService::validateStoreData($name, $email, $password, $repeatedPassword, $user);

        if ($isValid) {
            $user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
            $user->save();
            FlashMessageService::info("You can now log in");
            return new RedirectView('/login', 303);
        } else {
            return new RedirectView('/signup', 303);
        }
    }

    public function login()
    {
        if (User::getCurrentUser()) {
            return new RedirectView('/', 303);
        } else {
            return new LayoutView('loginform');
        }
    }

    public function authenticate()
    {
        $name = Helper::post('name');
        $password = Helper::post('password');
        $user = User::get(['name' => $name]);
        if (!$user || !$user->validPassword($password)) {
            FlashMessageService::error("Wrong credentials");
            return new RedirectView('/login', 303);
        } else {
            $_SESSION['user'] = $name;
            FlashMessageService::info("Welcome! You're now logged in.");
            return new RedirectView('/', 303);
        }
    }
}