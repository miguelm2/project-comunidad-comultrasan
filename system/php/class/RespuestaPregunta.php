<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/RespuestaPreguntaDTO.php';

class RespuestaPregunta extends System
{
    public static function newAnswerQuestion($id_encuesta, $id_pregunta, $respuesta, $veracidad, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO RespuestaPregunta (id_encuesta, id_pregunta, respuesta, veracidad, fecha_registro) 
                                VALUES (:id_encuesta, :id_pregunta, :respuesta, :veracidad :fecha_registro)");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->bindParam(':respuesta', $respuesta);
        $stmt->bindParam(':veracidad', $veracidad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setAnswerQuestion($id_respuesta, $respuesta, $veracidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE RespuestaPregunta 
                            SET respuesta = :respuesta, veracidad = :veracidad
                            WHERE id_respuesta = :id_respuesta");
        $stmt->bindParam(':id_respuesta', $id_respuesta);
        $stmt->bindParam(':respuesta', $respuesta);
        $stmt->bindParam(':veracidad', $veracidad);
        return  $stmt->execute();
    }
    public static function getAnswerQuestion($id_respuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaPregunta WHERE id_respuesta = :id_respuesta");
        $stmt->bindParam(':id_respuesta', $id_respuesta);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $RespuestaPreguntaDTO = new RespuestaPreguntaDTO();

            $RespuestaPreguntaDTO->setId_respuesta($result['id_respuesta']);
            $RespuestaPreguntaDTO->setEncuestaDTO($result['id_encuesta']);
            $RespuestaPreguntaDTO->setPreguntaDTO($result['id_pregunta']);
            $RespuestaPreguntaDTO->setRespuesta($result['respuesta']);
            $RespuestaPreguntaDTO->setVeracidad($result['veracidad']);
            $RespuestaPreguntaDTO->setFecha_registro($result['fecha_registro']);

            return $RespuestaPreguntaDTO;
        }
        return null;
    }
    public static function listAnswerQuestion()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaPregunta");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $RespuestaPreguntaDTO = new RespuestaPreguntaDTO();

            $RespuestaPreguntaDTO->setid_respuesta($result['id_respuesta']);
            $RespuestaPreguntaDTO->setEncuestaDTO($result['id_encuesta']);
            $RespuestaPreguntaDTO->setPreguntaDTO($result['id_pregunta']);
            $RespuestaPreguntaDTO->setRespuesta($result['respuesta']);
            $RespuestaPreguntaDTO->setVeracidad($result['veracidad']);
            $RespuestaPreguntaDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $RespuestaPreguntaDTO;
            $con++;
        }
        return $list;
    }
    public static function listAnswerQuestionByQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM RespuestaPregunta WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $RespuestaPreguntaDTO = new RespuestaPreguntaDTO();

            $RespuestaPreguntaDTO->setid_respuesta($result['id_respuesta']);
            $RespuestaPreguntaDTO->setEncuestaDTO($result['id_encuesta']);
            $RespuestaPreguntaDTO->setPreguntaDTO($result['id_pregunta']);
            $RespuestaPreguntaDTO->setRespuesta($result['respuesta']);
            $RespuestaPreguntaDTO->setVeracidad($result['veracidad']);
            $RespuestaPreguntaDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $RespuestaPreguntaDTO;
            $con++;
        }
        return $list;
    }
    public static function deleteAnswerQuestion($id_respuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM RespuestaPregunta WHERE id_respuesta = :id_respuesta");
        $stmt->bindParam(':id_respuesta', $id_respuesta);
        return  $stmt->execute();
    }
}
