<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/DescuentoDTO.php';

class Descuento extends System
{
    public static function newDiscount($descuento, $vigencia, $accesso, $imagen, $logo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Descuento (descuento, vigencia, accesso, imagen, logo, fecha_registro) 
                                VALUES (:descuento, :vigencia, :accesso, :imagen, :logo, :fecha_registro)");
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':vigencia', $vigencia);
        $stmt->bindParam(':accesso', $accesso);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':logo', $logo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setDiscount($id_descuento, $descuento, $vigencia, $accesso)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Descuento 
                            SET descuento = :descuento, vigencia = :vigencia, accesso = :accesso 
                            WHERE id_descuento = :id_descuento");
        $stmt->bindParam(':id_descuento', $id_descuento);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':vigencia', $vigencia);
        $stmt->bindParam(':accesso', $accesso);
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
}
