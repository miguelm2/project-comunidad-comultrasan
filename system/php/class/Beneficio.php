<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/BeneficioDTO.php';

class Beneficio extends System
{
    public static function newBenefit($titulo, $descripcion, $puntos, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Beneficio (titulo, descripcion, puntos, imagen, fecha_registro) 
                                VALUES (:titulo, :descripcion, :puntos, :imagen, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setBenefit($id_beneficio, $titulo, $descripcion, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Beneficio 
                            SET titulo = :titulo, descripcion = :descripcion, puntos = :puntos
                            WHERE id_beneficio = :id_beneficio");
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':puntos', $puntos);
        return  $stmt->execute();
    }
    public static function setImageBenefit($id_beneficio, $imagen)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Beneficio SET imagen = :imagen WHERE id_beneficio = :id_beneficio ");
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getBenefit($id_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Beneficio WHERE id_beneficio = :id_beneficio");
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listBenefit()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Beneficio");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteBenefit($id_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Beneficio WHERE id_beneficio = :id_beneficio");
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        return  $stmt->execute();
    }
    public static function getCountBenefitByDate($fecha_inicio, $fecha_fin)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) AS contador 
                                FROM Beneficio 
                                WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
    public static function listBenefitByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT bf.* 
                                FROM Beneficio as bf,
                                    UsuarioBeneficio as ub,
                                    Usuario as us
                                WHERE us.id_usuario = ub.id_usuario
                                AND us.id_usuario = :id_usuario
                                AND bf.id_beneficio = ub.id_beneficio");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
}
