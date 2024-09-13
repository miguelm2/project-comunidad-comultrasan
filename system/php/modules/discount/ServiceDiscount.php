<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Descuento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';

class ServiceDiscount extends System
{
    public static function newDiscount($titulo, $descuento, $vigencia, $acceso)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newDiscount.php') {
                $titulo         = parent::limpiarString($titulo);
                $descuento      = parent::limpiarString($descuento);
                $vigencia       = parent::limpiarString($vigencia);
                $acceso         = parent::limpiarString($acceso);
                $fecha_registro = date('Y-m-d H:i:s');
                $imagen         = self::newImagen();
                $logo           = self::newLogo();

                $result = Descuento::newDiscount($titulo, $descuento, $vigencia, $acceso, $imagen, $logo, $fecha_registro);

                if ($result) {
                    $lastDiscount = Descuento::getLastDiscount();
                    $text = "CREATE - DESCUENTO - " . $lastDiscount->getId_descuento() . " - " . $lastDiscount->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
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
            if (isset($_FILES['imageDiscount']) && $_FILES['imageDiscount']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageDiscount']['tmp_name'];
                $filename   = $_FILES['imageDiscount']['name'];
                $fileSize   = $_FILES['imageDiscount']['size'];
                $imagen     = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageDiscount']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }
                if ($fileSize > 4000000) {
                    return Elements::crearMensajeAlerta("El archivo debe pesar menos de 4MB", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_DIS;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'descuento_img_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    private static function newLogo()
    {
        try {
            if (isset($_FILES['logoDiscount']) && $_FILES['logoDiscount']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['logoDiscount']['tmp_name'];
                $filename   = $_FILES['logoDiscount']['name'];
                $fileSize   = $_FILES['logoDiscount']['size'];
                $imagen     = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['logoDiscount']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_DIS_LOGO;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'descuento_logo_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setDiscount($id_descuento, $titulo, $descuento, $vigencia,  $acceso)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'discount.php') {
                $id_descuento      = parent::limpiarString($id_descuento);
                $titulo            = parent::limpiarString($titulo);
                $descuento         = parent::limpiarString($descuento);
                $vigencia          = parent::limpiarString($vigencia);
                $acceso            = parent::limpiarString($acceso);

                $result = Descuento::setDiscount($id_descuento, $titulo, $descuento, $vigencia, $acceso);

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
    public static function setImageDiscount($id_descuento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'discount.php') {
                $id_descuento  = parent::limpiarString($id_descuento);
                $descuentoDTO   = self::getDiscount($id_descuento);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_DIS . $descuentoDTO->getImagen();

                if (file_exists($dirImagen) && !empty($descuentoDTO->getImagen()) && $descuentoDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = Descuento::setImageDiscount($id_descuento, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setLogoDiscount($id_descuento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'discount.php') {
                $id_descuento  = parent::limpiarString($id_descuento);
                $descuentoDTO   = self::getDiscount($id_descuento);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_DIS_LOGO . $descuentoDTO->getLogo();

                if (file_exists($dirImagen) && !empty($descuentoDTO->getLogo()) && $descuentoDTO->getLogo() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newLogo();

                $result = Descuento::setLogoDiscount($id_descuento, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getDiscount($id_descuento)
    {
        try {
            $id_descuento = parent::limpiarString($id_descuento);

            $result = Descuento::getDiscount($id_descuento);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteDiscount($id_descuento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'discount.php') {
                $id_descuentos_pagina = parent::limpiarString($id_descuento);
                $descuentoDTO = Descuento::getDiscount($id_descuento);

                $result = Descuento::deleteDiscount($id_descuentos_pagina);
                if ($result) {
                    $text = "DELETE - DESCUENTO - " . $id_descuento . " - " . $descuentoDTO->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    header('Location:discounts?delete');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableDiscount()
    {
        try {
            $tableHtml = "";
            $modelResponse = Descuento::listDiscount();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_descuento() . '</td>';
                    $tableHtml .= '<td>' . $valor->getDescuento() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("discount", $valor->getId_descuento()) . '</td>';
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
    public static function getCardDiscount()
    {
        try {
            $html = '';
            $modelResponse = Descuento::listDiscount();
            foreach ($modelResponse as $value) {
                $html .= Elements::getCardDiscount(
                    $value->getImagen(),
                    $value->getLogo(),
                    $value->getDescuento(),
                    $value->getTitulo(),
                    $value->getVigencia(),
                    $value->getAcceso()
                );
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
