<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/CalendarioEventoDTO.php';

class CalendarioEvento extends System
{
    public static function newEventCalendar( $titulo, $fecha, $lugar, $hora, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO CalendarioEvento (titulo, fecha, lugar, hora, imagen, fecha_registro) 
                                VALUES (:titulo, :fecha, :lugar, :hora, :imagen, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':lugar', $lugar);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setEventCalendar($id_evento, $titulo, $fecha, $lugar, $hora)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE CalendarioEvento 
                            SET titulo = :titulo, fecha = :fecha, lugar = :lugar, hora = :hora
                            WHERE id_evento = :id_evento");
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':lugar', $lugar);
        $stmt->bindParam(':hora', $hora);
        return  $stmt->execute();
    }
    public static function setImageEventCalendar($id_evento, $imagen)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE CalendarioEvento SET imagen = :imagen WHERE id_evento = :id_evento ");
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getEventCalendar($id_evento){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CalendarioEvento WHERE id_evento = :id_evento");
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CalendarioEventoDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listEventCalendar()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CalendarioEvento");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CalendarioEventoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteEventCalendar($id_evento)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM CalendarioEvento WHERE id_evento = :id_evento");
        $stmt->bindParam(':id_evento', $id_evento);
        return  $stmt->execute();
    }
}
