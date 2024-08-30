<?php

use PhpOffice\PhpSpreadsheet\Writer\Ods\Content;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HistorialInformacion.php';

class ServiceUser extends System
{
    public static function newUser($nombre, $correo, $telefono, $cedula, $pass, $tipo_documento, $fecha_nacimiento, $estado)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'singup.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $pass = parent::limpiarString($pass);
                $pass_hash = parent::hash($pass);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $fecha_nacimiento = parent::limpiarString($fecha_nacimiento);
                $estado = parent::limpiarString($estado);
                $tipo = 1;
                $fecha_registro = date('Y-m-d H:i:s');

                $imagen = self::newImagen();

                $result = Usuario::newUser($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $imagen, $tipo_documento, $fecha_nacimiento, $fecha_registro);

                // Si existe una invitación, gestionar unión a la comunidad
                if ($invitacionDTO = Invitacion::getInvitationByCedula($cedula)) {
                    $usuarioDTO = Usuario::getUserByCedula($cedula);
                    $referidoDTO = Referido::getReferredByCedula($cedula);
                    $comunidadDTO = Comunidad::getCommunityByUser($referidoDTO->getId_usuario());

                    $result = UsuarioComunidad::newUserCommunity($usuarioDTO->getId_usuario(), $comunidadDTO->getId_comunidad(), 1, $fecha_registro);
                    self::enviarCorreoUnionComunidad($usuarioDTO, $correo);
                }

                return $result
                    ? Elements::crearMensajeAlerta(Constants::$USER_NEW, "success")
                    : Elements::crearMensajeAlerta(Constants::$ADMIN_REPEAT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function enviarCorreoUnionComunidad($usuarioDTO, $correo)
    {
        $lastRegister = UsuarioComunidad::getUserCommunityByUserInactive($usuarioDTO->getId_usuario());
        $asunto = "Solicitud de unión a comunidad";
        $mensaje = "Estimado/a líder de la comunidad, <br><br>
                El usuario " . $lastRegister->getUsuarioDTO()->getNombre() . " ha solicitado unirse a tu comunidad. 
                Para revisar y aceptar o rechazar esta solicitud, por favor, haz clic en el siguiente enlace: " . self::getURL() .
            '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad() . "<br><br>
                Gracias por tu liderazgo y dedicación. <br><br>
                Saludos cordiales, <br> El equipo de Financiera Comultrasan";

        Mail::sendEmail($asunto, $mensaje, $correo);
    }
    private static function getURL()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['REQUEST_URI'];
        $url = $protocol . "://" . $host . $script;
        return $url;
    }
    private static function newImagen()
    {
        try {
            if (isset($_FILES['imageUser']) && $_FILES['imageUser']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageUser']['tmp_name'];
                $filename   = $_FILES['imageUser']['name'];
                $fileSize   = $_FILES['imageUser']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_USER;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'usuario_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
                    $target_path = $dirImagen . $imagen;
                    move_uploaded_file($source, $target_path);
                    closedir($dir);
                }

                return $imagen;
            } else {
                return "default.png";
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setProfile($nombre, $correo, $telefono, $cedula, $tipo_documento, $fecha_nacimiento)
    {
        try {

            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $fecha_nacimiento = parent::limpiarString($fecha_nacimiento);
                $id_usuario = $_SESSION['id'];

                if (Usuario::setUserProfile($id_usuario, $nombre, $correo, $telefono, $cedula, $tipo_documento, $fecha_nacimiento)) {
                    $usuario = Usuario::getUserById($id_usuario);
                    $_SESSION['id']                 =   $usuario->getId_usuario();
                    $_SESSION['nombre']             =   $usuario->getNombre();
                    $_SESSION['correo']             =   $usuario->getCorreo();
                    $_SESSION['cedula']             =   $usuario->getCedula();
                    $_SESSION['telefono']           =   $usuario->getTelefono();
                    $_SESSION['tipo']               =   $usuario->getTipo();
                    $_SESSION['fecha_nacimiento']   =   $usuario->getFecha_nacimiento();
                    $_SESSION['fecha_registro']     =   $usuario->getFecha_registro();
                    $historialDTO = HistorialInformacion::getHistoryInformationByUser($_SESSION['id']);
                    $fecha_registro = date('Y-m-d H:i:s');
                    if (!$historialDTO) {
                        HistorialInformacion::newHistoryInformation($_SESSION['id'], $fecha_registro);
                        Punto::newPoint(5, $_SESSION['id'], 1, "Actualización de información", $fecha_registro);
                    }
                    return  '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPassProfile($pass, $newPass, $confirmPass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $pass = parent::limpiarString($pass);
                $newPass = parent::limpiarString($newPass);
                $confirmPass = parent::limpiarString($confirmPass);

                $cedula = $_SESSION['cedula'];
                $pass_hash = parent::hash($pass);
                $result = Usuario::getUser($cedula, $pass_hash);

                if ($result) {
                    $id_usuario = $_SESSION['id'];
                    $pass_hash = parent::hash($newPass);
                    $result = Usuario::setUserPass($id_usuario, $pass_hash);
                    if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $estado, $tipo_documento, $fecha_nacimiento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $estado = parent::limpiarString($estado);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $fecha_nacimiento = parent::limpiarString($fecha_nacimiento);

                $result = Usuario::setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $estado, $tipo_documento, $fecha_nacimiento);

                if ($result) {
                    return  '<script>swal("' . Constants::$USER_UPDATE . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageUser($id_usuario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario  = parent::limpiarString($id_usuario);
                $userDTO     = self::getUsuario($id_usuario);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_USER . $userDTO->getImagen();

                if (file_exists($dirImagen) && !empty($userDTO->getImagen()) && $userDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Usuario::setImageUser($id_usuario, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageUserProfile()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $id_usuario  = $_SESSION['id'];
                $userDTO     = self::getUsuario($id_usuario);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_USER . $userDTO->getImagen();

                if (file_exists($dirImagen) && !empty($userDTO->getImagen()) && $userDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Usuario::setImageUser($id_usuario, $imagen);
                if ($result) {
                    $_SESSION['imagen'] = $imagen;
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPassUser($id_usuario, $pass, $confirmPass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);
                $pass = parent::limpiarString($pass);
                $confirmPass = parent::limpiarString($confirmPass);

                $pass_hash = parent::hash($pass);
                $result = Usuario::setUserPass($id_usuario, $pass_hash);
                if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteUser($id_usuario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);

                $result = Usuario::deleteUser($id_usuario);
                if ($result) {
                    header('Location:users?delete');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUsuario($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);

            $result = Usuario::getUserById($id_usuario);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaUsuarios()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users.php') {
                $tableHtml = "";
                $modelResponse = Usuario::listUser();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getTelefono() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                        $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("user", $valor->getId_usuario()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    $tableHtml = '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionUser()
    {
        try {
            $html = "";
            $modelResponse = Usuario::listUser();

            foreach ($modelResponse as $value) {
                $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionUserWithoutCommunity()
    {
        try {
            $html = "";
            $modelResponse = Usuario::getUsersWithoutCommunity();

            foreach ($modelResponse as $value) {
                $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getColorByEstate($estado)
    {
        try {
            switch ($estado) {
                case 0: {
                        return 'danger';
                    }
                case 1: {
                        return 'success';
                    }
                case 2: {
                        return 'warning';
                    }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
