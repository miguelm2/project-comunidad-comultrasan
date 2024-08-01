<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServicePoint extends System
{
    public static function newPoint($puntos, $id_usuario, $id_administrador, $descripcion)
    {
        try {
            $puntos         = parent::limpiarString($puntos);
            $id_usuario    = parent::limpiarString($id_usuario);
            $fecha_registro = date('Y-m-d H:i:s');
            $id_administrador = parent::limpiarString($id_administrador);
            $descripcion = parent::limpiarString($descripcion);

            $result = Punto::newPoint($puntos, $id_usuario, $id_administrador, $descripcion, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPoint($id_punto,  $puntos, $descripcion)
    {
        try {
            $id_punto      = parent::limpiarString($id_punto);
            $puntos        = parent::limpiarString($puntos);
            $descripcion   = parent::limpiarString($descripcion);

            $result = Punto::setPoint($id_punto, $puntos, $descripcion);

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
                    $tableHtml .= '<td class="text-wrap">' . $valor->getDescripcion() . '</td>';
                    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                        $tableHtml .= '<td>' . Elements::crearBotonVer("point", $valor->getId_punto()) . '</td>';
                    }
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablePointByUser()
    {
        try {
            $tableHtml = "";
            $id_usuario = $_SESSION['id'];
            $modelResponse = Punto::listPointByUser($id_usuario);
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getPointsByUser()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $total = Punto::getSumPointsByUser($id_usuario);
            return $total;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
