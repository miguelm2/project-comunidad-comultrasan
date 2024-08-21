<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Foro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MeGusta.php';

class ServiceForum extends System
{
    public static function newForum($id_tipo_comunidad, $id_usuario, $contenido,  $titulo)
    {
        try {

            if (basename($_SERVER['PHP_SELF']) == 'newForum.php') {
                $id_tipo_comunidad  = parent::limpiarString($id_tipo_comunidad);
                $id_usuario         = parent::limpiarString($id_usuario);
                $contenido          = parent::limpiarString($contenido);
                $titulo             = parent::limpiarString($titulo);
                $fecha_registro     = date('Y-m-d H:i:s');

                $result = Foro::newForum($id_tipo_comunidad, $id_usuario, $contenido, $titulo, $fecha_registro);

                if ($result) {
                    $foroDTO = Foro::getLastForumByTypeCommunityAndUser($id_tipo_comunidad, $id_usuario);
                    header('Location:forum?forum=' . $foroDTO->getId_foro() . '&new');
                }
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
    public static function getCardForum($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
            $foroDTO = Foro::getLastForumByTypeCommunity($id_tipo_comunidad);
            if ($foroDTO) {
                $tiempo = self::getTimePublicate($foroDTO->getFecha_registro());
                $megusta = MeGusta::getCountLikesByForum($foroDTO->getId_foro());
                return Elements::getCardForo(
                    $foroDTO->getUsuarioDTO()->getImagen(),
                    $foroDTO->getUsuarioDTO()->getNombre(),
                    $foroDTO->getContenido(),
                    $megusta,
                    $tiempo
                );
            } else {
                return '<h5>No hay foros por el momento</h5>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getButtonCreateForum()
    {
        $comunidadDTO = Comunidad::getCommunityByUser($_SESSION['id']);
        if (!$comunidadDTO) {
            $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($_SESSION['id']);
            if ($comunidadUsuario) {
                $comunidadDTO = $comunidadUsuario->getComunidadDTO();
            } else {
                return '<button class="btn btn-success disabled">No perteneces a una comunidad</button>';
            }
        }
    }
}
