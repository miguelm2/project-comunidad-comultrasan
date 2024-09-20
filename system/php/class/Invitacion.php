<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/InvitacionDTO.php';

class Invitacion extends system
{
    public static function newInvitation($id_usuario, $nombre, $correo, $celular, $cedula, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Invitacion (id_usuario, nombre, correo, celular, cedula, fecha_registro) 
                                VALUES (:id_usuario, :nombre, :correo, :celular, :cedula, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getInvitationByCedula($cedula)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Invitacion WHERE cedula = :cedula");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();
        return $stmt->fetch();
    }
}
