<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ActividadUsuarioDTO.php';

class ActividadUsuario extends System
{
    public static function newActivityUser($id_usuario, $id_actividad, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ActividadUsuario (id_usuario, id_actividad, fecha_registro) 
                                VALUES (:id_usuario, :id_actividad, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_actividad', $id_actividad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function getActivityUser($id_actividad_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario WHERE id_actividad_usuario = :id_actividad_usuario");
        $stmt->bindParam(':id_actividad_usuario', $id_actividad_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function listActivityUser()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function listActivityUserByUser($id_usuario)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ActividadUsuario WHERE id_usuario  = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ActividadUsuarioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteActivityUser($id_actividad_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ActividadUsuario WHERE id_actividad_usuario = :id_actividad_usuario");
        $stmt->bindParam(':id_actividad_usuario', $id_actividad_usuario);
        return  $stmt->execute();
    }
    public static function listMissingActivityUserCommunity($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT u.id_usuario, u.nombre, a.actividad
                                FROM Usuario u, UsuarioComunidad uc, Actividad a
                                WHERE uc.id_comunidad = :id_comunidad
                                AND u.id_usuario = uc.id_usuario
                                AND a.id_actividad NOT IN (
                                    SELECT au.id_actividad
                                    FROM ActividadUsuario au
                                    WHERE au.id_usuario = u.id_usuario
                                )
                                UNION
                                SELECT u.id_usuario, u.nombre, a.actividad
                                FROM Usuario u, Comunidad c, Actividad a
                                WHERE c.id_comunidad = :id_comunidad1
                                AND u.id_usuario = c.id_usuario
                                AND a.id_actividad NOT IN (
                                    SELECT au.id_actividad
                                    FROM ActividadUsuario au
                                    WHERE au.id_usuario = u.id_usuario
                                );");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_comunidad1', $id_comunidad);
        $stmt->execute();
        $modelResponse =  $stmt->fetchAll();
        $list = array();
        $cont = 0;
        foreach ($modelResponse as $result) {
            $userActivity = array(
                'nombre'    => $result['nombre'],    // Nombre del usuario
                'actividad' => $result['actividad']  // Actividad pendiente
            );
            $list[$cont] = $userActivity;
            $cont++;
        }
        return $list;
    }
    public static function listRealizedActivityUserCommunity($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT u.id_usuario, u.nombre, a.actividad
                                FROM Usuario u, UsuarioComunidad uc, Actividad a, ActividadUsuario au
                                WHERE uc.id_comunidad = :id_comunidad
                                AND u.id_usuario = uc.id_usuario
                                AND au.id_usuario = u.id_usuario
                                AND a.id_actividad = au.id_actividad
                                UNION
                                SELECT u.id_usuario, u.nombre, a.actividad
                                FROM Usuario u, Comunidad c, Actividad a, ActividadUsuario au
                                WHERE c.id_comunidad = :id_comunidad1
                                AND u.id_usuario = c.id_usuario
                                AND au.id_usuario = u.id_usuario
                                AND a.id_actividad = au.id_actividad;
                                ");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_comunidad1', $id_comunidad);
        $stmt->execute();
        $modelResponse =  $stmt->fetchAll();
        $list = array();
        $cont = 0;
        foreach ($modelResponse as $result) {
            $userActivity = array(
                'nombre'    => $result['nombre'],    // Nombre del usuario
                'actividad' => $result['actividad']  // Actividad pendiente
            );
            $list[$cont] = $userActivity;
            $cont++;
        }
        return $list;
    }
    public static function listShowAllActivityUserCommunity($id_comunidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT u.id_usuario, u.nombre, a.actividad, 'Actividad Realizada' as estado
                                FROM Usuario u, UsuarioComunidad uc, Actividad a, ActividadUsuario au
                                WHERE uc.id_comunidad = :id_comunidad
                                AND u.id_usuario = uc.id_usuario
                                AND au.id_usuario = u.id_usuario
                                AND a.id_actividad = au.id_actividad

                                UNION

                                SELECT u.id_usuario, u.nombre, a.actividad, 'Actividad Realizada' as estado
                                FROM Usuario u, Comunidad c, Actividad a, ActividadUsuario au
                                WHERE c.id_comunidad = :id_comunidad1
                                AND u.id_usuario = c.id_usuario
                                AND au.id_usuario = u.id_usuario
                                AND a.id_actividad = au.id_actividad

                                UNION

                                SELECT u.id_usuario, u.nombre, a.actividad, 'Actividad pendiente por realizar' as estado
                                FROM Usuario u, UsuarioComunidad uc, Actividad a
                                WHERE uc.id_comunidad = :id_comunidad2
                                AND u.id_usuario = uc.id_usuario
                                AND a.id_actividad NOT IN (
                                    SELECT au.id_actividad
                                    FROM ActividadUsuario au
                                    WHERE au.id_usuario = u.id_usuario
                                )
                                UNION
                                SELECT u.id_usuario, u.nombre, a.actividad, 'Actividad pendiente por realizar' as estado
                                FROM Usuario u, Comunidad c, Actividad a
                                WHERE c.id_comunidad = :id_comunidad3
                                AND u.id_usuario = c.id_usuario
                                AND a.id_actividad NOT IN (
                                    SELECT au.id_actividad
                                    FROM ActividadUsuario au
                                    WHERE au.id_usuario = u.id_usuario
                                );");
        $stmt->bindParam(':id_comunidad', $id_comunidad);
        $stmt->bindParam(':id_comunidad1', $id_comunidad);
        $stmt->bindParam(':id_comunidad2', $id_comunidad);
        $stmt->bindParam(':id_comunidad3', $id_comunidad);
        $stmt->execute();
        $modelResponse =  $stmt->fetchAll();
        $list = array();
        $cont = 0;
        foreach ($modelResponse as $result) {
            $userActivity = array(
                'nombre'    => $result['nombre'],    
                'actividad' => $result['actividad'],
                'estado'    => $result['estado']
            );
            $list[$cont] = $userActivity;
            $cont++;
        }
        return $list;
    }
}
