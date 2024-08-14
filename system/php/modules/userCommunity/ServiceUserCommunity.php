<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioComunidad.php';

class ServiceUserCommunity extends System
{
    public static function newUserCommunity($id_usuario, $id_comunidad)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_comunidad    = parent::limpiarString($id_comunidad);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function newUserCommunityJoin($id_usuario, $id_comunidad)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_comunidad    = parent::limpiarString($id_comunidad);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $fecha_registro);

            if ($result) {
                header('Location: community.php?new');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserOfCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $result = UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserOfCommunityByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            $result = UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_BY_LEAD, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_BY_LEAD_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUserCommunityByComummnity($id_comunidad){
        try{
            $id_comunidad = parent::limpiarString($id_comunidad);
            $modelResponse = UsuarioComunidad::getUserCommunityByCommunity($id_comunidad);
            foreach($modelResponse as $value){
                
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
