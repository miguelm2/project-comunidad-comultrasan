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
                    $style = self::getColorByEstate($valor->getVeracidad()[0]);
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td  class="text-center">' . $valor->getid_respuesta() . '</td>';
                    $tableHtml .= '<td class="text-wrap">' . $valor->getRespuesta() . '</td>';
                    $tableHtml .= '<td class="text-center"><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getVeracidad()[1] . '</small></td>';
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
                $contador = $contador_1 = $contador_2 = 0;
                foreach ($preguntaDTO as $value) {
                    $html = '';
                    $respuestaDTO = RespuestaPregunta::listAnswerQuestionByQuestion($value->getId_pregunta());

                    switch ($value->getTipo_pregunta()[0]) {
                        case 1:
                            foreach ($respuestaDTO as $valor) {
                                $html .= '<div class="form-check row">
                                                <input type="radio" name="listRespuestas[' . $contador_1 .  ']" value="' . $value->getId_pregunta() .  '-' . $valor->getId_respuesta() . '" class="form-check-input col-1">
                                                <label for="' . $value->getId_pregunta() . '" class="form-check-label col-11" style="color:black; font-size:16px;">' . $valor->getRespuesta() . '</label>
                                            </div>';
                            }
                            $contador_1++;
                            break;

                        case 2:
                            $html .= '<div class="form-check row">
                                            <input type="hidden" value="' . $value->getId_pregunta() . '" name="listRespuestasAbiertas[' . $contador . ']">';
                            $contador++;
                            $html .= '<textarea type="text" class="form-control border p-1" name="listRespuestasAbiertas[' . $contador . ']" rows="4" required></textarea>
                                        </div>';
                            $contador++;
                            break;

                        case 3:
                            foreach ($respuestaDTO as $res) {
                                $html .= '<div class="form-check row">
                                                <input type="checkbox" name="listRespuestas[' . $contador_2 . ']" value="' . $value->getId_pregunta() .  '-' . $res->getId_respuesta() . '" class="form-check-input col-1">
                                                <label for="' . $value->getId_pregunta() . '" class="form-check-label col-11" style="color:black; font-size:16px;">' . $res->getRespuesta() . '</label>
                                            </div>';
                            }
                            $contador_2++;
                            break;
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
