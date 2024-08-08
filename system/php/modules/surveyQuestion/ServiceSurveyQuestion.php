<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/PreguntaEncuesta.php';

class ServiceSurveyQuestion extends System
{
    public static function newSurveyQuestion($id_encuesta, $pregunta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'survey.php') {
                $id_encuesta    = parent::limpiarString($id_encuesta);
                $pregunta       = parent::limpiarString($pregunta);
                $estado         = parent::limpiarString(1);
                $fecha_registro = date('Y-m-d H:i:s');

                $result = PreguntaEncuesta::newSurveyQuestion($id_encuesta, $pregunta, $estado,  $fecha_registro);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurveyQuestion($id_pregunta, $pregunta, $estado)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveyQuestion.php') {
                $id_pregunta  = parent::limpiarString($id_pregunta);
                $pregunta     = parent::limpiarString($pregunta);
                $estado       = parent::limpiarString($estado);

                $result = PreguntaEncuesta::setSurveyQuestion($id_pregunta, $pregunta, $estado);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurveyQuestion($id_pregunta)
    {
        try {
            $id_pregunta = parent::limpiarString($id_pregunta);
            $preguntaEncuestaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
            return $preguntaEncuestaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteSurveyQuestion($id_pregunta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'TypeComunity.php') {
                $id_pregunta = parent::limpiarString($id_pregunta);
                $preguntaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
                $result = PreguntaEncuesta::deleteSurveyQuestion($id_pregunta);
                if ($result) {
                    $_SESSION['alert'] = 1;
                    header('Location:survey?survey=' . $preguntaDTO->getEncuestaDTO()->getId_encuesta() . '&delete');
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurveyQuestion($id_encuesta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_encuesta = parent::limpiarString($id_encuesta);
                $tableHtml = '';
                $modelResponse = PreguntaEncuesta::listSurveyQuestionBySurvey($id_encuesta);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_pregunta() . '</td>';
                        $tableHtml .= '<td class="text-wrap">' . $valor->getPregunta() . '</td>';
                        $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                        $tableHtml .= '<td align="center">' . Elements::crearBotonVerTwoLink("surveyQuestion", $valor->getId_pregunta(), "survey", $valor->getEncuestaDTO()->getId_encuesta()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="4">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurveyQuestionBySurvey($id_encuesta)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $preguntaEncuestaDTO = PreguntaEncuesta::listSurveyQuestionBySurvey($id_encuesta);
            return $preguntaEncuestaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
