<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/RespuestaUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServiceAnswerUser extends System
{
    public static function newAnswerUser($id_encuesta,  $listRespuestas, $listRespuestasAbiertas,)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $id_usuario = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');

            if (count($listRespuestas) > 0) {
                foreach ($listRespuestas as $value) {
                    $listTotal = explode("-", $value);
                    $responseMultiple = RespuestaUsuario::newAnswerUser($id_usuario, $id_encuesta, $listTotal[0], $listTotal[1],  $fecha_registro);
                }
            }

            if (count($listRespuestasAbiertas) > 0) {
                for ($i = 0; $i < count($listRespuestasAbiertas); $i++) {
                    $id_pregunta = $listRespuestasAbiertas[$i];
                    $i++;
                    $respuesta = $listRespuestasAbiertas[$i];
                    $responseAbierta = RespuestaUsuario::newAnswerOpenUser($id_usuario, $id_encuesta, $id_pregunta, $respuesta, $fecha_registro);
                }
            }

            if ($responseMultiple || $responseAbierta) {
                $encuestaDTO = Encuesta::getSurvey($id_encuesta);
                header('Location:surveys?win=' . $encuestaDTO->getPuntos());
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
