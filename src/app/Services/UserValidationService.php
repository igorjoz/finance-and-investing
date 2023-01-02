<?php




class UserValidationService
{
    public static function validateStoreData(string $login, string $email, string $password, string $repeatedPassword, $user): bool
    {
        $isValid = true;

        if ($login == '') {
            $isValid = false;
            FlashMessageService::error("Name can't be empty");
        }

        if ($email == '') {
            $isValid = false;
            FlashMessageService::error("Email can't be empty");
        }

        if ($password == '') {
            $isValid = false;
            FlashMessageService::error("Password can't be empty");
        }

        if ($repeatedPassword != $password) {
            $isValid = false;
            FlashMessageService::error("Passwords have to be the same");
        }

        if ($user) {
            $isValid = false;
            FlashMessageService::error("That login is already taken");
        }

        return $isValid;
    }
}