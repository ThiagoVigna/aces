<?php
/*CONSTANTES PERSONALIZADAS*/
const DIR_BASE = __DIR__ . '/';
const DIR_STORAGE = DIR_BASE . "storage/";
const DIR_USERS = DIR_STORAGE . "users/";
const KEY = "sdf bhjkfdsl hfklfh jkweo hf sdjklh r34jipo yr548930 yrfuiophfjeklr thuio yr7uo hgewolrghuio3 heuiwo huioq wy7380 5yr93op fhuklrtf huiwo";

/*CONFIGURAÇÕES PERSONALIZADAS*/
date_default_timezone_set ('America/Sao_Paulo');

/*INCLUDES NECESSÁRIOS*/
require_once('application/helpers/Helpers/Token.php');
require_once('application/helpers/Helpers/Notification.php');
require_once('application/helpers/Validation/Validator.php');
require_once('application/helpers/Validation/DateAndTimeValidator.php');
require_once('application/helpers/Validation/DocumentsValidator.php');
require_once('application/helpers/Validation/EnumValidator.php');
require_once('application/helpers/Validation/IntValidator.php');
require_once('application/helpers/Validation/StringValidator.php');
require_once('application/third_party/entities/PersonEntity.php');
require_once('application/third_party/entities/CredentialsEntity.php');
require_once('application/helpers/Services/Cipher.php');