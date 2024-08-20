<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/MeGustaDTO.php';

class MeGusta extends system
{
    public static function newLike($id_foro, $id_usuario, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO MeGusta (id_foro, id_usuario, fecha_creacion) 
                                VALUES (:id_foro, :id_usuario, :fecha_creacion)");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_creacion', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getLikeByUserAndForum($id_foro, $id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM MeGusta WHERE id_foro = :id_foro AND id_usuario = :id_usuario");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            $meGustaDTO = new MeGustaDTO();
            $meGustaDTO->setId_megusta($result['id_megusta']);
            $meGustaDTO->setForoDTO(Foro::getForum($result['id_foro']));
            $meGustaDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $meGustaDTO->setFecha_registro($result['fecha_registro']);
            return $meGustaDTO;
        }
        return null;
    }
    public static function deleteLike($id_foro, $id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM MeGusta WHERE id_foro = :id_foro AND id_usuario = :id_usuario");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }

    public static function getCountLikesByForum($id_foro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_megusta) as total FROM MeGusta WHERE id_foro = :id_foro");
        $stmt->bindParam(':id_foro', $id_foro);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
}
