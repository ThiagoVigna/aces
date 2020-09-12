<?php namespace DotFw\Infra\CrossCutting\Validation;

use DotFw\Infra\CrossCutting\Enum\EAbstract;
use DotFw\Infra\CrossCutting\Helpers\Notification;
use http\Exception\UnexpectedValueException;

class EnumValidator extends Validator{

    /**
     * Valida se o objeto enum contém a propriedade informada
     * @method bool ContainsProperty(string $constant, string $enum, string $property, string $message)
     *
     * @method string $constant
     * @method string $enum
     * @method string $property
     * @method string $message
     *
     * @return bool;
     */
    public static function Contains(string $constant, $enum, string $property, string $message){
        $enum = (array) $enum;
        if( in_array($constant, $enum) ) Notification::SetNotification($property, $message);
    }

    public static function DoesNotContain(string $constant, $enum, string $property, string $message){
        $enum = (array) $enum;
        if( !in_array($constant, $enum) ) Notification::SetNotification($property, $message);
    }
}