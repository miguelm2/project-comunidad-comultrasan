<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/ComunidadGrupoInteres.php';

class ServiceCommunityGroupInterest extends System
{
    public static function newCommunityGroupInterest($id_comunidad, $id_grupo)
    {
        try {
            $id_comunidad         = parent::limpiarString($id_comunidad);
            $id_grupo    = parent::limpiarString($id_grupo);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = ComunidadGrupoInteres::newCommunityGroupInterest($id_comunidad, $id_grupo, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
