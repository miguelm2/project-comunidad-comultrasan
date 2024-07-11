<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/PreguntaFrecuenteDTO.php';

class PreguntaFrecuente extends System
{
    public static function newQuestion($pregunta, $respuesta, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO PreguntaFrecuente (pregunta, respuesta, fecha_registro) 
                                VALUES (:pregunta, :respuesta, :fecha_registro)");
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':respuesta', $respuesta);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setQuestion($id_pregunta, $pregunta, $respuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE PreguntaFrecuente 
                            SET pregunta = :pregunta, respuesta = :respuesta
                            WHERE id_pregunta = :id_pregunta_respuesta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':respuesta', $respuesta);
        return  $stmt->execute();
    }
    public static function getQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaFrecuente WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'PreguntaFrecuenteDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
    public static function listQuestion()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM PreguntaFrecuente");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'PreguntaFrecuenteDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteQuestion($id_pregunta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM PreguntaFrecuente WHERE id_pregunta = :id_pregunta");
        $stmt->bindParam(':id_pregunta', $id_pregunta);
        return  $stmt->execute();
    }
}
