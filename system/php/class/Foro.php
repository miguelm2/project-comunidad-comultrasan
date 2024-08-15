<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ForoDTO.php';

class Foro extends System
{
    public static function newForum($id_tipo_comunidad, $id_usuario, $contenido, $megusta, $titulo, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Foro (id_tipo_comunidad, id_usuario, contenido, megusta, titulo, fecha_registro) 
                                VALUES (:id_tipo_comunidad, :id_usuario, :contenido, :megusta, :titulo, :fecha_registro)");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':megusta', $megusta);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setForum($id_foro, $contenido, $titulo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Foro 
                            SET contenido = :contenido, titulo = :titulo
                            WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':titulo', $titulo);
        return  $stmt->execute();
    }
    public static function setForumLiked($id_foro, $megusta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Foro 
                            SET megusta = :megusta
                            WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
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
            $foroDTO->setTitulo($result['titulo']);
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
        foreach ($modelResponse as $result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setTitulo($result['titulo']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $foroDTO;
            $con++;
        }
        return $list;
    }
    public static function listForumByTypeCommunity($id_tipo_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT fr.* 
                                FROM Foro as fr,
                                    TipoComunidad as tc
                                WHERE tc.id_tipo_comunidad = fr.id_tipo_comunidad
                                AND tc.id_tipo_comunidad = :id_tipo_comunidad");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach ($modelResponse as $result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setTitulo($result['titulo']);
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
        foreach ($modelResponse as $result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setTitulo($result['titulo']);
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
    public static function getLastForumByTypeCommunityAndUser($id_tipo_comunidad, $id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * 
                            FROM Foro 
                            WHERE id_tipo_comunidad = :id_tipo_comunidad
                            AND id_usuario = :id_usuario
                            ORDER BY id_foro DESC");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setTitulo($result['titulo']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            return $foroDTO;
        }
        return null;
    }
    public static function getLastForumByTypeCommunity($id_tipo_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * 
                            FROM Foro 
                            WHERE id_tipo_comunidad = :id_tipo_comunidad
                            ORDER BY id_foro DESC");
        $stmt->bindParam(':id_tipo_comunidad', $id_tipo_comunidad);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $foroDTO = new ForoDTO();

            $foroDTO->setId_foro($result['id_foro']);
            $foroDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($result['id_tipo_comunidad']));
            $foroDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $foroDTO->setContenido($result['contenido']);
            $foroDTO->setMegusta($result['megusta']);
            $foroDTO->setTitulo($result['titulo']);
            $foroDTO->setFecha_registro($result['fecha_registro']);

            return $foroDTO;
        }
        return null;
    }
}
