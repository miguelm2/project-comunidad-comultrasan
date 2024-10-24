<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/BeneficioDTO.php';

class Beneficio extends System
{
    public static function newBenefit($titulo, $definicion, $condiciones, $puntos, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Beneficio (titulo, definicion, condiciones, puntos, imagen, fecha_registro) 
                                VALUES (:titulo, :definicion, :condiciones, :puntos, :imagen, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':definicion', $definicion);
        $stmt->bindParam(':condiciones', $condiciones);
        $stmt->bindParam(':puntos', $puntos);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setBenefit($id_beneficio, $titulo, $definicion, $condiciones, $puntos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Beneficio 
                            SET titulo = :titulo, definicion = :definicion, condiciones = :condiciones, puntos = :puntos
                            WHERE id_beneficio = :id_beneficio");
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':definicion', $definicion);
        $stmt->bindParam(':condiciones', $condiciones);
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
    public static function listBenefitByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT bf.* 
                                FROM Beneficio as bf,
                                    UsuarioBeneficio as ub,
                                    Usuario as us
                                WHERE us.id_usuario = ub.identificador
                                AND us.id_usuario = :id_usuario
                                AND bf.id_beneficio = ub.id_beneficio
                                AND ub.tipo = 1");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function listBenefitByCommunity($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT bf.* 
                                FROM Beneficio as bf,
                                    UsuarioBeneficio as ub,
                                    Comunidad as c
                                WHERE c.id_comunidad = ub.identificador
                                AND c.id_comunidad = :id_usuario
                                AND bf.id_beneficio = ub.id_beneficio
                                AND ub.tipo = 2");
        $stmt->bindParam(':id_usuario', $id_comunidad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function getLastBenefit()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Beneficio 
                            ORDER BY id_beneficio DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
}
