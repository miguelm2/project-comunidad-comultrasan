<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/GestorDTO.php';
class Gestor extends System
{
    public static function newManager($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $imagen, $fecha_registro)
    {
        $validarUser = Usuario::validateUser($cedula, $correo, null);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = self::validateManager($cedula, $correo, null);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("INSERT INTO Gestor (nombre, correo, telefono, cedula, pass, estado, tipo, imagen, fecha_registro) 
                                VALUES (:nombre, :correo, :telefono, :cedula, :pass, :estado, :tipo, :imagen, :fecha_registro)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':pass', $pass_hash);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':fecha_registro', $fecha_registro);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function setManager($id_gestor, $nombre, $correo, $telefono, $cedula, $estado)
    {
        $validarUser = Usuario::validateUser($cedula, $correo, null);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = self::validateManager($cedula, $correo, $id_gestor);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Gestor 
                                SET nombre = :nombre, correo = :correo, telefono = :telefono, 
                                    cedula = :cedula, estado = :estado 
                                WHERE id_gestor = :id_gestor ");
            $stmt->bindParam(':id_gestor', $id_gestor);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':estado', $estado);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function setImageManager($id_gestor, $imagen)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Gestor SET imagen = :imagen WHERE id_gestor = :id_gestor ");
        $stmt->bindParam(':id_gestor', $id_gestor);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getManager($cedula, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Gestor WHERE cedula = :cedula AND pass = :pass AND estado = 1");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':pass', $pass_hash);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
    public static function listManager()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Gestor");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function getManagerByCedula($cedula)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Gestor WHERE cedula = :cedula ");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getManagerById($id_gestor)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Gestor WHERE id_gestor = :id_gestor");
        $stmt->bindParam(':id_gestor', $id_gestor);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function setManagerPass($id_gestor, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Gestor SET pass = :pass WHERE id_gestor = :id_gestor ");
        $stmt->bindParam(':id_gestor', $id_gestor);
        $stmt->bindParam(':pass', $pass_hash);
        return  $stmt->execute();
    }


    public static function setManagerProfile($id_gestor, $nombre, $correo, $telefono, $cedula)
    {
        $validarUser = Usuario::validateUser($cedula, $correo, null);
        $validarAdmin = Administrador::validateAdministrator($cedula, $correo, null);
        $valideManager = self::validateManager($cedula, $correo, $id_gestor);

        if (!$validarAdmin && !$validarUser && !$valideManager) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Gestor 
                                    SET nombre = :nombre, correo = :correo, telefono = :telefono, cedula = :cedula 
                                    WHERE id_gestor = :id_gestor ");
            $stmt->bindParam(':id_gestor', $id_gestor);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            return  $stmt->execute();
        } else {
            return false;
        }
    }
    public static function deleteManager($id_gestor)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Gestor WHERE id_gestor = :id_gestor");
        $stmt->bindParam(':id_gestor', $id_gestor);
        return  $stmt->execute();
    }
    public static function validateManager($cedula, $correo, $id_gestor)
    {
        $dbh  = parent::Conexion();

        if ($id_gestor == null) {
            $stmt = $dbh->prepare("SELECT * FROM Gestor WHERE cedula = :cedula OR correo = :correo");
        } else {
            $stmt = $dbh->prepare("SELECT * FROM Gestor WHERE (cedula = :cedula OR correo = :correo) AND id_gestor != :id_gestor");
            $stmt->bindParam(':id_gestor', $id_gestor);
        }

        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':correo', $correo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();

        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    public static function lastManager()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Gestor ORDER BY id_gestor DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GestorDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function countManager()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT count(*) as total FROM Gestor");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
}
