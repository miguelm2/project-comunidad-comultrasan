<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';

class ServiceCommunity extends System
{
    public static function newCommunity($nombre)
    {
        try {
            $id_usuario    = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');
            $nombre = parent::limpiarString($nombre);

            $result = Comunidad::newCommunity($nombre, $id_usuario, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);

            $result = Comunidad::getCommunity($id_comunidad);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteCommunity($id_Comunidad)
    {
        try {
            $id_Comunidads_pagina = parent::limpiarString($id_Comunidad);

            $result = Comunidad::deleteCommunity($id_Comunidads_pagina);
            if ($result) header('Location:Communitys?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableCommunity()
    {
        try {
            $tableHtml = "";
            $modelResponse = Comunidad::listCommunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_comunidad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("community", $valor->getId_comunidad()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="4">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUnitedCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);
            if (!$comunidadDTO) {
                return Elements::getUnitedCommunity();
            } else {
                return Elements::getUnitedCommunityReady(
                    $comunidadDTO->getNombre(),
                    $comunidadDTO->getUsuarioDTO()->getNombre(),
                    1,
                    $comunidadDTO->getFecha_registro(),
                    $comunidadDTO->getId_comunidad(),
                    10
                );
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
