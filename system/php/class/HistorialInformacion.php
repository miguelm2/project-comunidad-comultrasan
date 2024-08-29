<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/HistorialInformacionDTO.php';

class HistorialInformacion extends system
{
    public static function newHistoryInformation($id_usuario, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO HistorialInformacion (id_usuario, fecha_registro) 
                                VALUES (:id_usuario, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getHistoryInformationByUser( $id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM HistorialInformacion WHERE  id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'HistorialInformacionDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
}
