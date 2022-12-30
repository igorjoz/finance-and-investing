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




// <?php
// require_once '../models/Img.php';
// require_once '../views/LayoutView.php';
// require_once '../views/RedirectView.php';
// require_once '../views/JsonView.php';
// require_once '../image_helpers.php';

// class ImgController {
//   public function new() {
//     return new LayoutView('imgnew');
//   }

//   public function add() {
//     $user = currentUser();
//     $valid = true;

//     if ($user) {
//       $author = $user->name;
//     } else {
//       $author = post('author');
//       if ($author == '') {
//         $valid = false;
//         Flash::error("Author can't be empty");
//       }
//     }

//     $title = post('title');
//     if ($title == '') {
//       $valid = false;
//       Flash::error("Title can't be empty");
//     }

//     $watermark = post('watermark');
//     if ($watermark == '') {
//       $valid = false;
//       Flash::error("Watermark can't be empty");
//     }

//     $access = post('access');
//     if ($access == '') {
//       if ($user) {
//         $valid = false;
//       } else {
//         $public = true;
//       }
//     } else {
//       $public = $access == 'public';
//     }

//     if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
//       $filePath = $_FILES['img']['tmp_name'];
//       $type = mime_content_type($filePath);
//       $format = explode('/', $type)[1];
//       if ($format !== 'jpeg' && $format !== 'png') {
//         $valid = false;
//         Flash::error("\"{$type}\" is not an acceptable file type");
//       }

//       $fileSize = $_FILES['img']['size'];
//       if ($fileSize > 1024 * 1024) {
//         $valid = false;
//         Flash::error("The image is too big (max 1 MB)");
//       }
//     } else {
//       $valid = false;
//       Flash::error("File can't be empty");
//     }

//     if ($valid) {
//       $img = new Img($author, $title, $public, $format);
//       $img->save();
//       $id = $img->id();
//       $name = "{$id}.{$format}";
//       $path = getcwd() . "/images/{$name}";
//       if (!rename($filePath, $path)) {
//         Flash::error("Couldn't save file");
//       }

//       $thumbnailPath = getcwd() . "/thumb/{$id}.png";
//       generateThumbnail($path, $thumbnailPath, $format);

//       $watermarkPath = getcwd() . "/preview/{$id}.png";
//       generateWatermark($path, $watermarkPath, $format, $watermark);

//       Flash::info('Image added');
//     }

//     return new RedirectView('/img/new', 303);
//   }

//   public function index() {
//     $user = currentUser();
//     $imgs = Img::getAll();
//     $imgs = array_filter($imgs, function ($img) use ($user) {
//       return $img->public || ($user && $img->author == $user->name);
//     });
//     return new LayoutView('imglist', ['imgs' => $imgs]);
//   }

//   public function search() {
//     return new LayoutView('search');
//   }

//   public function get() {
//     $title = $_GET['title'];
//     $imgs = Img::getAll([
//       'title' => new MongoDB\BSON\Regex($title, 'i')
//     ]);
//     $user = currentUser();
//     $imgs = array_values(array_filter($imgs, function ($img) use ($user) {
//       return $img->public || ($user && $user->name == $img->author);
//     }));
//     $ids = array_map(function ($img) {
//       return $img->id();
//     }, $imgs);
//     return new JsonView($ids);
//   }
// }