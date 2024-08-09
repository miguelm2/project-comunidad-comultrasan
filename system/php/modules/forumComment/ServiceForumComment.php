<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/ComentarioForo.php';

class ServiceForumComment extends System
{
    public static function newForumComment($id_foro, $id_usuario, $comentario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
                $id_foro        = parent::limpiarString($id_foro);
                $id_usuario     = parent::limpiarString($id_usuario);
                $comentario     = parent::limpiarString($comentario);
                $fecha_registro = date('Y-m-d H:i:s');

                $result = ComentarioForo::newForumComment($id_foro, $id_usuario, $comentario, $fecha_registro);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
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
            $id_foro        = parent::limpiarString($id_foro);
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
            $comentarioForoDTO = ComentarioForo::getForumComment($id_comentario);

            $result = ComentarioForo::deleteForumComment($id_comentario);
            if ($result) {
                header('Location:forum?forum=' . $comentarioForoDTO->getForoDTO()->getId_foro() . '&delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCountForumComment($id_foro)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
                $id_foro        = parent::limpiarString($id_foro);

                $contador = ComentarioForo::countForumCommentByForum($id_foro);
                return $contador;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardCommentForumByForum($id_foro)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
                $id_foro        = parent::limpiarString($id_foro);
                $html = '';
                $modelResponse = ComentarioForo::listForumCommentByForum($id_foro);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tiempo = self::getTimePublicate($valor->getFecha_registro());
                        $btnEliminar = '';
                        if ($_SESSION['id'] == $valor->getUsuarioDTO()->getId_usuario()) {
                            $btnEliminar = Elements::getButtonDeleteCommentForum($valor->getId_comentario());
                        }
                        $html .= Elements::getCardForumComment(
                            $valor->getUsuarioDTO()->getImagen(),
                            $valor->getUsuarioDTO()->getNombre(),
                            $tiempo,
                            $valor->getComentario(),
                            $btnEliminar
                        );
                    }
                } else {
                    return '<div class="text-center fs-5">No hay comentarios aún</div>';
                }

                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getTimePublicate($fechaBD)
    {
        // Convertir la fecha en un objeto DateTime
        $fechaBD = new DateTime($fechaBD);

        // Obtener la fecha y hora actual
        $fechaActual = new DateTime();

        // Calcular la diferencia
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
}
