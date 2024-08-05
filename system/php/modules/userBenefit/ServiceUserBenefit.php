<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioBeneficio.php';

class ServiceUserBenefit extends System
{
    public static function newUserBenefit($id_usuario, $id_beneficio)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_beneficio    = parent::limpiarString($id_beneficio);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioBeneficio::newUserBenefit($id_usuario, $id_beneficio, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
