<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Foro.php';

class ServiceForum extends System
{
    public static function newForum($id_tipo_comunidad, $id_usuario, $contenido, $megusta, $titulo)
    {
        try {

            if (basename($_SERVER['PHP_SELF']) == 'newForum.php') {
                $id_tipo_comunidad  = parent::limpiarString($id_tipo_comunidad);
                $id_usuario         = parent::limpiarString($id_usuario);
                $contenido          = parent::limpiarString($contenido);
                $megusta            = parent::limpiarString($megusta);
                $titulo             = parent::limpiarString($titulo);
                $fecha_registro     = date('Y-m-d H:i:s');

                $result = Foro::newForum($id_tipo_comunidad, $id_usuario, $contenido,  $megusta, $titulo, $fecha_registro);

                if ($result) {
                    $foroDTO = Foro::getLastForumByTypeCommunity($id_tipo_comunidad, $id_usuario);
                    header('Location:forum?forum=' . $foroDTO->getId_foro() . '&new');
                }
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
            if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
                $id_foro        = parent::limpiarString($id_foro);
                $foroDTO = Foro::getForum($id_foro);
                return $foroDTO;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listForumByTypeCommunity($id_tipo_comunidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'forums.php') {
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
            }
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
    public static function getTimePublicate($fechaBD)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
                $fechaBD = new DateTime($fechaBD);
                $fechaActual = new DateTime();
                $diferencia = $fechaActual->diff($fechaBD);

                if ($diferencia->y > 0) {
                    return "Hace " . $diferencia->y . " años.";
                } elseif ($diferencia->m > 0) {
                    return "Hace " . $diferencia->m . " meses.";
                } elseif ($diferencia->d > 0) {
                    return "Hace " . $diferencia->d . " días.";
                } elseif ($diferencia->h > 0) {
                    return "Hace " . $diferencia->h . " horas.";
                } elseif ($diferencia->i > 0) {
                    return "Hace " . $diferencia->i . " minutos.";
                } else {
                    return "Hace un momento.";
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
