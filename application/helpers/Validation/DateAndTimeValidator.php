<?php namespace DotFw\Infra\CrossCutting\Validation;

use \DateTime;
use DotFw\Infra\CrossCutting\Helpers\Notification;

/* Realiza validações com datas */
class DateAndTimeValidator extends Validator {

    /**
     * Compara se uma data é igual a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method AreEquals(string $date, string $dateCompare, string $property, string $messageIfFalse)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function AreEquals(string $date, string $dateCompare, string $property, string $message) {
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() == $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data não é igual a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method AreNotEquals(string $date, string $dateCompare, string $property, string $messageIfFalse)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function AreNotEquals(string $date, string $dateCompare, string $property, string $message) {
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() != $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data maior que a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsGreaterThan(string $date, string $dateCompare, string $property, string $message)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function IsGreaterThan(string $date, string $dateCompare, string $property, string $message){
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() >= $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data não é maior ou igual a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsGreaterOrEqualsThan(string $date, string $dateCompare, string $property, string $messageIfFalse)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function IsGreaterOrEqualsThan(string $date, string $dateCompare, string $property, string $message){
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() >= $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data não é menor que a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsLowerThan(string $date, string $dateCompare, string $property, string $message)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function IsLowerThan(string $date, string $dateCompare, string $property, string $message){
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() < $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data não é menor ou igual que a outra. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsLowerOrEqualsThan(string $date, string $dateCompare, string $property, string $message)
     * @param string $date
     * @param string $dateCompare
     * @param string $property
     * @param string $message
     */
    public static function IsLowerOrEqualsThan(string $date, string $dateCompare, string $property, string $message){
        $date = new DateTime($date);
        $dateCompare = new DateTime($dateCompare);

        if($date->getTimestamp() <= $dateCompare->getTimestamp()):
            Notification::SetNotification($property, $message);
        endif;
    }

    /**
     * Compara se uma data está entre um intervalo permitido. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsBetween(int $date, int $fromDate, int $toDate, string $property, string $message)
     * @param string $date
     * @param string $fromDate
     * @param string $toDate
     * @param string $property
     * @param string $message
     */
    public static function IsBetween(int $date, int $fromDate, int $toDate, string $property, string $message){
        $date = new DateTime($date);
        $fromDate = new DateTime($fromDate);
        $toDate = new DateTime($toDate);

        if($date->getTimestamp() <= $fromDate->getTimestamp() && $date->getTimestamp() >= $toDate->getTimestamp()):
            Notification::SetNotification($property, $message);
            return true;
        else:
            return false;
        endif;
    }

    /**
     * Compara se uma data não está entre um intervalo permitido. Se o resultado for VERDADEIRO, emite alerta.
     * @method IsNotBetween(int $date, int $fromDate, int $toDate, string $property, string $message)
     * @param string $date
     * @param string $fromDate
     * @param string $toDate
     * @param string $property
     * @param string $message
     */
    public static function IsNotBetween(int $date, int $fromDate, int $toDate, string $property, string $message){
        $date = new DateTime($date);
        $fromDate = new DateTime($fromDate);
        $toDate = new DateTime($toDate);

        if($date->getTimestamp() >= $fromDate->getTimestamp() && $date->getTimestamp() <= $toDate->getTimestamp()):
            Notification::SetNotification($property, $message);
            return true;
        else:
            return false;
        endif;
    }
}