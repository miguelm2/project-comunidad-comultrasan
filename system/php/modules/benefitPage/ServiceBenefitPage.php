<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/BeneficioPagina.php';

class ServiceBenefitPage extends System
{
    public static function newBenefitPage($titulo, $subtitulo, $contenido, $requisitos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newBenefitPage.php') {
                $titulo     = parent::limpiarString($titulo);
                $subtitulo  = parent::limpiarString($subtitulo);
                $contenido  = parent::limpiarString($contenido);
                $requisitos = parent::limpiarString($requisitos);

                $fecha_registro = date('Y-m-d H:i:s');
                $imagen = self::newImagen();

                $result = BeneficioPagina::newBenefitPage($titulo, $subtitulo, $contenido, $requisitos, $imagen, $fecha_registro);

                if ($result) {
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
            if (isset($_FILES['imageBenefitPage']) && $_FILES['imageBenefitPage']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageBenefitPage']['tmp_name'];
                $filename   = $_FILES['imageBenefitPage']['name'];
                $fileSize   = $_FILES['imageBenefitPage']['size'];
                $imagen     = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageBenefitPage']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BENE_PAGE;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'beneficio_pagina_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setBenefitPage($id_beneficios_pagina, $titulo, $subtitulo, $contenido, $requisitos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefitPage.php') {
                $id_beneficios_pagina   = parent::limpiarString($id_beneficios_pagina);
                $titulo                 = parent::limpiarString($titulo);
                $subtitulo              = parent::limpiarString($subtitulo);
                $contenido              = parent::limpiarString($contenido);
                $requisitos             = parent::limpiarString($requisitos);

                $result = BeneficioPagina::setBenefitPage($id_beneficios_pagina, $titulo, $subtitulo, $contenido, $requisitos);

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
    public static function setImageBenefitPage($id_beneficios_pagina)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefitPage.php') {
                $id_beneficios_pagina  = parent::limpiarString($id_beneficios_pagina);
                $beneficioPaginaDTO     = self::getBenefitPage($id_beneficios_pagina);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_BENE_PAGE . $beneficioPaginaDTO->getImagen();

                if (file_exists($dirImagen) && !empty($beneficioPaginaDTO->getImagen()) && $beneficioPaginaDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = BeneficioPagina::setImageBenefitPage($id_beneficios_pagina, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getBenefitPage($id_beneficios_pagina)
    {
        try {
            $id_beneficios_pagina = parent::limpiarString($id_beneficios_pagina);

            $result = BeneficioPagina::getBenefitPage($id_beneficios_pagina);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteBenefitPage($id_beneficios_pagina)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefitPage.php') {
                $id_beneficios_pagina = parent::limpiarString($id_beneficios_pagina);

                $result = BeneficioPagina::deleteBenefitPage($id_beneficios_pagina);
            }
            if ($result) header('Location:benefitsPage?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableBenefitPage()
    {
        try {
            $tableHtml = "";
            $modelResponse = BeneficioPagina::listBenefitPage();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_beneficios_pagina() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("benefitPage", $valor->getId_beneficios_pagina()) . '</td>';
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
    public static function getCardBenefitsPage()
    {
        try {
            $html = "";
            $modelResponse = BeneficioPagina::listBenefitPage();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getCardBenefit(
                        $valor->getId_beneficios_pagina(),
                        $valor->getImagen(),
                        $valor->getTitulo(),
                        $valor->getSubtitulo()
                    );
                }
            } else {
                return '<div>No hay registros para mostrar</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
