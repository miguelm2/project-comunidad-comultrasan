<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/SeccionTipoComunidadDTO.php';

class SeccionTipoComunidad extends System
{
    public static function newSectionTypeCommunity($id_tipo_comunidad, $nombre, $descripcion, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO SeccionTipoComunidad (id_tipo_comunidad, nombre, descripcion, imagen, fecha_registro) 
                                VALUES (:id_tipo_comunidad, :nombre, :descripcion, :imagen, :fecha_registro)");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setSectionTypeCommunity($id_seccion, $nombre, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE SeccionTipoComunidad 
                            SET nombre = :nombre, descripcion = :descripcion
                            WHERE id_seccion = :id_seccion");
        $stmt->bindParam(':id_seccion', $id_seccion);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }
    public static function setImageSectionTypeCommunity($id_seccion, $imagen)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE SeccionTipoComunidad SET imagen = :imagen WHERE id_seccion = :id_seccion ");
        $stmt->bindParam(':id_seccion', $id_seccion);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getSectionTypeCommunity($id_seccion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM SeccionTipoComunidad WHERE id_seccion = :id_seccion");
        $stmt->bindParam(':id_seccion', $id_seccion);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'SeccionTipoComunidadDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listSectionTypeCommunityByTypeCommunity($id_tipo_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM SeccionTipoComunidad WHERE id_tipo_comunidad = :id_tipo_comunidad");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'SeccionTipoComunidadDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteSectionTypeCommunity($id_seccion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM SeccionTipoComunidad WHERE id_seccion = :id_seccion");
        $stmt->bindParam(':id_seccion', $id_seccion);
        return  $stmt->execute();
    }
}
