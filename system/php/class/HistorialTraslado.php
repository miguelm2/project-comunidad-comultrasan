<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/HistorialTrasladoDTO.php';

class HistorialTraslado extends system
{
    public static function newHistoryTransfer($id_usuario, $id_administrador, $id_comunidad_antigua, $id_comunidad_nueva, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO HistorialTraslado (id_usuario, id_administrador, id_comunidad_antigua, id_comunidad_nueva, fecha_registro) 
                                VALUES (:id_usuario, :id_administrador, :id_comunidad_antigua, :id_comunidad_nueva, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_administrador', $id_administrador);
        $stmt->bindParam(':id_comunidad_antigua', $id_comunidad_antigua);
        $stmt->bindParam(':id_comunidad_nueva', $id_comunidad_nueva);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
}