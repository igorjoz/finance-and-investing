<?

require_once '../Services/PathService.php';

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