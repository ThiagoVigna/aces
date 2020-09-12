<?php namespace DotFw\Infra\CrossCutting\Validation;

use DotFw\Infra\CrossCutting\Helpers\Notification;

class IntValidator extends Validator {
    public static function IsGreaterThan(int $val, int $comparer, string $property, string $messageIfFalse){
        if($val > $comparer):
            return true;
        else:
            Notification::SetNotification($property, $messageIfFalse);
            return false;
        endif;
    }

    public static function IsGreaterOrEqualsThan(int $val, int $comparer, string $property, string $messageIfFalse){
        if($val >= $comparer):
            return true;
        else:
            Notification::SetNotification($property, $messageIfFalse);
            return false;
        endif;
    }

    public static function IsLowerThan(int $val, int $comparer, string $property, string $message){
        if($val < $comparer) Notification::SetNotification($property, $message);
    }

    public static function IsLowerOrEqualsThan(int $val, int $comparer, string $property, string $message){
        if($val <= $comparer) Notification::SetNotification($property, $message);
    }

    public static function IsBetween(int $val, int $from, int $to, string $property, string $messageIfFalse){
        if($val <= $from && $val >= $to):
            Notification::SetNotification($property, $messageIfFalse);
            return true;
        else:
            return false;
        endif;
    }

    public static function AreEquals(int $val, int $compare, string $property, string $messageIfFalse) : bool{
        if($val === $compare):
            return true;
        else:
            Notification::SetNotification($property, $messageIfFalse);
            return false;
        endif;
    }

    public static function AreNotEquals(int $val, int $compare, string $property, string $messageIfFalse) : bool{
        if($val !== $compare):
            return true;
        else:
            Notification::SetNotification($property, $messageIfFalse);
            return false;
        endif;
    }
}