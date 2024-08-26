<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/RespuestaUsuarioDTO.php';

class RespuestaUsuario extends System
{
    public static function newAnswerUser($id_usuario, $id_encuesta, $id_pregunta, $id_respuesta, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO RespuestaUsuario (id_usuario, id_encuesta, id_pregunta, id_respuesta, fecha_registro) 
                                VALUES (:id_usuario, :id_encuesta, :id_pregunta, :id_respuesta, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->bindParam(':id_respuesta', $id_respuesta);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function newAnswerOpenUser($id_usuario, $id_encuesta, $id_pregunta, $respuesta_abierta, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO RespuestaUsuario (id_usuario, id_encuesta, id_pregunta, respuesta_abierta, fecha_registro) 
                                VALUES (:id_usuario, :id_encuesta, :id_pregunta, :respuesta_abierta, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->bindParam(':respuesta_abierta', $respuesta_abierta);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getAnswerUser($id_respuesta_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaUsuario WHERE id_respuesta_usuario = :id_respuesta_usuario");
        $stmt->bindParam(':id_respuesta_usuario', $id_respuesta_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $respuestaUsuarioDTO = new RespuestaUsuarioDTO();

            $respuestaUsuarioDTO->setId_respuesta_usuario($result['id_respuesta']);
            $respuestaUsuarioDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $respuestaUsuarioDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $respuestaUsuarioDTO->setPreguntaDTO(PreguntaEncuesta::getSurveyQuestion($result['id_pregunta']));
            $respuestaUsuarioDTO->setRespuestaDTO(RespuestaPregunta::getAnswerQuestion($result['respuesta']));
            $respuestaUsuarioDTO->setFecha_registro($result['fecha_registro']);

            return $respuestaUsuarioDTO;
        }
        return null;
    }
    public static function listAnswerUserByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaUsuario WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $respuestaUsuarioDTO = new RespuestaUsuarioDTO();

            $respuestaUsuarioDTO->setId_respuesta_usuario($result['id_respuesta']);
            $respuestaUsuarioDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $respuestaUsuarioDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $respuestaUsuarioDTO->setPreguntaDTO(PreguntaEncuesta::getSurveyQuestion($result['id_pregunta']));
            $respuestaUsuarioDTO->setRespuestaDTO(RespuestaPregunta::getAnswerQuestion($result['respuesta']));
            $respuestaUsuarioDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $respuestaUsuarioDTO;
            $con++;
        }
        return $list;
    }
    public static function listAnswerUserByQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaPregunta WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $respuestaUsuarioDTO = new RespuestaUsuarioDTO();

            $respuestaUsuarioDTO->setId_respuesta_usuario($result['id_respuesta']);
            $respuestaUsuarioDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $respuestaUsuarioDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $respuestaUsuarioDTO->setPreguntaDTO(PreguntaEncuesta::getSurveyQuestion($result['id_pregunta']));
            $respuestaUsuarioDTO->setRespuestaDTO(RespuestaPregunta::getAnswerQuestion($result['respuesta']));
            $respuestaUsuarioDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $respuestaUsuarioDTO;
            $con++;
        }
        return $list;
    }
}
