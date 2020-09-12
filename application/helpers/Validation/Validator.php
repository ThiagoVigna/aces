<?php namespace DotFw\Infra\CrossCutting\Validation;

use DotFw\Infra\CrossCutting\Enum\ENotificationType;
use DotFw\Infra\CrossCutting\Helpers\Notification;

class Validator {

    /** @method bool IsValid() */
    public static function IsValid():bool{
        if(Notification::GetTotal('error') > 0 || Notification::GetTotal('warning') > 0):
            return false;
        else:
            return true;
        endif;
    }

    public static function IsNull($val, string $property, string $message) {
        if(is_null($val)) Notification::SetNotification($property, $message);
    }

    public static function IsEmpty($val, string $property, string $message) {
        if(empty($val)) Notification::SetNotification($property, $message);
    }

    public static function IsNullOrEmpty($val, string $property, string $message) {
        if(empty($val)) Notification::SetNotification($property, $message);
    }

}
