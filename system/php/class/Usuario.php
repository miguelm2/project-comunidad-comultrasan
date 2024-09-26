<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/UsuarioDTO.php';

class Usuario extends System
{
    public static function newUser(
        $nombre,
        $correo,
        $cedula,
        $pass_hash,
        $estado,
        $tipo,
        $imagen,
        $tipo_documento,
        $fecha_registro
    ) {
        $validarUser = self::validateUser($cedula, $correo, null);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = Gestor::validateManager($cedula, $correo, null);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("INSERT INTO Usuario (nombre, correo,  cedula, pass, estado, tipo, imagen, tipo_documento, fecha_registro) 
                                VALUES (:nombre, :correo, :cedula, :pass, :estado, :tipo, :imagen, :tipo_documento, :fecha_registro)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':pass', $pass_hash);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':fecha_registro', $fecha_registro);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function setUser(
        $id_usuario,
        $nombre,
        $correo,
        $cedula,
        $estado,
        $tipo_documento
    ) {
        $validarUser = self::validateUser($cedula, $correo, $id_usuario);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = Gestor::validateManager($cedula, $correo, null);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Usuario 
                                SET nombre = :nombre, correo = :correo, cedula = :cedula, 
                                estado = :estado, tipo_documento = :tipo_documento
                                WHERE id_usuario = :id_usuario ");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function setImageUser($id_usuario, $imagen)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Usuario SET imagen = :imagen WHERE id_usuario = :id_usuario ");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getUser($cedula, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE cedula = :cedula AND pass = :pass AND estado = 1");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':pass', $pass_hash);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
    public static function listUser()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Usuario");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function listUserByFilter($filtro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE 1=1 " . $filtro);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function getUserByCedula($cedula)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE cedula = :cedula ");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getUserById($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE id_usuario = :id_usuario ");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function setUserPass($id_usuario, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Usuario SET pass = :pass WHERE id_usuario = :id_usuario ");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':pass', $pass_hash);
        return  $stmt->execute();
    }


    public static function setUserProfile(
        $id_usuario,
        $nombre,
        $correo,
        $cedula,
        $tipo_documento,
        $imagen
    ) {
        $validarUser = self::validateUser($cedula, $correo, $id_usuario);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = Gestor::validateManager($cedula, $correo, null);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Usuario 
                            SET nombre = :nombre, correo = :correo, cedula = :cedula,
                                tipo_documento = :tipo_documento, imagen = :imagen
                            WHERE id_usuario = :id_usuario ");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':imagen', $imagen);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function deleteUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Usuario WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }
    public static function validateUser($cedula, $correo, $id_usuario)
    {
        $dbh  = parent::Conexion();

        if ($id_usuario == null) {
            $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE cedula = :cedula OR correo = :correo");
        } else {
            $stmt = $dbh->prepare("SELECT * FROM Usuario WHERE (cedula = :cedula OR correo = :correo) AND id_usuario != :id_usuario");
            $stmt->bindParam(':id_usuario', $id_usuario);
        }

        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':correo', $correo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();

        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }
    public static function lastUsuario()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Usuario ORDER BY id_usuario DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function countUsuarios()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT count(*) as total FROM Usuario");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
    public static function countUsersByDate($fecha_inicio, $fecha_fin)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) as total FROM Usuario WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
    public static function getUsersWithoutCommunity()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT us.* 
                            FROM Usuario us
                            WHERE NOT EXISTS(
                                SELECT 1
                                FROM UsuarioComunidad uc
                                WHERE us.id_usuario = uc.id_usuario
                            ) AND NOT EXISTS(
                                SELECT 1
                                FROM Comunidad cm
                                WHERE cm.id_usuario = us.id_usuario
                            )");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function getUsersInCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT us.*, 
                                (SELECT SUM(puntos) 
                                    FROM Punto 
                                    WHERE id_usuario = us.id_usuario) AS total_puntos
                            FROM Usuario us
                            WHERE EXISTS (
                                    SELECT 1
                                    FROM UsuarioComunidad uc
                                    WHERE us.id_usuario = uc.id_usuario
                                    AND uc.id_comunidad = :id_comunidad
                                    AND uc.estado = 2
                                )
                            AND NOT EXISTS (
                                    SELECT 1
                                    FROM Comunidad cm
                                    WHERE cm.id_usuario = us.id_usuario
                                    AND cm.id_comunidad = :id_comunidad1
                                )
                            ORDER BY total_puntos DESC;
                            ");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_comunidad1', $id_comunidad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function getUsersInCommunityRequest($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT us.*, 
                                (SELECT SUM(puntos) 
                                    FROM Punto 
                                    WHERE id_usuario = us.id_usuario) AS total_puntos
                            FROM Usuario us
                            WHERE EXISTS (
                                    SELECT 1
                                    FROM UsuarioComunidad uc
                                    WHERE us.id_usuario = uc.id_usuario
                                    AND uc.id_comunidad = :id_comunidad
                                    AND uc.estado = 1
                                )
                            AND NOT EXISTS (
                                    SELECT 1
                                    FROM Comunidad cm
                                    WHERE cm.id_usuario = us.id_usuario
                                    AND cm.id_comunidad = :id_comunidad1
                                )
                            ORDER BY total_puntos DESC;
                            ");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_comunidad1', $id_comunidad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'UsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function countUsersInCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT Count(us.id_usuario) + 1 as contador
                                FROM UsuarioComunidad cm,
                                    Usuario us
                                WHERE us.id_usuario = cm.id_usuario
                                AND cm.id_comunidad = :id_comunidad
                                AND cm.estado = 2");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $response = $stmt->fetch();
        return $response['contador'];
    }
}
