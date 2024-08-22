<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Gestor.php';

class ServiceManager extends System
{
    public static function newManager($nombre, $correo, $telefono, $cedula, $pass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newManager.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $pass = parent::limpiarString($pass);
                $pass_hash = parent::hash($pass);
                $estado = 1;
                $tipo = 2;
                $fecha_registro = date('Y-m-d H:i:s');

                $imagen = self::newImagen();

                $result = Gestor::newManager($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $imagen, $fecha_registro);
                if ($result) {
                    $lastManager = Gestor::lastManager();
                    header('Location:manager?manager=' . $lastManager->getId_gestor() . '&new');
                } else {
                    return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function newImagen()
    {
        try {
            if (isset($_FILES['imageManager']) && $_FILES['imageManager']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageManager']['tmp_name'];
                $filename   = $_FILES['imageManager']['name'];
                $fileSize   = $_FILES['imageManager']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_MANAGER;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'gestor_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setProfile($nombre, $correo, $telefono, $cedula)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $id_gestor = $_SESSION['id'];

                if (Gestor::setManagerProfile($id_gestor, $nombre, $correo, $telefono, $cedula)) {
                    $gestorDTO = Gestor::getManagerById($id_gestor);
                    $_SESSION['id']     =   $gestorDTO->getId_gestor();
                    $_SESSION['nombre'] =   $gestorDTO->getNombre();
                    $_SESSION['correo'] =   $gestorDTO->getCorreo();
                    $_SESSION['cedula'] =   $gestorDTO->getCedula();
                    $_SESSION['telefono'] = $gestorDTO->getTelefono();
                    $_SESSION['tipo']   =   $gestorDTO->getTipo();
                    $_SESSION['fecha_registro'] = $gestorDTO->getFecha_registro();
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
                $result = Gestor::getManager($cedula, $pass_hash);

                if ($result) {
                    $id_gestor = $_SESSION['id'];
                    $pass_hash = parent::hash($newPass);
                    $result = Gestor::setManagerPass($id_gestor, $pass_hash);
                    if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setManager($id_usuario, $nombre, $correo, $telefono, $cedula, $estado)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'manager.php') {
                $id_usuario = parent::limpiarString($id_usuario);
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $telefono = parent::limpiarString($telefono);
                $cedula = parent::limpiarString($cedula);
                $estado = parent::limpiarString($estado);

                $result = Gestor::setManager($id_usuario, $nombre, $correo, $telefono, $cedula, $estado);

                if ($result) {
                    return  '<script>swal("' . Constants::$MANAGER_UPDATE . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageManager($id_gestor)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'manager.php') {
                $id_gestor  = parent::limpiarString($id_gestor);
                $gestorDTO     = self::getManager($id_gestor);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_MANAGER . $gestorDTO->getImagen();

                if (file_exists($dirImagen) && !empty($gestorDTO->getImagen()) && $gestorDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Gestor::setImageManager($id_gestor, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageManagerProfile()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $id_gestor  = $_SESSION['id'];
                $gestorDTO     = self::getManager($id_gestor);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_MANAGER . $gestorDTO->getImagen();

                if (file_exists($dirImagen) && !empty($gestorDTO->getImagen()) && $gestorDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Gestor::setImageManager($id_gestor, $imagen);
                if ($result) {
                    $_SESSION['imagen'] = $imagen;
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPassManager($id_gestor, $pass, $confirmPass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'manager.php') {
                $id_gestor = parent::limpiarString($id_gestor);
                $pass = parent::limpiarString($pass);
                $confirmPass = parent::limpiarString($confirmPass);

                $pass_hash = parent::hash($pass);
                $result = Gestor::setManagerPass($id_gestor, $pass_hash);
                if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteManager($id_gestor)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'manager.php') {
                $id_gestor = parent::limpiarString($id_gestor);

                $result = Gestor::deleteManager($id_gestor);
                if ($result) header('Location:managers?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getManager($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);

            $result = Gestor::getManagerById($id_usuario);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableManager()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'managers.php') {
                $tableHtml = "";
                $modelResponse = Gestor::listManager();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getTelefono() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                        $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("manager", $valor->getId_gestor()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
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
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
