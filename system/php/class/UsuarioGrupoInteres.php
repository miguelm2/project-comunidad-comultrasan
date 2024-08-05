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
    public static function getUserGroupInterest($id_usuario_grupo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM UsuarioGrupoInteres WHERE id_usuario_grupo = :id_usuario_grupo");
        $stmt->bindParam(':id_usuario_grupo', $id_usuario_grupo);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $usuarioGrupoInteresDTO = new UsuarioGrupoInteresDTO();

            $usuarioGrupoInteresDTO->setId_usuario_grupo($response['id_usuario_grupo']);
            $usuarioGrupoInteresDTO->setUsuarioDTO(Usuario::getUserById('id_usuario'));
            $usuarioGrupoInteresDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($response['id_grupo']));
            $usuarioGrupoInteresDTO->setFecha_registro($response['fecha_registro']);

            return $usuarioGrupoInteresDTO;
        }
        return null;
    }
    public static function deleteUserGroupInterest($id_usuario_grupo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM UsuarioGrupoInteres WHERE id_usuario_grupo = :id_usuario_grupo");
        $stmt->bindParam(':id_usuario_grupo', $id_usuario_grupo);
        return  $stmt->execute();
    }
}
