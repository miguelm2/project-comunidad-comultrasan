<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/RespuestaPregunta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/PreguntaEncuesta.php';

class ServiceAnswerQuestion extends System
{
    public static function newAnswerQuestion($id_encuesta, $id_pregunta, $respuesta, $veracidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'surveyQuestion.php') {
                $id_encuesta    = parent::limpiarString($id_encuesta);
                $id_pregunta    = parent::limpiarString($id_pregunta);
                $respuesta      = parent::limpiarString($respuesta);
                $veracidad      = parent::limpiarString($veracidad);
                $fecha_registro = date('Y-m-d H:i:s');

                $validateCorrect = RespuestaPregunta::validateOnlyAnswerCorrect($id_pregunta);
                if (!$validateCorrect || $veracidad == 0) {
                    $result = RespuestaPregunta::newAnswerQuestion($id_encuesta, $id_pregunta, $respuesta,  $veracidad, $fecha_registro);

                    if ($result) {
                        return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                    }
                } else {
                    return Elements::crearMensajeAlerta(Constants::$ANSWER_REPEAT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setAnswerQuestion($id_respuesta, $respuesta, $veracidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'answerQuestion.php') {
                $id_respuesta  = parent::limpiarString($id_respuesta);
                $respuesta     = parent::limpiarString($respuesta);
                $veracidad     = parent::limpiarString($veracidad);

                $result = RespuestaPregunta::setAnswerQuestion($id_respuesta, $respuesta, $veracidad);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getAnswerQuestion($id_respuesta)
    {
        try {
            $id_respuesta = parent::limpiarString($id_respuesta);
            $RespuestaPreguntaDTO = RespuestaPregunta::getAnswerQuestion($id_respuesta);
            return $RespuestaPreguntaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteAnswerQuestion($id_respuesta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'answerQuestion.php') {
                $id_respuesta = parent::limpiarString($id_respuesta);
                $respuestaDTO = RespuestaPregunta::getAnswerQuestion($id_respuesta);
                $result = RespuestaPregunta::deleteAnswerQuestion($id_respuesta);
                if ($result) {
                    $_SESSION['alert'] = 1;
                    header('Location:surveyQuestion?surveyQuestion=' . $respuestaDTO->getPreguntaDTO()->getId_pregunta() . '&survey=' . $respuestaDTO->getId_respuesta() . '&delete');
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableAnswerQuestion($id_pregunta)
    {
        try {
            $tableHtml = '';
            $id_pregunta = parent::limpiarString($id_pregunta);
            $modelResponse = RespuestaPregunta::listAnswerQuestionByQuestion($id_pregunta);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getid_respuesta() . '</td>';
                    $tableHtml .= '<td class="text-wrap">' . $valor->getRespuesta() . '</td>';
                    $tableHtml .= '<td>' . $valor->getVeracidad()[1] . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVer("answerQuestion", $valor->getid_respuesta()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="4">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardsQuetionAndAnwer($id_encuesta)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'startSurvey.php') {
                $id_encuesta = parent::limpiarString($id_encuesta);
                $preguntaDTO = PreguntaEncuesta::listSurveyQuestionBySurveyByEstate($id_encuesta);
                $cardHtml = '';
                $con = 0;
                foreach ($preguntaDTO as $value) {
                    $html = '';
                    $respuestaDTO = RespuestaPregunta::listAnswerQuestionByQuestion($value->getId_pregunta());
                    foreach ($respuestaDTO as $valor) {
                        $html .= '<div class="form-check row">
                                <input type="radio" name="' . $value->getId_pregunta() . '" value="' . $valor->getId_respuesta() . '" class="form-check-input col-1">
                                <label for="' . $value->getId_pregunta() . '" class="form-check-label col-11" style="color:black; font-size:16px;">' . $valor->getRespuesta() . '</label>
                            </div>';
                    }
                    $con++;
                    $cardHtml .= Elements::getCardQuestion($con, $value->getPregunta(), $html);
                }
                return $cardHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
