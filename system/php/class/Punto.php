<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/PuntoDTO.php';

class Punto extends System
{
    public static function newPoint($puntos, $id_usuario, $id_administrador, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Punto (puntos, id_usuario, id_administrador, descripcion, fecha_registro) 
                                VALUES (:puntos, :id_usuario, :id_administrador, :descripcion, :fecha_registro)");
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_administrador', $id_administrador);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setPoint($id_punto, $puntos, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Punto 
                            SET puntos = :puntos, descripcion = :descripcion
                            WHERE id_punto = :id_punto");
        $stmt->bindParam(':id_punto', $id_punto);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }
    public static function getPoint($id_punto)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Punto WHERE id_punto = :id_punto");
        $stmt->bindParam(':id_punto', $id_punto);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
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
        foreach ($modelResponse as $result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $puntoDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function listPointByUserLider($id_usuario, $query = "")
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT pun.* 
                                FROM 
                                    Punto pun,
                                    Comunidad com,
                                    UsuarioComunidad UCom,
                                    Usuario us
                                WHERE com.id_usuario = :id_usuario
                                AND UCom.id_usuario = com.id_comunidad
                                AND UCom.id_usuario = pun.id_usuario
                                AND us.id_usuario = pun.id_usuario".
                                $query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $puntoDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function listPointByUser($id_usuario, $query = '')
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT pun.* 
                                FROM 
                                    Punto pun,
                                    Usuario us
                                WHERE pun.id_usuario = :id_usuario
                                AND us.id_usuario = pun.id_usuario
                                ". $query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            $listResponse[$con] = $puntoDTO;
            $con++;
        }
        return $listResponse;
    }
    public static function listPointByUserFilter($id_usuario, $filtro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Punto WHERE id_usuario = :id_usuario " . $filtro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();

        $listResponse = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
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
        $stmt = $dbh->prepare("SELECT SUM(puntos) AS contador 
                                FROM Punto 
                                WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
    public static function getSumPointsByUser($id_usuario)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT SUM(puntos) AS total 
                                FROM Punto
                                WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
    public static function getSumPointsByCommunity($id_comunidad)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT SUM(p.puntos) AS total
                                FROM UsuarioComunidad uc,
                                    Usuario us,
                                    Comunidad cm,
                                    Punto p
                                WHERE uc.id_usuario = us.id_usuario
								AND cm.id_comunidad = uc.id_comunidad
                                AND us.id_usuario = p.id_usuario
                                AND cm.id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
    public static function getLastPointByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Punto 
                            WHERE id_usuario = :id_usuario
                            ORDER BY id_punto DESC");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            $puntoDTO = new PuntoDTO();

            $puntoDTO->setId_punto($result['id_punto']);
            $puntoDTO->setPuntos($result['puntos']);
            $puntoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $puntoDTO->setAdministradorDTO(Administrador::getAdministradorById($result['id_administrador']));
            $puntoDTO->setDescripcion($result['descripcion']);
            $puntoDTO->setFecha_registro($result['fecha_registro']);
            return $puntoDTO;
        }
        return null;
    }
    public static function getTop10CommunitiesByPoints($mes_inicio, $mes_final)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 10 cm.nombre, SUM(p.puntos) AS total_puntos
                            FROM UsuarioComunidad uc,
                                Usuario us ,
                                Comunidad cm,
                                Punto p 
                            WHERE p.fecha_registro BETWEEN :mes_inicio AND :mes_final
                            AND uc.id_usuario = us.id_usuario
                            AND uc.id_comunidad = cm.id_comunidad
                            AND us.id_usuario = p.id_usuario
                            GROUP BY cm.nombre
                            ORDER BY total_puntos DESC");
        $stmt->bindParam(':mes_inicio', $mes_inicio);
        $stmt->bindParam(':mes_final', $mes_final);
        $stmt->execute();
        $modal = $stmt->fetchAll();
        $listNombre = array();
        $listSuma = array();
        $listReponse = array();
        $con = 0;
        foreach ($modal as $result) {
            $listNombre[$con] = $result['nombre'];
            $listSuma[$con] = round($result['total_puntos']);
            $con++;
        }
        $listReponse[0] = $listNombre;
        $listReponse[1] = $listSuma;

        return $listReponse;
    }
}
