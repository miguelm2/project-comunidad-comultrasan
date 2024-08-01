<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/PreguntaEncuestaDTO.php';

class PreguntaEncuesta extends System
{
    public static function newSurveyQuestion($id_encuesta, $pregunta, $estado,  $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO PreguntaEncuesta (id_encuesta, pregunta, estado, fecha_registro) 
                                VALUES (:id_encuesta, :pregunta, :estado, :fecha_registro)");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setSurveyQuestion($id_pregunta, $pregunta, $estado)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE PreguntaEncuesta 
                            SET pregunta = :pregunta, estado = :estado
                            WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':estado', $estado);
        return  $stmt->execute();
    }
    public static function getSurveyQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaEncuesta WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $preguntaEncuestaDTO = new PreguntaEncuestaDTO();

            $preguntaEncuestaDTO->setId_pregunta($result['id_pregunta']);
            $preguntaEncuestaDTO->setEncuestaDTO($result['id_encuesta']);
            $preguntaEncuestaDTO->setPregunta($result['pregunta']);
            $preguntaEncuestaDTO->setEstado($result['estado']);
            $preguntaEncuestaDTO->setFecha_registro($result['fecha_registro']);

            return $preguntaEncuestaDTO;
        }
        return null;
    }
    public static function listSurveyQuestion()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaEncuesta");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $preguntaEncuestaDTO = new PreguntaEncuestaDTO();

            $preguntaEncuestaDTO->setId_pregunta($result['id_pregunta']);
            $preguntaEncuestaDTO->setEncuestaDTO($result['id_encuesta']);
            $preguntaEncuestaDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $preguntaEncuestaDTO->setPregunta($result['pregunta']);
            $preguntaEncuestaDTO->setEstado($result['estado']);
            $preguntaEncuestaDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $preguntaEncuestaDTO;
            $con++;
        }
        return $list;
    }
    public static function listSurveyQuestionBySurvey($id_encuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaEncuesta WHERE id_encuesta = :id_encuesta");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $preguntaEncuestaDTO = new PreguntaEncuestaDTO();

            $preguntaEncuestaDTO->setId_pregunta($result['id_pregunta']);
            $preguntaEncuestaDTO->setEncuestaDTO($result['id_encuesta']);
            $preguntaEncuestaDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $preguntaEncuestaDTO->setPregunta($result['pregunta']);
            $preguntaEncuestaDTO->setEstado($result['estado']);
            $preguntaEncuestaDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $preguntaEncuestaDTO;
            $con++;
        }
        return $list;
    }
    public static function deleteSurveyQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM PreguntaEncuesta WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        return  $stmt->execute();
    }
    public static function listSurveyQuestionBySurveyByEstate($id_encuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaEncuesta WHERE id_encuesta = :id_encuesta AND estado = 1");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $preguntaEncuestaDTO = new PreguntaEncuestaDTO();

            $preguntaEncuestaDTO->setId_pregunta($result['id_pregunta']);
            $preguntaEncuestaDTO->setEncuestaDTO($result['id_encuesta']);
            $preguntaEncuestaDTO->setEncuestaDTO(Encuesta::getSurvey($result['id_encuesta']));
            $preguntaEncuestaDTO->setPregunta($result['pregunta']);
            $preguntaEncuestaDTO->setEstado($result['estado']);
            $preguntaEncuestaDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $preguntaEncuestaDTO;
            $con++;
        }
        return $list;
    }
}
