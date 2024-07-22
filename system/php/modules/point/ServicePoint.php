<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServicePoint extends System
{
    public static function newPoint($puntos, $id_usuario)
    {
        try {
            $puntos         = parent::limpiarString($puntos);
            $id_usuario    = parent::limpiarString($id_usuario);
            $fecha_registro = date('Y-m-d H:i:s');
            $id_administrador = $_SESSION['id'];

            $result = Punto::newPoint($puntos, $id_usuario, $id_administrador, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPoint($id_punto,  $puntos)
    {
        try {
            $id_punto      = parent::limpiarString($id_punto);
            $puntos            = parent::limpiarString($puntos);

            $result = Punto::setPoint($id_punto, $puntos);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getPoint($id_punto)
    {
        try {
            $id_punto = parent::limpiarString($id_punto);

            $result = Punto::getPoint($id_punto);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deletePoint($id_punto)
    {
        try {
            $id_puntos_pagina = parent::limpiarString($id_punto);

            $result = Punto::deletePoint($id_puntos_pagina);
            if ($result) header('Location:Points?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablePoint()
    {
        try {
            $tableHtml = "";
            $modelResponse = Punto::listPoint();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_punto() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getAdministradorDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    if ($_SESSION['id'] == 0 || $_SESSION['id'] == 5) {
                        $tableHtml .= '<td>' . Elements::crearBotonVer("point", $valor->getId_punto()) . '</td>';
                    }
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
