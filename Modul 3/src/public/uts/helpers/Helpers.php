<?php

class Helpers
{
    static public function redirect($location)
    {
        header('Location: ' . $location);
        exit;
    }
    
    static function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
