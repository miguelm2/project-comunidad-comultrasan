<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TipoComunidadDTO.php';

class TipoComunidad extends System
{
    public static function newTypeComunity($titulo, $icono, $subtitulo, $contenido, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO TipoComunidad (titulo, icono, subtitulo, contenido, imagen, fecha_registro) 
                                VALUES (:titulo, :icono, :subtitulo, :contenido, :imagen, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':icono', $icono);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE TipoComunidad 
                            SET titulo = :titulo, icono = :icono, subtitulo = :subtitulo, contenido = :contenido 
                            WHERE id_tipo_comunidad = :id_tipo_comunidad");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':icono', $icono);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':contenido', $contenido);
        return  $stmt->execute();
    }
    public static function setImageTypeComunity($id_tipo_comunidad, $imagen)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE TipoComunidad SET imagen = :imagen WHERE id_tipo_comunidad = :id_tipo_comunidad ");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getTypeComunity($id_tipo_comunidad){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoComunidad WHERE id_tipo_comunidad = :id_tipo_comunidad");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoComunidadDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listTypeComunity()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoComunidad");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoComunidadDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteTypeComunity($id_tipo_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TipoComunidad WHERE id_tipo_comunidad = :id_tipo_comunidad");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        return  $stmt->execute();
    }
}