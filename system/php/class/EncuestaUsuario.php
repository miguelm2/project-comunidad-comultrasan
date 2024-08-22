<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/EncuestaUsuarioDTO.php';

class EncuestaUsuario extends system
{
    public static function newSurveyUser($id_usuario, $id_encuesta, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO EncuestaUsuario (id_usuario, id_encuesta, fecha_registro) 
                                VALUES (:id_usuario, :id_encuesta, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_encuesta', $id_encuesta);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function listSurveyUserByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM EncuestaUsuario WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EncuestaUsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
}