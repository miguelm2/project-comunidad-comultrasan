<?php
class Log
{
    public static function setLog($text, $level = 'i')
    {
        switch (strtolower($level)) {
            case 'e':
            case 'error':
                $level = 'ERROR';
                break;
            case 'i':
            case 'info':
                $level = 'INFO';
                break;
            case 'd':
            case 'debug':
                $level = 'DEBUG';
                break;
            default:
                $level = 'INFO';
        }

        $file = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_LOG_ADMIN;
        if (isset($_SESSION['tipo'])) {
            switch ($_SESSION['tipo']) {
                case 0:
                case 5:
                    $file = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_LOG_ADMIN;
                    break;
                case 1:
                    $file = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_LOG_USER;
                    break;
                case 2:
                    $file = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_LOG_MANAGER;
                    break;
            }
        }


        error_log(date("[Y-m-d H:i:s]") . "\t[" . $level . "]\t[" . basename(__FILE__) . "]\t" . $text . "\n", 3, $file);
    }
}
