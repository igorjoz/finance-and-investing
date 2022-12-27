<?php

require_once '../Models/User.php';
require_once '../Services/PathService.php';
require_once '../Services/Helper.php';

class ImageController
{
    public function upload()
    {
        // Check if the user is logged in
        if (!User::isLoggedIn()) {
            // Redirect to the login page if the user is not logged in
            header('Location: /user/login');
            exit;
        }

        // Render the image upload form view
        require_once('views/image/upload.php');

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            // ...

            // Check if the file was uploaded successfully
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Get the file information
                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $size = $_FILES['image']['size'];

                // Generate a unique filename
                $filename = uniqid() . '-' . $name;

                // Move the uploaded file to the desired location
                move_uploaded_file($tmp_name, __DIR__ . '/public/uploads/' . $filename);

                // Save the image information to the database
                // ...

                // Redirect to the image gallery page
                header('Location: /image/gallery');
                exit;
            }
        }
    }

    public function delete($id)
    {
        // Check if the user is logged in
        if (!User::isLoggedIn()) {
            // Redirect to the login page if the user is not logged in
            header('Location: /user/login');
            exit;
        }

        // Check if the image ID is valid
        if (!is_numeric($id)) {
            // Show an error message if the ID is not valid
            $error = 'Invalid image ID';
        } else {
            // Delete the image from the database
            // ...

            // Redirect to the image gallery page
            header('Location: /image/gallery');
            exit;
        }
    }
}