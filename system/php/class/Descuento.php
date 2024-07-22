<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/DescuentoDTO.php';

class Descuento extends System
{
    public static function newDiscount($descuento, $titulo, $vigencia, $acceso, $imagen, $logo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Descuento (titulo, descuento, vigencia, acceso, imagen, logo, fecha_registro) 
                                VALUES (:titulo, :descuento, :vigencia, :acceso, :imagen, :logo, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':vigencia', $vigencia);
        $stmt->bindParam(':acceso', $acceso);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':logo', $logo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setDiscount($id_descuento, $titulo, $descuento, $vigencia, $acceso)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Descuento 
                            SET titulo = :titulo, descuento = :descuento, vigencia = :vigencia, acceso = :acceso 
                            WHERE id_descuento = :id_descuento");
        $stmt->bindParam(':id_descuento', $id_descuento);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':vigencia', $vigencia);
        $stmt->bindParam(':acceso', $acceso);
        return  $stmt->execute();
    }
    public static function setImageDiscount($id_descuento, $imagen)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Descuento SET imagen = :imagen WHERE id_descuento = :id_descuento ");
        $stmt->bindParam(':id_descuento', $id_descuento);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function setLogoDiscount($id_descuento, $logo)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Descuento SET logo = :logo WHERE id_descuento = :id_descuento ");
        $stmt->bindParam(':id_descuento', $id_descuento);
        $stmt->bindParam(':logo', $logo);
        return  $stmt->execute();
    }
    public static function getDiscount($id_descuento){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Descuento WHERE id_descuento = :id_descuento");
        $stmt->bindParam(':id_descuento', $id_descuento);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'DescuentoDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listDiscount()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Descuento");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'DescuentoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteDiscount($id_descuento)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Descuento WHERE id_descuento = :id_descuento");
        $stmt->bindParam(':id_descuento', $id_descuento);
        return  $stmt->execute();
    }
    public static function getCountDiscountByDate($fecha_inicio, $fecha_fin)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) AS contador 
                                FROM Descuento 
                                WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
}
