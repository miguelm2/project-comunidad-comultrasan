<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ReferidoDTO.php';

class Referido extends system
{
    public static function newReferred($nombre_referido, $cedula_referido, $tipo_documento_referido, $departamento, $ciudad, $correo, $celular, $nombre_refiere, $tipo_documento_refiere, $cedula_refiere, $estado, $id_usuario, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Referido (nombre_referido, cedula_referido, tipo_documento_referido, departamento, ciudad, correo, 
                                                    celular, nombre_refiere, tipo_documento_refiere, cedula_refiere, estado, id_usuario, fecha_registro) 
                                VALUES (:nombre_referido, :cedula_referido, :tipo_documento_referido, :departamento, :ciudad, :correo, :celular,
                                        :nombre_refiere, :tipo_documento_refiere, :cedula_refiere, :estado, :id_usuario, :fecha_registro)");
        $stmt->bindParam(':nombre_referido', $nombre_referido);
        $stmt->bindParam(':cedula_referido', $cedula_referido);
        $stmt->bindParam(':tipo_documento_referido', $tipo_documento_referido);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':nombre_refiere', $nombre_refiere);
        $stmt->bindParam(':tipo_documento_refiere', $tipo_documento_refiere);
        $stmt->bindParam(':cedula_refiere', $cedula_refiere);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setReferred($nombre_referido, $cedula_referido, $tipo_documento_referido, $departamento, $ciudad, $correo, $celular, $nombre_refiere, $tipo_documento_refiere, $cedula_refiere, $estado, $id_referido)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Referido 
                                SET nombre_referido = :nombre_referido, cedula_referido = :cedula_referido, 
                                tipo_documento_referido = :tipo_documento_referido, departamento = :departamento, ciudad = :ciudad,
                                correo = :correo, celular = :celular, nombre_refiere = :nombre_refiere, tipo_documento_refiere = :tipo_documento_refiere, 
                                cedula_refiere = :cedula_refiere, estado = :estado
                                WHERE id_referido = :id_referido");
        $stmt->bindParam(':nombre_referido', $nombre_referido);
        $stmt->bindParam(':cedula_referido', $cedula_referido);
        $stmt->bindParam(':tipo_documento_referido', $tipo_documento_referido);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':nombre_refiere', $nombre_refiere);
        $stmt->bindParam(':tipo_documento_refiere', $tipo_documento_refiere);
        $stmt->bindParam(':cedula_refiere', $cedula_refiere);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_referido', $id_referido);
        return  $stmt->execute();
    }
    public static function getReferred($id_referido)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Referido WHERE id_referido = :id_referido");
        $stmt->bindParam(':id_referido', $id_referido);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReferidoDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function getReferredByCedula($cedula)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Referido WHERE cedula = :cedula");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReferidoDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listReferred()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Referido");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReferidoDTO');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function deleteReferred($id_referido)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Referido WHERE id_referido = :id_referido");
        $stmt->bindParam(':id_referido', $id_referido);
        return  $stmt->execute();
    }
}
