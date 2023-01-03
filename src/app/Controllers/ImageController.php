<?php

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
        $watermark = Helper::post('watermark_text');
        $access = Helper::post('access');
        $public = false;

        $isValid = ImageValidationService::validateStoreData($user, $author, $title, $watermark, $access);

        if ($access === '') {
            if ($user) {
                $isValid = false;
            } else {
                $public = true;
            }
        } else if ($access === 'public') {
            $public = true;
        } else {
            $public = false;
        }

        if (isset($_FILES['image']) and $_FILES['image']['size'] > 0) {
            $filePath = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = mime_content_type($filePath);
            $fileExtension = explode('/', $fileType)[1];

            if ($fileExtension !== 'jpeg' and $fileExtension !== 'png') {
                $isValid = false;
                FlashMessageService::error("\"{$fileType}\" is not an allowed file type");
            }

            if ($fileSize > 1024 * 1024) {
                $isValid = false;
                FlashMessageService::error("The image exceeds the maximum allowed file size (1 MB)");
            }
        } else {
            $isValid = false;
            FlashMessageService::error("You haveb't selected an image");
        }

        if ($isValid) {
            $image = new Image($author, $title, $public, $fileExtension);
            $image->save();
            $id = $image->getId();
            $name = $id . "." . $fileExtension;
            $path = getcwd() . "/images/uploads/" . $name;

            if (!rename($filePath, $path)) {
                FlashMessageService::error("Saving the file has failed.");
            }

            $thumbnailPath = getcwd() . "/images/uploads/thumbnails/{$id}.png";
            ImageService::createThumbnail($path, $thumbnailPath, $fileExtension);

            $watermarkPath = getcwd() . "/images/uploads/preview/{$id}.png";
            ImageService::createWatermark($path, $watermarkPath, $fileExtension, $watermark);

            FlashMessageService::info('Image has been uploaded successfully!');
        }

        // return new RedirectView('/images', 303);
        require_once '../views/image/index.php';
    }

    public function index()
    {
        $user = User::getCurrentUser();
        // $images = Image::getAll();

        // $images = array_filter($images, function ($image) use ($user) {
        //     // return $image->public or ($user and $image->author === $user->login);
        //     return $image->public;
        // });

        // paginate images



        // $page = 1;
        // $pageSize = 3;

        // $opts = [
        //     'skip' => ($page - 1) * $pageSize,
        //     'limit' => $pageSize
        // ];

        // $images = Database::get()->images->find([], $opts)->toArray()[2];
        // $images = Database::get()->images->find([], $opts)->toArray()[2];

        // var_dump($images);

        // $images = array_values($images);

        // var_dump($images);

        // $images = array_filter($images, function ($image) use ($user) {
        //     return $image->public || ($user && $image->author == $user->login);
        // });

        // return new LayoutView('imglist', ['images' => $images]);
        require_once '../views/image/index.php';
    }

    public function search()
    {
        return new LayoutView('search');
    }

    public function get()
    {
        $user = User::getCurrentUser();
        $title = $_GET['title'];

        $images = Image::getAll([
            'title' => new MongoDB\BSON\Regex($title, 'i')
        ]);

        $images = array_values(array_filter($images, function ($image) use ($user) {
            return $image->public or ($user and $user->login == $image->author);
        }));

        $ids = array_map(function ($image) {
            return $image->id();
        }, $images);

        return new JsonView($ids);
    }
}