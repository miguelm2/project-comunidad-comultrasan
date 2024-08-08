<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ComentarioForoDTO.php';

class ComentarioForo extends System
{
    public static function newForumComment($id_foro, $id_usuario, $comentario,  $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ComentarioForo (id_foro, id_usuario, comentario, fecha_registro) 
                                VALUES (:id_foro, :id_usuario, :comentario, :fecha_registro)");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setForumComment($id_comentario, $comentario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE ComentarioForo 
                            SET comentario = :comentario
                            WHERE id_comentario = :id_comentario");
        $stmt->bindParam(':id_comentario', $id_comentario);
        $stmt->bindParam(':comentario', $comentario);
        return  $stmt->execute();
    }
    public static function getForumComment($id_comentario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ComentarioForo WHERE id_comentario = :id_comentario");
        $stmt->bindParam(':id_comentario', $id_comentario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $comentarioForoDTO = new ComentarioForoDTO();

            $comentarioForoDTO->setId_comentario($result['id_comentario']);
            $comentarioForoDTO->setForoDTO(Foro::getForum($result['id_foro']));
            $comentarioForoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comentarioForoDTO->setComentario($result['comentario']);
            $comentarioForoDTO->setFecha_registro($result['fecha_registro']);

            return $comentarioForoDTO;
        }
        return null;
    }
    
    public static function listForumCommentByForum($id_foro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT cf.* 
                                FROM ComentarioForo as cf,
                                    Foro fr
                                WHERE cf.id_foro = fr.id_foro
                                AND fr.id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $con = 0;
        foreach($modelResponse as $result){
            $comentarioForoDTO = new ComentarioForoDTO();

            $comentarioForoDTO->setId_comentario($result['id_comentario']);
            $comentarioForoDTO->setForoDTO(Foro::getForum($result['id_foro']));
            $comentarioForoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $comentarioForoDTO->setComentario($result['comentario']);
            $comentarioForoDTO->setFecha_registro($result['fecha_registro']);

            $list[$con] = $comentarioForoDTO;
            $con++;
        }
        return $list;
    }
    public static function deleteForumComment($id_comentario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ComentarioForo WHERE id_comentario = :id_comentario");
        $stmt->bindParam(':id_comentario', $id_comentario);
        return  $stmt->execute();
    }
    public static function countForumCommentByForum($id_foro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(cf.id_foro) as contador
                                FROM ComentarioForo as cf,
                                    Foro fr
                                WHERE cf.id_foro = fr.id_foro
                                AND fr.id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
}
