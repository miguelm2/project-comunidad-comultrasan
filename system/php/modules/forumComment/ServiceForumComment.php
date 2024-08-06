<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/ComentarioForo.php';

class ServiceForumComment extends System
{
    public static function newForumComment($id_foro, $id_usuario, $comentario)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);
            $id_usuario     = parent::limpiarString($id_usuario);
            $comentario     = parent::limpiarString($comentario);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = ComentarioForo::newForumComment($id_foro, $id_usuario, $comentario, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setForumComment($id_comentario, $comentario)
    {
        try {
            $id_comentario  = parent::limpiarString($id_comentario);
            $comentario     = parent::limpiarString($comentario);

            $result = ComentarioForo::setForumComment($id_comentario, $comentario);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getForumComment($id_comentario)
    {
        try {
            $id_comentario        = parent::limpiarString($id_comentario);

            $comentarioForoDTO = ComentarioForo::getForumComment($id_comentario);

            return $comentarioForoDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listForumCommentByForum($id_foro)
    {
        try {
            $id_tipo_comunidad        = parent::limpiarString($id_foro);
            $tableHtml = '';
            $modelResponse = ComentarioForo::listForumCommentByForum($id_foro);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr class="text-center">';
                    $tableHtml .= '<td>' . $valor->getId_comentario() . '</td>';
                    $tableHtml .= '<td class="text-warp">' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td class="text-warp">' . $valor->getComentario() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("forum", $valor->getId_comentario()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr class="text-center"><td colspan="4">No hay registros para mostrar</td></tr>';
            }

            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteForumComment($id_comentario)
    {
        try {
            $id_comentario        = parent::limpiarString($id_comentario);

            $result = ComentarioForo::deleteForumComment($id_comentario);
            if ($result) {
                header('Location:&delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
