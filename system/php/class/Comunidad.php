<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ComunidadDTO.php';

class Comunidad extends System
{
    public static function newCommunity($id_usuario, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Comunidad (id_usuario, fecha_registro) 
                                VALUES (:id_usuario,  :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setId_comunidad($result['id_comunidad']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setFecha_registro($result['fecha_registro']);

            return $comunidadDTO;
        }
        return null;
    }
    public static function listCommunity()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setid_comunidad($result['id_comunidad']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $comunidadDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function getCommunityByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setId_comunidad($result['id_comunidad']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setFecha_registro($result['fecha_registro']);

            return $comunidadDTO;
        }
        return null;
    }
    public static function deleteCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Comunidad WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        return  $stmt->execute();
    }
}
