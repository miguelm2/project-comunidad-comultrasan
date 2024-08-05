<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Encuesta.php';

class ServiceSurvey extends System
{
    public static function newSurvey($nombre, $descripcion, $puntos)
    {
        try {
            $nombre         = parent::limpiarString($nombre);
            $descripcion    = parent::limpiarString($descripcion);
            $estado         = parent::limpiarString(1);
            $puntos         = parent::limpiarString($puntos);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = Encuesta::newSurvey($nombre, $descripcion, $estado,  $puntos, $fecha_registro);

            if ($result) {
                $encuestaDTO = Encuesta::getLastSurvey();
                header('Location:survey?survey=' . $encuestaDTO->getId_encuesta() . '&new');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurvey($id_encuesta, $descripcion, $nombre, $estado, $puntos)
    {
        try {
            $id_encuesta  = parent::limpiarString($id_encuesta);
            $estado       = parent::limpiarString($estado);

            $result = Encuesta::setSurvey($id_encuesta, $descripcion, $nombre, $estado, $puntos);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
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
            $id_encuesta = parent::limpiarString($id_encuesta);
            $result = Encuesta::deleteSurvey($id_encuesta);
            if ($result) {
                $_SESSION['alert'] = 1;
                header('Location:surveys?delete');
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurvey()
    {
        try {
            $tableHtml = '';
            $modelResponse = Encuesta::listSurvey();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_encuesta() . '</td>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVer("survey", $valor->getId_encuesta()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurveyUser()
    {
        try {
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
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getProgress()
    {
        try {
            $html = '';
            $total_encuesta = Encuesta::countSurvey();
            $id_usuario = $_SESSION['id'];
            $encuesta_usuario = Encuesta::countSurveyByUser($id_usuario);
            return ($total_encuesta == 0) ? 0 : ($encuesta_usuario / $total_encuesta) * 100;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
