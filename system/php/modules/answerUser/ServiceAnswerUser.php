<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/RespuestaUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/surveyQuestion/ServiceSurveyQuestion.php';

class ServiceAnswerUser extends System
{
    public static function newAnswerUser($id_encuesta,  $listRespuestas, $listRespuestasAbiertas,)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $id_usuario = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');
            $respuestas = '';
            // Asegurarse de que las variables sean arrays
            if (!is_array($listRespuestas)) {
                $listRespuestas = [];
            }
            if (!is_array($listRespuestasAbiertas)) {
                $listRespuestasAbiertas = [];
            }



            if (count($listRespuestas) > 0) {
                foreach ($listRespuestas as $value) {
                    $listTotal = explode("-", $value);
                    $valide = RespuestaPregunta::valideAnswerQuestionByQuestion($listTotal[0]);
                    $respuestaDTO = RespuestaPregunta::getAnswerQuestion($listTotal[1]);
                    $respuestas .= '<li>
                                    <strong>Pregunta:</strong> ' . $respuestaDTO->getPreguntaDTO()->getPregunta() . '; <strong>Repuesta:</strong> ' . $respuestaDTO->getRespuesta() . '
                                </li>';
                    if ($valide) {
                        $responseMultiple = RespuestaUsuario::newAnswerUser($id_usuario, $id_encuesta, $listTotal[0], $listTotal[1],  $fecha_registro);
                        continue;
                    }
                    $valide_answer = RespuestaPregunta::valideAnswerQuestionByQuestionAndAnswer($listTotal[0], $listTotal[1]);
                    if ($valide_answer == false) {
                        RespuestaUsuario::deleteAnswerUserByUserBySurvey($id_usuario, $id_encuesta);
                        return Elements::crearMensajeAlerta("Algunas respuestas no son correctas. Por favor, revisa y vuelve a intentar la encuesta.", "warning");
                    }
                    $responseMultiple = RespuestaUsuario::newAnswerUser($id_usuario, $id_encuesta, $listTotal[0], $listTotal[1],  $fecha_registro);
                }
            }

            if (count($listRespuestasAbiertas) > 0) {
                for ($i = 0; $i < count($listRespuestasAbiertas); $i++) {
                    $id_pregunta = $listRespuestasAbiertas[$i];
                    $i++;
                    $respuesta = $listRespuestasAbiertas[$i];
                    $preguntaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
                    $respuestas .= '<li>
                                    <strong>Pregunta:</strong> ' . $preguntaDTO->getPregunta() . '; <strong>Repuesta:</strong> ' . $respuesta . '
                                </li>';
                    $responseAbierta = RespuestaUsuario::newAnswerOpenUser($id_usuario, $id_encuesta, $id_pregunta, $respuesta, $fecha_registro);
                }
            }

            if ($responseMultiple || $responseAbierta) {
                $total_encuesta = Encuesta::countSurvey();
                $id_usuario = $_SESSION['id'];
                $encuesta_usuario = Encuesta::countSurveyByUser($id_usuario);
                $valor = ($total_encuesta == 0) ? 0 : ($encuesta_usuario / $total_encuesta) * 100;
                if ($valor == 100) {
                    ActividadUsuario::newActivityUser($_SESSION['id'], 4, $fecha_registro);
                    Punto::newPoint(5, $_SESSION['id'], 1, 'Completo todas las encuestas', $fecha_registro);
                }

                if ($id_encuesta == 5) {
                    ActividadUsuario::newActivityUser($_SESSION['id'], 3, $fecha_registro);
                }

                $encuestaDTO = Encuesta::getSurvey($id_encuesta);
                $listAdministradores = Administrador::listAllAdministrador();
                foreach ($listAdministradores as $admin) {
                    self::sendAnswerUserByMail($_SESSION['nombre'], $admin->getNombre(), $respuestas, $encuestaDTO->getNombre(), $admin->getCorreo());
                }
                ServicePoint::newPoint($encuestaDTO->getPuntos(), $_SESSION['id'], 1, "Resolvió la encuesta: " . $encuestaDTO->getNombre());
                header('Location:surveys?win=' . $encuestaDTO->getPuntos());
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function sendAnswerUserByMail($usuario, $administrador, $respuestas, $encuesta, $correo)
    {
        $asunto = 'Respuestas del Usuario ' . $usuario . ' Recibidas';
        $mensaje = 'Estimado/a ' . $administrador . ',<br>
                Este correo ha sido generado automáticamente para informarle que el usuario ' . $usuario . ' ha completado el formulario. <br>
                A continuación, se incluyen las respuestas proporcionadas de la encuesta <strong>' . $encuesta . '</strong>:<br>
                ' . $respuestas . '<br>
                Este mensaje es solo informativo. No se requiere ninguna acción adicional.<br><br>
                Atentamente,<br>
                Comunidad Financiera Comultrasan';
        Mail::sendEmail($asunto, $mensaje, $correo);
    }
}
