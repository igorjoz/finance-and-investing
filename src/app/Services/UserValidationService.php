<?php

class UserValidationService
{
    public static function validateStoreData(string $login, string $email, string $password, string $repeatedPassword, $user): bool
    {
        $isValid = true;

        if ($login == '') {
            $isValid = false;
            FlashMessageService::error("The login field is empty");
        }

        if ($email == '') {
            $isValid = false;
            FlashMessageService::error("The email address is empty");
        }

        if ($password == '') {
            $isValid = false;
            FlashMessageService::error("The password is empty");
        }

        if ($repeatedPassword != $password) {
            $isValid = false;
            FlashMessageService::error("You mistyped password or repeated password - they have to be exactly the same");
        }

        if ($user) {
            $isValid = false;
            FlashMessageService::error("That login is already taken by other user");
        }

        return $isValid;
    }
}