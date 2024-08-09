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
}
