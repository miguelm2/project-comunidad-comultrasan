<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/PuntoDTO.php';

class Punto extends System
{
    public static function newPoint($puntos, $id_usuario, $id_administrador, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Punto (puntos, id_usuario, id_administrador, fecha_registro) 
                                VALUES (:puntos, :id_usuario, :id_administrador, :fecha_registro)");
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_administrador', $id_administrador);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setPoint($id_punto, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Punto 
                            SET puntos = :puntos
                            WHERE id_punto = :id_punto");
        $stmt->bindParam(':id_punto', $id_punto);
        $stmt->bindParam(':puntos', $puntos);
        return  $stmt->execute();
    }
    public static function getPoint($id_punto){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Punto WHERE id_punto = :id_punto");
        $stmt->bindParam(':id_punto', $id_punto);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result){
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setFecha_registro($result['fecha_registro']);

            return $puntoDTO;
        }
        return null;
    }
    public static function listPoint()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Punto");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach($modelResponse as $result){
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $puntoDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function listPointByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Punto WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach($modelResponse as $result){
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_admistrador']));
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $puntoDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function deletePoint($id_punto)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Punto WHERE id_punto = :id_punto");
        $stmt->bindParam(':id_punto', $id_punto);
        return  $stmt->execute();
    }
    public static function getCountPonitsByDate($fecha_inicio, $fecha_fin)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) AS contador 
                                FROM Punto 
                                WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
}