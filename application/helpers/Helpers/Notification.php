<?php namespace DotFw\Infra\CrossCutting\Helpers;

use DotFw\Infra\CrossCutting\Enum\EConfigConstants;
use DotFw\Infra\CrossCutting\Enum\ENotificationType;

class Notification{
	private static $notifications;

    public static function GetNotifications(){
        if( isset($_SESSION['notifications']) ):
            self::$notifications = $_SESSION['notifications'];
            self::DeleteAll();
            return self::$notifications;
        else:
            return null;
        endif;
    }

    public static function GetTotal($type = 'error'){
        $total = 0;
        if( !is_null(self::$notifications) ):
            foreach( self::$notifications as $notification ):
                if($notification['type'] == $type) $total++;
            endforeach;
        endif;

        return $total;
    }

    public static function DeleteAll(){
        unset($_SESSION['notifications']);
    }

    public static function SetNotification(string $property, string $message, $type = 'error'){
        self::$notifications[] = array(
            'property' => $property,
            'message'  => $message,
            'type' => $type
        );

        $_SESSION['notifications'] = self::$notifications;
    }
}
