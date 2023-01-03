<?php

require_once '../app/Services/FlashMessageService.php';

class ImageValidationService
{
    public static function validateStoreData($user, string $author, string $title, string $watermark, string $access): bool
    {
        $isValid = true;

        if ($user) {
            $author = $user->login;
        } else {
            $author = Helper::post('author');
            if ($author == '') {
                $isValid = false;
                FlashMessageService::error("Author can't be empty");
            }
        }

        if ($title == '') {
            $isValid = false;
            FlashMessageService::error("Title can't be empty");
        }

        if ($watermark == '') {
            $isValid = false;
            FlashMessageService::error("Watermark can't be empty");
        }

        return $isValid;
    }
}