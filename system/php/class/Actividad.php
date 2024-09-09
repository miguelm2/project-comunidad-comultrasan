<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ActividadDTO.php';

class Actividad extends System
{
    public static function newActivity($actividad, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Actividad (actividad, fecha_registro) 
                                VALUES (:actividad, :fecha_registro)");
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setActivity($id_actividad, $actividad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Actividad 
                            SET actividad = :actividad
                            WHERE id_actividad = :id_actividad");
        $stmt->bindParam(':id_actividad', $id_actividad);
        $stmt->bindParam(':actividad', $actividad);
        return  $stmt->execute();
    }
    public static function getActivity($id_actividad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Actividad WHERE id_actividad = :id_actividad");
        $stmt->bindParam(':id_actividad', $id_actividad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listActivity()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Actividad");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteActivity($id_actividad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Actividad WHERE id_actividad = :id_actividad");
        $stmt->bindParam(':id_actividad', $id_actividad);
        return  $stmt->execute();
    }
}
