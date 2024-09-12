<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Beneficio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioBeneficio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';

class ServiceBenefit extends System
{
    public static function newBenefit($titulo, $deficion, $condiciones, $puntos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newBenefit.php') {
                $titulo         = parent::limpiarString($titulo);
                $deficion     = parent::limpiarString($deficion);
                $condiciones    = parent::limpiarString($condiciones);
                $puntos         = parent::limpiarString($puntos);
                $fecha_registro = date('Y-m-d H:i:s');
                $imagen         = self::newImagen();

                $result = Beneficio::newBenefit($titulo, $deficion, $condiciones, $puntos, $imagen, $fecha_registro);

                if ($result) {
                    $lastBenefit = Beneficio::getLastBenefit();
                    $text = "CREATE - BENEFICIO - " . $lastBenefit->getId_beneficio() . " - " . $lastBenefit->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function newImagen()
    {
        try {
            if (isset($_FILES['imageBenefit']) && $_FILES['imageBenefit']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageBenefit']['tmp_name'];
                $filename   = $_FILES['imageBenefit']['name'];
                $fileSize   = $_FILES['imageBenefit']['size'];
                $imagen     = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageBenefit']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }
                
                if ($fileSize > 4000000) {
                    return Elements::crearMensajeAlerta("El archivo debe pesar menos de 4MB", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BENEFIT;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'beneficio_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
                    $target_path = $dirImagen . $imagen;
                    move_uploaded_file($source, $target_path);
                    closedir($dir);
                }

                return $imagen;
            } else {
                throw new Exception("No se ha enviado ninguna imagen o ha ocurrido un error en la carga del archivo.");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setBenefit($id_beneficio, $titulo, $deficion, $condiciones,  $puntos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefit.php') {
                $id_beneficio      = parent::limpiarString($id_beneficio);
                $titulo            = parent::limpiarString($titulo);
                $deficion          = parent::limpiarString($deficion);
                $condiciones       = parent::limpiarString($condiciones);
                $puntos            = parent::limpiarString($puntos);

                $result = Beneficio::setBenefit($id_beneficio, $titulo, $deficion, $condiciones, $puntos);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageBenefit($id_beneficio)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefit.php') {
                $id_beneficio  = parent::limpiarString($id_beneficio);
                $beneficioDTO   = self::getBenefit($id_beneficio);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BENEFIT . $beneficioDTO->getImagen();

                if (file_exists($dirImagen) && !empty($beneficioDTO->getImagen()) && $beneficioDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Beneficio::setImageBenefit($id_beneficio, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getBenefit($id_beneficio)
    {
        try {
            $id_beneficio = parent::limpiarString($id_beneficio);

            $result = Beneficio::getBenefit($id_beneficio);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteBenefit($id_beneficio)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefit.php') {
                $id_beneficio = parent::limpiarString($id_beneficio);
                $beneficioDTO = Beneficio::getBenefit($id_beneficio);

                $result = Beneficio::deleteBenefit($id_beneficio);
                if ($result) {
                    $text = "DELETE - BENEFICIO - " . $id_beneficio . " - " . $beneficioDTO->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    header('Location:benefits?delete');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableBenefit()
    {
        try {
            $tableHtml = "";
            $modelResponse = Beneficio::listBenefit();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_beneficio() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("benefit", $valor->getId_beneficio()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionBenefit()
    {
        try {
            $beneficioDTO = Beneficio::listBenefit();
            $html = '';
            foreach ($beneficioDTO as $value) {
                $html .= '<option value="' . $value->getId_beneficio() . '">' . $value->getTitulo() . '</option>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableBenefitByUser($id_usuario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);
                $tableHtml = "";
                $modelResponse = Beneficio::listBenefitByUser($id_usuario);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $usuarioBeneficio = UsuarioBeneficio::getUserBenefitByUserAndBenefit($id_usuario, $valor->getId_beneficio());
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                        $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                        if ($_SESSION['tipo'] == 5 || $_SESSION['tipo'] == 0)
                            $tableHtml .= '<td class="text-center">' . Elements::getButtonDeleteModalJs('takeOutBenefit', 'Remover', $usuarioBeneficio->getId_usuario_beneficio())  . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="4" class="text-center">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableBenefitUserByUser()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
                $id_usuario = $_SESSION['id'];
                $tableHtml = "";
                $modelResponse = Beneficio::listBenefitByUser($id_usuario);

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                        $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="3">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardBenefitUserByUser()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $html = "";
            $modelResponse = Beneficio::listBenefitByUser($id_usuario);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getCardsBenefitUser($valor->getTitulo());
                }
            } else {
                return '<div>No tienes beneficios en este momento</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableBenefitUserByCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $tableHtml = "";

            $comunidadDTO = Comunidad::getCommunity($id_comunidad);

            if ($comunidadDTO) {
                $tableHtml .= self::generateBenefitTable($comunidadDTO->getUsuarioDTO()->getId_usuario());
                $usuariosComunidadDTO = UsuarioComunidad::getUserCommunityByCommunity($comunidadDTO->getId_comunidad());
                foreach ($usuariosComunidadDTO as $usuarioComunidad) {
                    $tableHtml .= self::generateBenefitTable($usuarioComunidad->getUsuarioDTO()->getId_usuario());
                }
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function generateBenefitTable($id_usuario)
    {
        $tableHtml = '';
        $modelResponse = Beneficio::listBenefitByUser($id_usuario);
        $usuarioDTO = Usuario::getUserById($id_usuario);
        if ($modelResponse) {
            foreach ($modelResponse as $valor) {
                $usuarioBeneficio = UsuarioBeneficio::getUserBenefitByUserAndBenefit($id_usuario, $valor->getId_beneficio());
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                $tableHtml .= '<td>' . $usuarioDTO->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                    $tableHtml .= '<td class="text-center">' . Elements::getButtonDeleteModalJs('takeOutBenefit', 'Remover', $usuarioBeneficio->getId_usuario_beneficio())  . '</td>';
                }
                $tableHtml .= '</tr>';
            }
        }
        return $tableHtml;
    }
}
