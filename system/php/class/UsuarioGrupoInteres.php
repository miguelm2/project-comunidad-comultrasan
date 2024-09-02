<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/UsuarioGrupoInteresDTO.php';

class UsuarioGrupoInteres extends system
{
    public static function newUserGroupInterest($id_usuario, $id_grupo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO UsuarioGrupoInteres (id_usuario, id_grupo, fecha_registro) 
                                VALUES (:id_usuario, :id_grupo, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_grupo', $id_grupo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function deleteUserGroupInterest($id_usuario_grupo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM UsuarioGrupoInteres WHERE id_usuario_grupo = :id_usuario_grupo");
        $stmt->bindParam(':id_usuario_grupo', $id_usuario_grupo);
        return  $stmt->execute();
    }
}