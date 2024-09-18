<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/CodigoOTPDTO.php';

class CodigoOTP extends System
{
   public static function newCodeOTP($id_usuario, $codigo, $tiempo, $estado,  $fecha_registro)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("INSERT INTO CodigoOTP (id_usuario, codigo, tiempo, estado, fecha_registro) 
                           VALUES (:id_usuario, :codigo, :tiempo, :estado, :fecha_registro)");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->bindParam(':codigo', $codigo);
      $stmt->bindParam(':tiempo', $tiempo);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':fecha_registro', $fecha_registro);
      return  $stmt->execute();
   }
   public static function setCodeOTPEstate($id_codigo, $estado)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("UPDATE CodigoOTP 
                           SET estado = :estado
                           WHERE id_codigo = :id_codigo");
      $stmt->bindParam(':id_codigo', $id_codigo);
      $stmt->bindParam(':estado', $estado);
      return  $stmt->execute();
   }
   public static function setCodeOTPCodeNew($id_codigo, $codigo, $tiempo)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("UPDATE CodigoOTP 
                           SET codigo = :codigo, tiempo = :tiempo
                           WHERE id_codigo = :id_codigo");
      $stmt->bindParam(':id_codigo', $id_codigo);
      $stmt->bindParam(':codigo', $codigo);
      $stmt->bindParam(':tiempo', $tiempo);
      return  $stmt->execute();
   }
   public static function getCodeByUser($id_usuario)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * FROM CodigoOTP WHERE id_usuario = :id_usuario");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->setFetchMode(PDO::FETCH_CLASS, 'CodigoOTPDTO');
      $stmt->execute();
      return $stmt->fetch();
   }
}
