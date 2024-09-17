<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/UsuarioBeneficioDTO.php';

class UsuarioBeneficio extends system
{
    public static function newUserBenefit($identificador, $id_beneficio, $tipo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO UsuarioBeneficio (identificador, id_beneficio, tipo, fecha_registro) 
                                VALUES (:identificador, :id_beneficio, :tipo, :fecha_registro)");
        $stmt->bindParam(':identificador', $identificador);
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->bindParam(':tipo', $tipo);
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
            $usuarioBeneficioDTO->setIdentificador($response['identificador']);
            $usuarioBeneficioDTO->setBeneficioDTO(Beneficio::getBenefit($response['id_beneficio']));
            $usuarioBeneficioDTO->setTipo($response['tipo']);
            $usuarioBeneficioDTO->setFecha_registro($response['fecha_registro']);

            return $usuarioBeneficioDTO;
        }
        return null;
    }
    public static function getUserBenefitByUserAndBenefit($id_usuario, $id_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM UsuarioBeneficio 
                            WHERE identificador = :id_usuario
                            AND id_beneficio = :id_beneficio
                            AND tipo = 1");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $usuarioBeneficioDTO = new UsuarioBeneficioDTO();

            $usuarioBeneficioDTO->setId_usuario_beneficio($response['id_usuario_beneficio']);
            $usuarioBeneficioDTO->setIdentificador($response['identificador']);
            $usuarioBeneficioDTO->setBeneficioDTO(Beneficio::getBenefit($response['id_beneficio']));
            $usuarioBeneficioDTO->setTipo($response['tipo']);
            $usuarioBeneficioDTO->setFecha_registro($response['fecha_registro']);

            return $usuarioBeneficioDTO;
        }
        return null;
    }
    public static function getUserBenefitByComunidadAndBenefit($id_comunidad, $id_beneficio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM UsuarioBeneficio 
                            WHERE identificador = :id_comunidad
                            AND id_beneficio = :id_beneficio
                            AND tipo = 2");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_beneficio', $id_beneficio);
        $stmt->execute();
        $response = $stmt->fetch();
        if ($response) {
            $usuarioBeneficioDTO = new UsuarioBeneficioDTO();

            $usuarioBeneficioDTO->setId_usuario_beneficio($response['id_usuario_beneficio']);
            $usuarioBeneficioDTO->setIdentificador($response['identificador']);
            $usuarioBeneficioDTO->setBeneficioDTO(Beneficio::getBenefit($response['id_beneficio']));
            $usuarioBeneficioDTO->setTipo($response['tipo']);
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
