<?php namespace DotFw\Infra\CrossCutting\Validation;

use DotFw\Infra\CrossCutting\Helpers\Notification;

class StringValidator extends Validator{
    /**
     * Gera uma notificação caso o valor da string seja nullo ou falso.
     * @method void IsNotNullOrEmpty(string $val, string $messageIfFalse);
     */
    public static function IsNotNullOrEmpty(string $val, string $property, string $messageIfFalse) {
        if(is_null($val) || empty($val)) Notification::SetNotification($property, $messageIfFalse);
    }

    public static function HasMinLen($val, int $min, string $property, string $messageIfFalse) {
        if(strlen($val) < $min) Notification::SetNotification($property, $messageIfFalse);
    }

    /* Notifica se passar da quantidade máxima de caracteres permitidos. */
    public static function HasMaxLen($val, int $max, string $property, string $message) {
        if(strlen($val) > $max) Notification::SetNotification($property, $message);
    }

    public static function HasLen(string $val, int $len, string $property, string $messageIfFalse) {
        if(strlen($val) != $len) Notification::SetNotification($property, $messageIfFalse);
    }

    public static function Contains(string $val, string $text, string $property, string $messageIfFalse) {
        if(strpos($val, $text)) Notification::SetNotification($property, $messageIfFalse);
    }

    public static function IsNotEmail(string $email, string $property, string $messageIfFalse) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) Notification::SetNotification($property, $messageIfFalse);
    }

    public static function IsNotEmailOrEmpty(string $email, string $property, string $message) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) Notification::SetNotification($property, $message);
    }

    public static function IsUrl(string $url, string $property, string $messageIfFalse) {
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)):
            Notification::SetNotification($property, $messageIfFalse);
        endif;
    }

    public static function IsNotUrlOrEmpty(string $url, string $property, string $messageIfFalse) {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url) or empty($url)):
            Notification::SetNotification($property, $messageIfFalse);
        endif;
    }

}
