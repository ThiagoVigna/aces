<?php namespace DotFw\Infra\CrossCutting\Helpers;

class FloatHelper {
    public static function Parse($value){
        $value = (float) str_replace(['.',','], ['','.'], $value);
        return $value;
    }
}