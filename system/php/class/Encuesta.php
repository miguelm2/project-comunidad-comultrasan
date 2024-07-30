<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/EncuestaDTO.php';

class Encuesta extends System
{
    public static function newSurvey($nombre, $descripcion, $estado, $puntos, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Encuesta (nombre, descripcion,estado, puntos, fecha_registro) 
                                VALUES (:nombre, :descripcion, :estado, :puntos, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setSurvey($id_encuesta, $descripcion, $nombre, $estado, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Encuesta 
                            SET nombre = :nombre, descripcion =:descripcion, estado = :estado, puntos = :puntos
                            WHERE id_encuesta = :id_encuesta");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':puntos', $puntos);
        return  $stmt->execute();
    }
    public static function getSurvey($id_encuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Encuesta WHERE id_encuesta = :id_encuesta");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EncuestaDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
    public static function listSurvey()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Encuesta");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EncuestaDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteSurvey($id_encuesta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Encuesta WHERE id_encuesta = :id_encuesta");
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        return  $stmt->execute();
    }
    public static function getLastSurvey()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Encuesta ORDER BY id_encuesta DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EncuestaDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
}
