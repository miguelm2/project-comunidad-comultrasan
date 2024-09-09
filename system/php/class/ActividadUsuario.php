<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ActividadUsuarioDTO.php';

class ActividadUsuario extends System
{
    public static function newActivityUser($id_usuario, $id_actividad, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ActividadUsuario (id_usuario, id_actividad, fecha_registro) 
                                VALUES (:id_usuario, :id_actividad, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_actividad', $id_actividad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getActivityUser($id_actividad_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario WHERE id_actividad_usuario = :id_actividad_usuario");
        $stmt->bindParam(':id_actividad_usuario', $id_actividad_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listActivityUser()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function listActivityUserByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario WHERE id_usuario  = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteActivityUser($id_actividad_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ActividadUsuario WHERE id_actividad_usuario = :id_actividad_usuario");
        $stmt->bindParam(':id_actividad_usuario', $id_actividad_usuario);
        return  $stmt->execute();
    }
}
