<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/UsuarioComunidadDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';

class UsuarioComunidad extends system
{
    public static function newUserCommunity($id_usuario, $id_comunidad, $estado, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO UsuarioComunidad (id_usuario, id_comunidad, estado, fecha_registro) 
                                VALUES (:id_usuario, :id_comunidad, :estado, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getUserCommunityByCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * 
                                FROM UsuarioComunidad 
                                WHERE id_comunidad = :id_comunidad
                                AND estado = 2");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $modalResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach ($modalResponse as $response) {
            $UsuarioComunidadDTO = new UsuarioComunidadDTO();

            $UsuarioComunidadDTO->setId_usuario_comunidad($response['id_usuario_comunidad']);
            $UsuarioComunidadDTO->setUsuarioDTO(Usuario::getUserById($response['id_usuario']));
            $UsuarioComunidadDTO->setComunidadDTO(Comunidad::getCommunity($response['id_comunidad']));
            $UsuarioComunidadDTO->setFecha_registro($response['fecha_registro']);

            $list[$con] = $UsuarioComunidadDTO;
            $con++;
        }
        return $list;
    }
    public static function getUserCommunityByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * 
                                FROM UsuarioComunidad 
                                WHERE id_usuario = :id_usuario
                                AND estado = 2");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $UsuarioComunidadDTO = new UsuarioComunidadDTO();

            $UsuarioComunidadDTO->setId_usuario_comunidad($response['id_usuario_comunidad']);
            $UsuarioComunidadDTO->setUsuarioDTO(Usuario::getUserById($response['id_usuario']));
            $UsuarioComunidadDTO->setComunidadDTO(Comunidad::getCommunity($response['id_comunidad']));
            $UsuarioComunidadDTO->setFecha_registro($response['fecha_registro']);
            return $UsuarioComunidadDTO;
        }
        return null;
    }
    public static function deleteUserCommunity($id_usuario_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM UsuarioComunidad 
                                WHERE id_usuario_comunidad = :id_usuario_comunidad");
        $stmt->bindParam(':id_usuario_comunidad', $id_usuario_comunidad);
        return  $stmt->execute();
    }
    public static function deleteUserCommunityByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM UsuarioComunidad WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }
    public static function setEstateUserCommunity($id_usuario_comunidad, $estado)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE UsuarioComunidad 
                                SET estado = :estado
                                WHERE id_usuario_comunidad = :id_usuario_comunidad");
        $stmt->bindParam(':id_usuario_comunidad', $id_usuario_comunidad);
        $stmt->bindParam(':estado', $estado);
        return  $stmt->execute();
    }
    public static function getUserCommunity($id_usuario_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * 
                                FROM UsuarioComunidad 
                                WHERE id_usuario_comunidad = :id_usuario_comunidad");
        $stmt->bindParam(':id_usuario_comunidad', $id_usuario_comunidad);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $UsuarioComunidadDTO = new UsuarioComunidadDTO();

            $UsuarioComunidadDTO->setId_usuario_comunidad($response['id_usuario_comunidad']);
            $UsuarioComunidadDTO->setUsuarioDTO(Usuario::getUserById($response['id_usuario']));
            $UsuarioComunidadDTO->setComunidadDTO(Comunidad::getCommunity($response['id_comunidad']));
            $UsuarioComunidadDTO->setFecha_registro($response['fecha_registro']);
            return $UsuarioComunidadDTO;
        }
        return null;
    }
}
