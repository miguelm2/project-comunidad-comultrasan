<?php
class NumeroVistas extends system
{
    public static function getCountVisitas(){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT count(*) as contador FROM Visitas");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
    
    public static function getVistasIp($ip, $session_id){
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT count(*) as count FROM Visitas WHERE ip = :ip and session_id = :session_id");
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':session_id', $session_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['count'];
    }
    
    public static function getFechaVistas($ip, $session_id){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT TOP 1 * FROM Visitas WHERE ip = :ip and session_id = :session_id ORDER BY id_visita DESC");
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':session_id', $session_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['fecha_registro'];
    }
    

    public static function insertNuevaVista($ip, $session_id, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Visitas (ip, session_id, fecha_registro) 
                                VALUES (:ip, :session_id, :fecha_registro)");
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':session_id', $session_id);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getCountVisitasByFecha($fecha_inicio, $fecha_fin)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) AS contador 
                                FROM Visitas 
                                WHERE fecha_registro BETWEEN :fecha_inicio AND :fecha_fin");
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['contador'];
    }
}
?>