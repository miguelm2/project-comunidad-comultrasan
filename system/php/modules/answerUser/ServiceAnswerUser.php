<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/RespuestaUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServiceAnswerUser extends System
{
    public static function newAnswerUser($id_encuesta, $id_pregunta, $id_respuesta)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $id_pregunta = parent::limpiarString($id_pregunta);
            $id_respuesta = parent::limpiarString($id_respuesta);
            $id_usuario = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');

            $result = RespuestaUsuario::newAnswerUser($id_usuario, $id_encuesta, $id_pregunta, $id_respuesta, $fecha_registro);
            if ($result) {
                $encuestaDTO = Encuesta::getSurvey($id_encuesta);
                return Elements::crearMensajeAlerta2($encuestaDTO->getPuntos());
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
