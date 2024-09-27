<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/PreguntaEncuesta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';

class ServiceSurveyQuestion extends System
{
    public static function newSurveyQuestion($id_encuesta, $pregunta, $tipo_pregunta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'survey.php') {
                $id_encuesta    = parent::limpiarString($id_encuesta);
                $pregunta       = parent::limpiarString($pregunta);
                $estado         = parent::limpiarString(1);
                $tipo_pregunta  = parent::limpiarString($tipo_pregunta);
                $fecha_registro = date('Y-m-d H:i:s');

                $result = PreguntaEncuesta::newSurveyQuestion($id_encuesta, $pregunta, $estado, $tipo_pregunta, $fecha_registro);

                if ($result) {
                    $preguntaEncuestaDTO = PreguntaEncuesta::getLastSurveyQuestion();
                    $text = "CREATE - PREGUNTA ENCUESTA - " . $preguntaEncuestaDTO->getId_pregunta() . " - " . $preguntaEncuestaDTO->getPregunta() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurveyQuestion($id_pregunta, $pregunta, $estado, $tipo_pregunta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveyQuestion.php') {
                $id_pregunta    = parent::limpiarString($id_pregunta);
                $pregunta       = parent::limpiarString($pregunta);
                $estado         = parent::limpiarString($estado);
                $tipo_pregunta  = parent::limpiarString($tipo_pregunta);

                $result = PreguntaEncuesta::setSurveyQuestion($id_pregunta, $pregunta, $estado, $tipo_pregunta);

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
            $id_pregunta = parent::limpiarString($id_pregunta);
            $preguntaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
            $result = PreguntaEncuesta::deleteSurveyQuestion($id_pregunta);
            if ($result) {
                $text = "DELETE - PREGUNTA ENCUESTA - " . $id_pregunta . " - " . $preguntaDTO->getPregunta() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                Log::setLog($text);
                header('Location:survey?survey=' . $preguntaDTO->getEncuestaDTO()->getId_encuesta() . '&delete');
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurveyQuestion($id_encuesta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php' || basename($_SERVER['PHP_SELF']) == 'survey.php') {
                $id_encuesta = parent::limpiarString($id_encuesta);
                $tableHtml = '';
                $modelResponse = PreguntaEncuesta::listSurveyQuestionBySurvey($id_encuesta);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td class="text-center">' . $valor->getId_pregunta() . '</td>';
                        $tableHtml .= '<td class="text-wrap">' . $valor->getPregunta() . '</td>';
                        $tableHtml .= '<td class="text-center"><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
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
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
