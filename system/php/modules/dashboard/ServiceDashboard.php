<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Beneficio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Descuento.php';

class ServiceDashboard extends System
{
    public static function getCountsCardsAdmin()
    {
        try {
            $listCounts = array();
            $listCounts[0] = (Gestor::countManager());
            $listCounts[1] = (Administrador::countAdministrators());
            $listCounts[2] = (Usuario::countUsuarios());
            return $listCounts;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getCountVisitas()
    {
        try {
            $meses       = array();
            $mant        = array();
            $listReponse = array();
            $cont = 0;

            $mes_actual   = date("n");
            $year_actual  = date("Y");

            for ($i = 1; $i <= $mes_actual; $i++) {

                $fecha_inicio = $year_actual . "-" . $i . "-01";
                $new_fecha    = new DateTime($fecha_inicio);
                $fecha_fin    = $new_fecha->format('Y-m-t');

                $meses[$cont] = Elements::mes($i);
                $mant[$cont]  = NumeroVistas::getCountVisitasByFecha($fecha_inicio, $fecha_fin);

                $cont++;
            }

            $listReponse[0] = $meses;
            $listReponse[1] = $mant;

            return json_encode($listReponse);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getCountPoints()
    {
        try {
            $meses       = array();
            $mant        = array();
            $listReponse = array();
            $cont = 0;

            $mes_actual   = date("n");
            $year_actual  = date("Y");

            for ($i = 1; $i <= $mes_actual; $i++) {

                $fecha_inicio = $year_actual . "-" . $i . "-01";
                $new_fecha    = new DateTime($fecha_inicio);
                $fecha_fin    = $new_fecha->format('Y-m-t');

                $meses[$cont] = Elements::mes($i);
                $mant[$cont]  = Punto::getCountPonitsByDate($fecha_inicio, $fecha_fin);

                $cont++;
            }

            $listReponse[0] = $meses;
            $listReponse[1] = $mant;

            return json_encode($listReponse);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getCountUser()
    {
        try {
            $meses       = array();
            $mant        = array();
            $listReponse = array();
            $cont = 0;

            $mes_actual   = date("n");
            $year_actual  = date("Y");

            for ($i = 1; $i <= $mes_actual; $i++) {

                $fecha_inicio = $year_actual . "-" . $i . "-01";
                $new_fecha    = new DateTime($fecha_inicio);
                $fecha_fin    = $new_fecha->format('Y-m-t');

                $meses[$cont] = Elements::mes($i);
                $mant[$cont]  = Usuario::countUsersByDate($fecha_inicio, $fecha_fin);

                $cont++;
            }

            $listReponse[0] = $meses;
            $listReponse[1] = $mant;

            return json_encode($listReponse);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function getTop10CommunitiesByPoints()
    {
        try {
            $mes_actual   = date("n");
            $year_actual  = date("Y");
            $mes_inicio = sprintf("%04d-%02d-01", $year_actual, $mes_actual);
            $mes_final   = date("Y-m-t", strtotime($mes_inicio));
            $result = Punto::getTop10CommunitiesByPoints($mes_inicio, $mes_final);
            return json_encode($result);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
