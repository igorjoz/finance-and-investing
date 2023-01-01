<?php




class UserValidationService
{
    public static function validateStoreData(string $name, string $email, string $password, string $repeatedPassword, User $user): bool
    {
        $isValid = true;

        if ($name == '') {
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
            FlashMessageService::error("That name is already taken");
        }

        return $isValid;
    }
}