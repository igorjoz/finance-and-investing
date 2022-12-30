<?php

require_once '../app/Services/PathService.php';

class UserController
{
    public $directoryPath = VIEWS_PATH_PREFIX . 'user/';

    public function register()
    {
        // Render the registration form view
        require_once($this->directoryPath . 'register.php');

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            // ...

            // Create a new user in the database
            // ...

            // Redirect to the login page
            header('Location: /user/login');
            exit;
        }
    }

    public function login()
    {
        // Render the login form view
        require_once($this->directoryPath . 'login.php');

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            // ...

            // Look up the user in the database
            // ...

            // If the user is found, log them in and redirect to the dashboard
            // ...

            // Otherwise, show an error message
            $error = 'Invalid username or password';
        }
    }

    public function logout()
    {
        session_start();
        // Log the user out and redirect to the home page
        session_destroy();
        header('Location: /');

        exit;
    }
}






// <?php
// require_once '../models/User.php';
// require_once '../views/LayoutView.php';
// require_once '../views/RedirectView.php';

// class UserController {
//   public function signup() {
//     if (currentUser()) {
//       return new RedirectView('/', 303);
//     } else {
//       return new LayoutView('signupform');
//     }
//   }

//   public function add() {
//     $valid = true;

//     $name = post('name');
//     if ($name == '') {
//       $valid = false;
//       Flash::error("Name can't be empty");
//     }

//     $email = post('email');
//     if ($email == '') {
//       $valid = false;
//       Flash::error("Email can't be empty");
//     }

//     $password = post('password');
//     if ($password == '') {
//       $valid = false;
//       Flash::error("Password can't be empty");
//     }

//     $password_r = post('password_r');
//     if ($password_r != $password) {
//       $valid = false;
//       Flash::error("Passwords have to be the same");
//     }

//     $user = User::get(['name' => $name]);
//     if ($user) {
//       $valid = false;
//       Flash::error("That name is already taken");
//     }

//     if ($valid) {
//       $user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
//       $user->save();
//       Flash::info("You can now log in");
//       return new RedirectView('/login', 303);
//     } else {
//       return new RedirectView('/signup', 303);
//     }
//   }

//   public function login() {
//     if (currentUser()) {
//       return new RedirectView('/', 303);
//     } else {
//       return new LayoutView('loginform');
//     }
//   }

//   public function authenticate() {
//     $name = post('name');
//     $password = post('password');
//     $user = User::get(['name' => $name]);
//     if (!$user || !$user->validPassword($password)) {
//       Flash::error("Wrong credentials");
//       return new RedirectView('/login', 303);
//     } else {
//       $_SESSION['user'] = $name;
//       Flash::info("Welcome! You're now logged in.");
//       return new RedirectView('/', 303);
//     }
//   }
// }