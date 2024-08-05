<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioGrupoInteres.php';

class ServiceUserGroupInterest extends System
{
    public static function newUserGroupInterest($id_usuario, $id_grupo)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_grupo    = parent::limpiarString($id_grupo);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioGrupoInteres::newUserGroupInterest($id_usuario, $id_grupo, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
