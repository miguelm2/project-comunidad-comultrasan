<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ComunidadDTO.php';

class Comunidad extends System
{
    public static function newCommunity($nombre, $id_usuario, $estado, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Comunidad (nombre, id_usuario, fecha_registro) 
                                VALUES (:nombre, :id_usuario, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setCommunity($id_comunidad, $nombre, $estado)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Comunidad 
                                SET nombre = :nombre, estado = :estado
                                WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        return  $stmt->execute();
    }
    public static function setCommunityEstate($id_comunidad, $estado, $id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Comunidad 
                                SET estado = :estado, 
                                    id_usuario = :id_usuario
                                WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_usuario', $id_usuario);
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
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);

            return $comunidadDTO;
        }
        return null;
    }
    public static function getCommunityFilter($id_comunidad, $filtro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad WHERE id_comunidad = :id_comunidad ". $filtro);
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setId_comunidad($result['id_comunidad']);
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
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
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $comunidadDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function listCommunityDiferernt($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad WHERE id_comunidad != :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setid_comunidad($result['id_comunidad']);
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $comunidadDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function getCommunityByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT com.* 
                                FROM Comunidad com
                                WHERE com.id_usuario = :id_usuario
                                UNION 
                                SELECT com.*
                                FROM Comunidad com,
                                    UsuarioComunidad uc,
                                    Usuario us
                                WHERE us.id_usuario = com.id_usuario
                                AND uc.id_usuario = :id_usuario1
                                AND com.id_usuario != :id_usuario2
                                AND uc.estado = 2");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_usuario1', $id_usuario);
        $stmt->bindParam(':id_usuario2', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setId_comunidad($result['id_comunidad']);
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);

            return $comunidadDTO;
        }
        return null;
    }
    public static function getCommunityByUserType($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT com.*, 'Líder' as tipo, com.fecha_registro, com.fecha_registro as creacion
                                FROM Comunidad com
                                WHERE com.id_usuario = :id_usuario
                                UNION 
                                SELECT com.*, 'Miembro' as tipo, uc.fecha_registro, com.fecha_registro as creacion
                                FROM Comunidad com,
                                    UsuarioComunidad uc,
                                    Usuario us
                                WHERE us.id_usuario = com.id_usuario
                                AND uc.id_usuario = :id_usuario1
								AND uc.id_comunidad = com.id_comunidad
                                AND uc.estado = 2");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_usuario1', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return (object)[
                'id_comunidad' => $result['id_comunidad'],
                'nombre' => $result['nombre'],
                'tipo' => $result['tipo'],
                'fecha' => $result['fecha_registro'],
                'creacion' => $result['creacion']
            ];
        } else {
            return (object)[
                'id_comunidad' => 'No tiene comunidad',
                'nombre' => 'No tiene comunidad',
                'tipo' => 'No tiene comunidad',
                'fecha' => 'No tiene comunidad',
                'creacion' => 'No tiene comunidad'
            ];
        }
    }
    public static function deleteCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Comunidad WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        return  $stmt->execute();
    }
    public static function setLeaderCommunity($id_comunidad, $id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Comunidad 
                                SET id_usuario = :id_usuario 
                                WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }
    public static function getLastCommunity()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * 
                                FROM Comunidad
                                ORDER BY id_comunidad DESC");
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setId_comunidad($result['id_comunidad']);
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);

            return $comunidadDTO;
        }
        return null;
    }
    public static function getRankingByCommunity($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("WITH Ranking AS (
                                SELECT  C.id_comunidad, SUM(P.puntos) AS total_puntos, 
                                    RANK() OVER (ORDER BY SUM(P.puntos) DESC) AS posicion
                                FROM 
                                    Comunidad C, 
                                    UsuarioComunidad UC,
                                    Punto P
                                WHERE C.id_comunidad = UC.id_comunidad
                                AND UC.id_usuario = P.id_usuario
                                AND ((P.id_usuario = UC.id_usuario AND UC.estado = 2) OR P.id_usuario = C.id_usuario)
                                GROUP BY C.id_comunidad)
                                SELECT 
                                    R.posicion,
                                    (SELECT COUNT(*) FROM Ranking) AS total_comunidades, R.total_puntos
                                FROM Ranking R
                                WHERE R.id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function getCommunityByFilter($filtro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Comunidad WHERE 1=1 " . $filtro);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $comunidadDTO = new ComunidadDTO();

            $comunidadDTO->setid_comunidad($result['id_comunidad']);
            $comunidadDTO->setNombre($result['nombre']);
            $comunidadDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comunidadDTO->setEstado($result['estado']);
            $comunidadDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $comunidadDTO;
            $con++;
        }
        return $listResponse;
    }
}
