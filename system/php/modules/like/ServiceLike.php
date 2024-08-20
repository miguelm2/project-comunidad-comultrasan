<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MeGusta.php';

class ServiceLike extends System
{
    public static function newLike($id_foro)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);
            $id_usuario     = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');

            $result = MeGusta::newLike($id_foro, $id_usuario,  $fecha_registro);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteLike($id_foro)
    {
        try {
            $id_foro    = parent::limpiarString($id_foro);
            $id_usuario = $_SESSION['id'];

            $result = MeGusta::deleteLike($id_foro, $id_usuario);
            if ($result) {
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCountLikeByForum($id_foro)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);

            $contador = MeGusta::getCountLikesByForum($id_foro);
            return $contador;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getLike($id_foro)
    {
        try {
            $id_foro = parent::limpiarString($id_foro);
            $id_usuario = $_SESSION['id'];
            $meGustaDTO = MeGusta::getLikeByUserAndForum($id_foro, $id_usuario);
            return $meGustaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
