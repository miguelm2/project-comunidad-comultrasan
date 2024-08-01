<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ForoDTO.php';

class Foro extends System
{
    public static function newForum($id_tipo_comunidad, $id_usuario, $contenido, $megusta, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Foro (id_tipo_comunidad, id_usuario, contenido, megusta, fecha_registro) 
                                VALUES (:id_tipo_comunidad, :id_usuario, :contenido, :megusta, :fecha_registro)");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':megusta', $megusta);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setForum($id_foro, $contenido, $megusta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Foro 
                            SET contenido = :contenido, megusta = :megusta
                            WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':megusta', $megusta);
        return  $stmt->execute();
    }
    public static function getForum($id_foro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Foro WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            return $foroDTO;
        }
        return null;
    }
    public static function listForum()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Foro");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $foroDTO;
            $con++;
        }
        return $list;
    }
    public static function listForumByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Foro WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $foroDTO;
            $con++;
        }
        return $list;
    }
    public static function deleteForum($id_foro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Foro WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        return  $stmt->execute();
    }
}
