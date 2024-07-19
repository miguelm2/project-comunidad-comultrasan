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

            $encuestaDTO = Encuesta::getLastSurvey();

            if ($result) {
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
            $descripcion  = parent::limpiarString($descripcion);
            $nombre       = parent::limpiarString($nombre);
            $estado       = parent::limpiarString($estado);
            $puntos       = parent::limpiarString($puntos);

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
    public static function deleteSurvey($id_)
    {
        try {
            $id_ = parent::limpiarString($id_);
            $result = Encuesta::deleteSurvey($id_);
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
}
