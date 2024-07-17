<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Recompenza.php';

class ServiceReward extends System
{
    public static function newReward($actividad, $costo, $puntos)
    {
        try {
            $actividad         = parent::limpiarString($actividad);
            $costo    = parent::limpiarString($costo);
            $puntos         = parent::limpiarString($puntos);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = Recompenza::newReward($actividad, $costo, $puntos, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setReward($id_recompenza, $actividad, $costo,  $puntos)
    {
        try {
            $id_recompenza  = parent::limpiarString($id_recompenza);
            $actividad      = parent::limpiarString($actividad);
            $costo          = parent::limpiarString($costo);
            $puntos         = parent::limpiarString($puntos);

            $result = Recompenza::setReward($id_recompenza, $actividad, $costo, $puntos);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getReward($id_recompenza)
    {
        try {
            $id_recompenza = parent::limpiarString($id_recompenza);

            $result = Recompenza::getReward($id_recompenza);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteReward($id_recompenza)
    {
        try {
            $id_recompenzas_pagina = parent::limpiarString($id_recompenza);

            $result = Recompenza::deleteReward($id_recompenzas_pagina);
            if ($result) header('Location:Rewards?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableReward()
    {
        try {
            $tableHtml = "";
            $modelResponse = Recompenza::listReward();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_recompenza() . '</td>';
                    $tableHtml .= '<td>' . $valor->getActividad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getCosto() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("reward", $valor->getId_recompenza()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
