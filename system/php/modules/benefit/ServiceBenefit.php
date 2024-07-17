<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Beneficio.php';

class ServiceBenefit extends System
{
    public static function newBenefit($titulo, $descripcion, $puntos)
    {
        try {
            $titulo         = parent::limpiarString($titulo);
            $descripcion    = parent::limpiarString($descripcion);
            $puntos         = parent::limpiarString($puntos);
            $fecha_registro = date('Y-m-d H:i:s');
            $imagen         = self::newImagen();

            $result = Beneficio::newBenefit($titulo, $descripcion, $puntos, $imagen, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
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
    public static function setBenefit($id_beneficio, $titulo, $descripcion,  $puntos)
    {
        try {
            $id_beneficio      = parent::limpiarString($id_beneficio);
            $titulo            = parent::limpiarString($titulo);
            $descripcion       = parent::limpiarString($descripcion);
            $puntos            = parent::limpiarString($puntos);

            $result = Beneficio::setBenefit($id_beneficio, $titulo, $descripcion, $puntos);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageBenefit($id_beneficio)
    {
        try {
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
            $id_beneficios_pagina = parent::limpiarString($id_beneficio);

            $result = Beneficio::deleteBenefit($id_beneficios_pagina);
            if ($result) header('Location:benefits?delete');
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
                    $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("Benefit", $valor->getId_beneficio()) . '</td>';
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
}
