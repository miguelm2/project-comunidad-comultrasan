<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoComunidad.php';

class ServiceTypeComunity extends System
{
    public static function newTypeComunity($titulo, $icono, $subtitulo, $contenido)
    {
        try {
            $titulo     = parent::limpiarString($titulo);
            $icono      = parent::limpiarString($icono);
            $subtitulo  = parent::limpiarString($subtitulo);
            $contenido  = parent::limpiarString($contenido);

            $fecha_registro = date('Y-m-d H:i:s');
            $imagen = self::newImagen();

            $result = TipoComunidad::newTypeComunity($titulo, $icono, $subtitulo, $contenido, $imagen, $fecha_registro);

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
            if (isset($_FILES['imageTypeComunity']) && $_FILES['imageTypeComunity']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageTypeComunity']['tmp_name'];
                $filename   = $_FILES['imageTypeComunity']['name'];
                $fileSize   = $_FILES['imageTypeComunity']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'tipo_comunidad_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setTypeComunity($id_tipo_comunidad, $titulo, $icono,  $subtitulo, $contenido)
    {
        try {
            $id_tipo_comunidad      = parent::limpiarString($id_tipo_comunidad);
            $titulo                 = parent::limpiarString($titulo);
            $icono                  = parent::limpiarString($icono);
            $subtitulo              = parent::limpiarString($subtitulo);
            $contenido              = parent::limpiarString($contenido);

            $result = TipoComunidad::setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageTypeComunityPage($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad  = parent::limpiarString($id_tipo_comunidad);
            $tipoComunidadDTO   = self::getTypeComunity($id_tipo_comunidad);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM . $tipoComunidadDTO->getImagen();

            if (file_exists($dirImagen) && !empty($tipoComunidadDTO->getImagen()) && $tipoComunidadDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }

            $imagen = self::newImagen();

            $result = TipoComunidad::setImageTypeComunity($id_tipo_comunidad, $imagen);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTypeComunity($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);

            $result = TipoComunidad::getTypeComunity($id_tipo_comunidad);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteTypeComunity($id_tipo_comunidad)
    {
        try {
            $id_beneficios_pagina = parent::limpiarString($id_tipo_comunidad);

            $result = TipoComunidad::deleteTypeComunity($id_beneficios_pagina);
            if ($result) header('Location:typeComunities?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableTypeComunity()
    {
        try {
            $tableHtml = "";
            $modelResponse = TipoComunidad::listTypeComunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_tipo_comunidad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getIcono() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("typeComunity", $valor->getId_tipo_comunidad()) . '</td>';
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
    public static function getCardTypeComunity()
    {
        try {
            $html = "";
            $modelResponse = TipoComunidad::listTypeComunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getCardTypeComunity($valor->getId_tipo_comunidad(), $valor->getIcono(), $valor->getTitulo(), $valor->getSubtitulo());
                }
            } else {
                return '<div>No hay registros para mostrar</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardGroupInterest()
    {
        try {
            $html = "";
            $modelResponse = TipoComunidad::listTypeComunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getCardGroupInterest($valor->getId_tipo_comunidad(), $valor->getIcono(), $valor->getTitulo(), $valor->getSubtitulo());
                }
            } else {
                return '<div>No hay registros para mostrar</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardGroupInterestIndex()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $modelResponse = TipoComunidad::getTypeComunityByUser($id_usuario);
            $html = '';
            foreach ($modelResponse as $valor) {
                $html .= Elements::getCardsGroupInterestIndexByUser(
                    $valor->getTitulo(),
                    $valor->getSubtitulo(),
                    $valor->getIcono()
                );
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
