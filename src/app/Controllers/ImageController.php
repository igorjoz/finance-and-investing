<?php

// require_once '../Models/User.php';
// require_once '../Services/PathService.php';
// require_once '../Services/Helper.php';

// class ImageController
// {
//     public function upload()
//     {
//         // Check if the user is logged in
//         if (!User::isLoggedIn()) {
//             // Redirect to the login page if the user is not logged in
//             header('Location: /user/login');
//             exit;
//         }

//         // Render the image upload form view
//         require_once('views/image/upload.php');

//         // Handle form submission
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             // Validate the form data
//             // ...

//             // Check if the file was uploaded successfully
//             if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
//                 // Get the file information
//                 $tmp_name = $_FILES['image']['tmp_name'];
//                 $name = $_FILES['image']['name'];
//                 $size = $_FILES['image']['size'];

//                 // Generate a unique filename
//                 $filename = uniqid() . '-' . $name;

//                 // Move the uploaded file to the desired location
//                 move_uploaded_file($tmp_name, __DIR__ . '/public/uploads/' . $filename);

//                 // Save the image information to the database
//                 // ...

//                 // Redirect to the image gallery page
//                 header('Location: /image/gallery');
//                 exit;
//             }
//         }
//     }

//     public function delete($id)
//     {
//         // Check if the user is logged in
//         if (!User::isLoggedIn()) {
//             // Redirect to the login page if the user is not logged in
//             header('Location: /user/login');
//             exit;
//         }

//         // Check if the image ID is valid
//         if (!is_numeric($id)) {
//             // Show an error message if the ID is not valid
//             $error = 'Invalid image ID';
//         } else {
//             // Delete the image from the database
//             // ...

//             // Redirect to the image gallery page
//             header('Location: /image/gallery');
//             exit;
//         }
//     }
// }






require_once '../app/Models/Image.php';
require_once '../app/Models/User.php';
require_once '../app/Services/ImageService.php';
require_once '../app/Services/ImageValidationService.php';
require_once '../app/Services/PathService.php';
require_once '../app/Services/Helper.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';
require_once '../views/JsonView.php';

class ImageController
{
    public function create()
    {
        require_once '../views/image/create.php';
    }

    public function store()
    {
        $user = User::getCurrentUser();

        $author = Helper::post('author');
        $title = Helper::post('title');
        $public = Helper::post('public');
        $watermark = Helper::post('watermark');
        $access = Helper::post('access');

        $isValid = ImageValidationService::validateStoreData($user, $author, $title, $watermark, $access);

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $filePath = $_FILES['image']['tmp_name'];
            $type = mime_content_type($filePath);
            $format = explode('/', $type)[1];
            if ($format !== 'jpeg' && $format !== 'png') {
                $isValid = false;
                FlashMessageService::error("\"{$type}\" is not an acceptable file type");
            }

            $fileSize = $_FILES['image']['size'];
            if ($fileSize > 1024 * 1024) {
                $isValid = false;
                FlashMessageService::error("The image is too big (max 1 MB)");
            }
        } else {
            $isValid = false;
            FlashMessageService::error("File can't be empty");
        }

        if ($isValid) {
            $image = new Image($author, $title, $public, $format);
            $image->save();
            $id = $image->id();
            $name = "{$id}.{$format}";
            $path = getcwd() . "/images/{$name}";
            if (!rename($filePath, $path)) {
                FlashMessageService::error("Couldn't save file");
            }

            $thumbnailPath = getcwd() . "/thumb/{$id}.png";
            ImageService::generateThumbnail($path, $thumbnailPath, $format);

            $watermarkPath = getcwd() . "/preview/{$id}.png";
            ImageService::generateWatermark($path, $watermarkPath, $format, $watermark);

            FlashMessageService::info('Image added');
        }

        return new RedirectView('/images', 303);
    }

    public function index()
    {
        $user = User::getCurrentUser();
        $images = Image::getAll();

        $images = array_filter($images, function ($image) use ($user) {
            return $image->public || ($user && $image->author == $user->login);
        });

        return new LayoutView('imglist', ['images' => $images]);
    }

    public function search()
    {
        return new LayoutView('search');
    }

    public function get()
    {
        $title = $_GET['title'];
        $images = Image::getAll([
            'title' => new MongoDB\BSON\Regex($title, 'i')
        ]);
        $user = User::getCurrentUser();
        $images = array_values(array_filter($images, function ($image) use ($user) {
            return $image->public || ($user && $user->login == $image->author);
        }));
        $ids = array_map(function ($image) {
            return $image->id();
        }, $images);
        return new JsonView($ids);
    }
}