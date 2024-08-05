<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/UsuarioBeneficioDTO.php';

class UsuarioBeneficio extends system
{
    public static function newUserBenefit($id_usuario, $id_beneficio, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO UsuarioBeneficio (id_usuario, id_beneficio, fecha_registro) 
                                VALUES (:id_usuario, :id_beneficio, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getUserBenefit($id_usuario_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM UsuarioBeneficio WHERE id_usuario_beneficio = :id_usuario_beneficio");
        $stmt->bindParam(':id_usuario_beneficio', $id_usuario_beneficio);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $usuarioBeneficioDTO = new UsuarioBeneficioDTO();

            $usuarioBeneficioDTO->setId_usuario_beneficio($response['id_usuario_beneficio']);
            $usuarioBeneficioDTO->setUsuarioDTO(Usuario::getUserById('id_usuario'));
            $usuarioBeneficioDTO->setBeneficioDTO(Beneficio::getBenefit($response['id_beneficio']));
            $usuarioBeneficioDTO->setFecha_registro($response['fecha_registro']);

            return $usuarioBeneficioDTO;
        }
        return null;
    }
    public static function deleteUserBenefit($id_usuario_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM UsuarioBeneficio WHERE id_usuario_beneficio = :id_usuario_beneficio");
        $stmt->bindParam(':id_usuario_beneficio', $id_usuario_beneficio);
        return  $stmt->execute();
    }
}
