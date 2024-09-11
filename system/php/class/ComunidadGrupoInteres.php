<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ComunidadGrupoInteresDTO.php';

class ComunidadGrupoInteres extends system
{
    public static function newCommunityGroupInterest($id_comunidad, $id_grupo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ComunidadGrupoInteres (id_comunidad, id_grupo, fecha_registro) 
                                VALUES (:id_comunidad, :id_grupo, :fecha_registro)");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_grupo', $id_grupo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getCommunityGroupInterest($id_comunidad_grupo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ComunidadGrupoInteres WHERE id_comunidad_grupo = :id_comunidad_grupo");
        $stmt->bindParam(':id_comunidad_grupo', $id_comunidad_grupo);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $comunidadGrupoInteresDTO = new ComunidadGrupoInteresDTO();

            $comunidadGrupoInteresDTO->setId_comunidad_grupo($response['id_comunidad_grupo']);
            $comunidadGrupoInteresDTO->setComunidadDTO(Comunidad::getCommunity('id_comunidad'));
            $comunidadGrupoInteresDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($response['id_grupo']));
            $comunidadGrupoInteresDTO->setFecha_registro($response['fecha_registro']);

            return $comunidadGrupoInteresDTO;
        }
        return null;
    }
    public static function getCommunityGroupInterestByCommunity($id_comunidad)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ComunidadGrupoInteres WHERE id_comunidad = :id_comunidad");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $comunidadGrupoInteresDTO = new ComunidadGrupoInteresDTO();

            $comunidadGrupoInteresDTO->setId_comunidad_grupo($response['id_comunidad_grupo']);
            $comunidadGrupoInteresDTO->setComunidadDTO(Comunidad::getCommunity($response['id_comunidad']));
            $comunidadGrupoInteresDTO->setTipoComunidadDTO(TipoComunidad::getTypeComunity($response['id_grupo']));
            $comunidadGrupoInteresDTO->setFecha_registro($response['fecha_registro']);

            return $comunidadGrupoInteresDTO;
        }
        return null;
    }
    public static function deleteCommunityGroupInterest($id_comunidad_grupo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ComunidadGrupoInteres WHERE id_comunidad_grupo = :id_comunidad_grupo");
        $stmt->bindParam(':id_comunidad_grupo', $id_comunidad_grupo);
        return  $stmt->execute();
    }
}
