<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/RecompensaDTO.php';

class Recompensa extends System
{
    public static function newReward($actividad, $puntos, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Recompensa (actividad, puntos, fecha_registro) 
                                VALUES (:actividad, :puntos, :fecha_registro)");
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setReward($id_recompensa, $actividad, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Recompensa 
                            SET actividad = :actividad, puntos = :puntos
                            WHERE id_recompensa = :id_recompensa");
        $stmt->bindParam(':id_recompensa', $id_recompensa);
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':puntos', $puntos);
        return  $stmt->execute();
    }
    public static function getReward($id_recompensa)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Recompensa WHERE id_recompensa = :id_recompensa");
        $stmt->bindParam(':id_recompensa', $id_recompensa);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'RecompensaDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listReward()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Recompensa");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'RecompensaDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteReward($id_recompensa)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Recompensa WHERE id_recompensa = :id_recompensa");
        $stmt->bindParam(':id_recompensa', $id_recompensa);
        return  $stmt->execute();
    }
}
