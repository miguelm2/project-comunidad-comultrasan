<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServiceAdmin extends System
{
    public static function setProfile($nombre, $correo, $telefono, $cedula)
    {
        try {
            $nombre     = parent::limpiarString($nombre);
            $correo     = parent::limpiarString($correo);
            $telefono   = parent::limpiarString($telefono);
            $cedula     = parent::limpiarString($cedula);
            $id_administrador = $_SESSION['id'];
            if (Administrador::setAdministratorProfile($id_administrador, $nombre, $correo, $telefono, $cedula)) {
                $administrador = Administrador::getAdministradorById($id_administrador);
                $_SESSION['id']     =   $administrador->getId_administrador();
                $_SESSION['nombre'] =   $administrador->getNombre();
                $_SESSION['correo'] =   $administrador->getCorreo();
                $_SESSION['cedula'] =   $administrador->getCedula();
                $_SESSION['telefono'] = $administrador->getTelefono();
                $_SESSION['tipo']   =   $administrador->getTipo();
                $_SESSION['fecha_registro'] = $administrador->getFecha_registro();
                return  '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setPassProfile($pass, $newPass, $confirmPass)
    {
        try {
            $pass           = parent::limpiarString($pass);
            $newPass        = parent::limpiarString($newPass);
            $confirmPass    = parent::limpiarString($confirmPass);
            $cedula         = $_SESSION['cedula'];
            $pass_hash      = parent::hash($pass);

            $result = Administrador::getAdministrador($cedula, $pass_hash);

            if ($result) {
                $id_administrador = $_SESSION['id'];
                $pass_hash = parent::hash($newPass);
                $result = Administrador::setAdministradorPass($id_administrador, $pass_hash);
                if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function newAdministrator($nombre, $correo, $telefono, $cedula, $pass)
    {
        try {
            $nombre     = parent::limpiarString($nombre);
            $correo     = parent::limpiarString($correo);
            $telefono   = parent::limpiarString($telefono);
            $cedula     = parent::limpiarString($cedula);
            $pass       = parent::limpiarString($pass);
            $pass_hash  = parent::hash($pass);
            $estado     = 1;
            $tipo       = 5;
            $fecha_registro = date('Y-m-d H:i:s');

            $imagen = self::newImagen();

            $result = Administrador::newAdministrator($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $imagen, $fecha_registro);
            if ($result) {
                $lastAdmin = Administrador::lastAdministrator();
                header('Location:administrator?administrator=' . $lastAdmin->getId_administrador() . '&new');
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setAdministrator($id_administrador, $nombre, $correo, $telefono, $cedula, $estado)
    {
        try {
            $id_administrador = parent::limpiarString($id_administrador);
            $nombre = parent::limpiarString($nombre);
            $correo = parent::limpiarString($correo);
            $telefono = parent::limpiarString($telefono);
            $cedula = parent::limpiarString($cedula);
            $estado = parent::limpiarString($estado);

            $result = Administrador::setAdministrator($id_administrador, $nombre, $correo, $telefono, $cedula, $estado);

            if ($result) {
                return  '<script>swal("' . Constants::$ADMIN_UPDATE . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageAdministrator($id_administrador)
    {
        try {
            $id_administrador = parent::limpiarString($id_administrador);
            $administradorDTO = self::getAdministrator($id_administrador);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_ADMIN . $administradorDTO->getImagen();

            if (file_exists($dirImagen) && !empty($administradorDTO->getImagen()) && $administradorDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }

            $imagen = self::newImagen();

            $result = Administrador::setImageAdministrator($id_administrador, $imagen);
            if ($result) {
                return  '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageProfile()
    {
        try {
            $id_administrador = $_SESSION['id'];
            $administradorDTO = self::getAdministrator($id_administrador);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_ADMIN . $administradorDTO->getImagen();

            if (file_exists($dirImagen) && !empty($administradorDTO->getImagen()) && $administradorDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }

            $imagen = self::newImagen();

            $result = Administrador::setImageAdministrator($id_administrador, $imagen);
            $_SESSION['imagen'] = $imagen;
            if ($result) {
                return  '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setPassAdministrator($id_administrador, $pass, $confirmPass)
    {
        try {
            $id_administrador = parent::limpiarString($id_administrador);
            $pass = parent::limpiarString($pass);
            $confirmPass = parent::limpiarString($confirmPass);

            $pass_hash = parent::hash($pass);
            $result = Administrador::setAdministradorPass($id_administrador, $pass_hash);
            if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getAdministrator($id_administrador)
    {
        try {
            $id_administrador = parent::limpiarString($id_administrador);

            $modelResponse = Administrador::getAdministradorById($id_administrador);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteAdministrator($id_administrador)
    {
        try {
            $id_administrador = parent::limpiarString($id_administrador);

            $result = Administrador::deleteAdministrador($id_administrador);
            if ($result) header('Location:administrators?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaAdministradores()
    {
        try {
            $tableHtml = "";
            $adminId = $_SESSION["id"];
            $modelResponse = Administrador::listAdministrador($adminId);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTelefono() . '</td>';
                    $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                    $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("administrator", $valor->getId_administrador()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                $tableHtml = '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
            }

            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function newImagen()
    {
        try {
            if (isset($_FILES['imageAdmin']) && $_FILES['imageAdmin']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageAdmin']['tmp_name'];
                $filename   = $_FILES['imageAdmin']['name'];
                $fileSize   = $_FILES['imageAdmin']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_ADMIN;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'administrador_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
}
