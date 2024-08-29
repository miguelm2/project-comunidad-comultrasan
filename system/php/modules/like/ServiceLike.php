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
            $count = MeGusta::getCountLikesByForum($id_foro);
            if ($result) {
                return json_encode(['status' => 'liked', 'message' => 'Like agregado correctamente', 'likes' => $count]);
            } else {
                return json_encode(['status' => 'error', 'message' => 'Error al agregar el like', 'likes' => $count]);
            }
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
            $count = MeGusta::getCountLikesByForum($id_foro);
            if ($result) {
                return json_encode(['status' => 'unliked', 'message' => 'Like eliminado correctamente', 'likes' => $count]);
            } else {
                return json_encode(['status' => 'error', 'message' => 'Error al eliminar el like', 'likes' => $count]);
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
    public static function getTextButton($id_foro)
    {
        try {
            $id_foro = parent::limpiarString($id_foro);
            $megustaDTO = self::getLike($id_foro);
            $countLikes = self::getCountLikeByForum($id_foro);
            if (!$megustaDTO) {
                return '<i class="material-icons me-2">favorite</i> (' . $countLikes . ') Me gusta';
            } else {
                return '<i class="material-icons me-2">favorite</i> (' . $countLikes . ') Ya no me gusta';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
