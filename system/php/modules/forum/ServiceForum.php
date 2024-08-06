<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Foro.php';

class ServiceForum extends System
{
    public static function newForum($id_tipo_comunidad, $id_usuario, $contenido, $megusta, $titulo)
    {
        try {
            $id_tipo_comunidad  = parent::limpiarString($id_tipo_comunidad);
            $id_usuario         = parent::limpiarString($id_usuario);
            $contenido          = parent::limpiarString($contenido);
            $megusta            = parent::limpiarString($megusta);
            $titulo             = parent::limpiarString($titulo);
            $fecha_registro     = date('Y-m-d H:i:s');

            $result = Foro::newForum($id_tipo_comunidad, $id_usuario, $contenido,  $megusta, $titulo, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setForum($id_foro, $contenido, $titulo)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);
            $contenido      = parent::limpiarString($contenido);
            $titulo         = parent::limpiarString($titulo);

            $result = Foro::setForum($id_foro, $contenido, $titulo);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setLiked($id_foro, $megusta)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);
            $megusta      = parent::limpiarString($megusta);

            $result = Foro::setForumLiked($id_foro, $megusta);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getForum($id_foro)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);

            $foroDTO = Foro::getForum($id_foro);

            return $foroDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listForumByTypeCommunity($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad        = parent::limpiarString($id_tipo_comunidad);
            $tableHtml = '';
            $modelResponse = Foro::listForumByTypeCommunity($id_tipo_comunidad);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= Elements::getCardForum(
                        $valor->getUsuarioDTO()->getImagen(),
                        $valor->getTitulo(),
                        $valor->getUsuarioDTO()->getNombre(),
                        $valor->getId_foro()
                    );
                }
            } else {
                return '<div class="text-center fs-4 p-4">No hay datos para mostrar</div>';
            }

            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteForum($id_foro)
    {
        try {
            $id_foro        = parent::limpiarString($id_foro);

            $result = Foro::deleteForum($id_foro);
            if ($result) {
                header('Location:&delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
