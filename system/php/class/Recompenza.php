<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/RecompenzaDTO.php';

class Recompenza extends System
{
    public static function newReward($actividad, $costo, $puntos, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Recompenza (actividad, costo, puntos, fecha_registro) 
                                VALUES (:actividad, :costo, :puntos, :fecha_registro)");
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setReward($id_recompenza, $actividad, $costo, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Recompenza 
                            SET actividad = :actividad, costo = :costo, puntos = :puntos
                            WHERE id_recompenza = :id_recompenza");
        $stmt->bindParam(':id_recompenza', $id_recompenza);
        $stmt->bindParam(':actividad', $actividad);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':puntos', $puntos);
        return  $stmt->execute();
    }
    public static function getReward($id_recompenza){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Recompenza WHERE id_recompenza = :id_recompenza");
        $stmt->bindParam(':id_recompenza', $id_recompenza);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'RecompenzaDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listReward()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Recompenza");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'RecompenzaDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteReward($id_recompenza)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Recompenza WHERE id_recompenza = :id_recompenza");
        $stmt->bindParam(':id_recompenza', $id_recompenza);
        return  $stmt->execute();
    }
}
