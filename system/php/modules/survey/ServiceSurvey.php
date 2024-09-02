<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Encuesta.php';

class ServiceSurvey extends System
{
    public static function newSurvey($nombre, $descripcion, $puntos, $mensaje)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveys.php') {
                $nombre         = parent::limpiarString($nombre);
                $descripcion    = parent::limpiarString($descripcion);
                $estado         = parent::limpiarString(1);
                $puntos         = parent::limpiarString($puntos);
                $mensaje        = parent::limpiarString($mensaje);
                $fecha_registro = date('Y-m-d H:i:s');

                $result = Encuesta::newSurvey($nombre, $descripcion, $estado,  $puntos, $mensaje, $fecha_registro);

                if ($result) {
                    $encuestaDTO = Encuesta::getLastSurvey();
                    header('Location:survey?survey=' . $encuestaDTO->getId_encuesta() . '&new');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurvey($id_encuesta, $descripcion, $nombre, $estado, $puntos, $mensaje)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'survey.php') {
                $id_encuesta  = parent::limpiarString($id_encuesta);
                $descripcion  = parent::limpiarString($descripcion);
                $nombre       = parent::limpiarString($nombre);
                $estado       = parent::limpiarString($estado);
                $puntos       = parent::limpiarString($puntos);
                $mensaje      = parent::limpiarString($mensaje);

                $result = Encuesta::setSurvey($id_encuesta, $descripcion, $nombre, $estado, $puntos, $mensaje);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurvey($id_encuesta)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $EncuestaDTO = Encuesta::getSurvey($id_encuesta);
            return $EncuestaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteSurvey($id_encuesta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'survey.php') {
                $id_encuesta = parent::limpiarString($id_encuesta);
                $result = Encuesta::deleteSurvey($id_encuesta);
                if ($result) {
                    $_SESSION['alert'] = 1;
                    header('Location:surveys?delete');
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurvey()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveys.php') {
                $tableHtml = '';
                $modelResponse = Encuesta::listSurvey();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_encuesta() . '</td>';
                        $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                        $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td align="center">' . Elements::crearBotonVer("survey", $valor->getId_encuesta()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurveyUser()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveys.php') {
                $html = '';
                $id_usuario = $_SESSION['id'];
                $modelResponse = Encuesta::listSurveyByEstateAndNotResolved($id_usuario);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $btnRealizar =  Elements::crearBotonRealizar("survey", $valor->getId_encuesta());
                        $html .= Elements::getCardSurveyUserNotResolved($valor->getNombre(), $valor->getPuntos(), $valor->getEstado()[1], $btnRealizar);
                    }
                }
                $response = Encuesta::listSurveyByEstateAndResolved($id_usuario);
                if ($response) {
                    foreach ($response as $value) {
                        $html .= Elements::getCardSurveyUserResolved($value->getNombre(), $value->getPuntos(), $value->getEstado()[1]);
                    }
                }

                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getIdLastSurveyByUser()
{
    try {
        $id_usuario = $_SESSION['id'];
        $encuestaDTO = Encuesta::getIdSurveyByEstateAndNotResolved($id_usuario);
        return (object) [
            'id_encuesta' => $encuestaDTO->getId_encuesta(),
            'mensaje' => $encuestaDTO->getMensaje()
        ];
    } catch (\Exception $e) {
        throw new Exception($e->getMessage());
    }
}

    public static function getScriptModal()
    {
        try {
            $_SESSION['show_modal'] = false;
            $id_usuario = $_SESSION['id'];
            $encuestaDTO = Encuesta::getIdSurveyByEstateAndNotResolved($id_usuario);
            if (!$encuestaDTO) {
                return '';
            }
            return '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
                            loginModal.show();
                        });
                    </script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getProgress()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveys.php') {
                $html = '';
                $total_encuesta = Encuesta::countSurvey();
                $id_usuario = $_SESSION['id'];
                $encuesta_usuario = Encuesta::countSurveyByUser($id_usuario);
                return ($total_encuesta == 0) ? 0 : ($encuesta_usuario / $total_encuesta) * 100;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getColorByEstate($estado)
    {
        try {
            switch ($estado) {
                case 0: {
                        return 'danger';
                    }
                case 1: {
                        return 'success';
                    }
                case 2: {
                        return 'warning';
                    }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
