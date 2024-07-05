<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServiceDashboard extends System
{
    public static function getCountsCardsAdmin()
    {
        try {
            $listCounts = array();
            $listCounts[0] = (NumeroVistas::getCountVisitas());
            $listCounts[1] = (Administrador::countAdministrators());
            $listCounts[2] = (Usuario::countUsuarios());
            return $listCounts;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
