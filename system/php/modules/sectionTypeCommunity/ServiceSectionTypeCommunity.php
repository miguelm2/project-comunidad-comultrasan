<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/SeccionTipoComunidad.php';

class ServiceSectionTypeCommunity extends System
{
    public static function newSectionTypeCommunity($id_tipo_comunidad, $nombre, $descripcion)
    {
        try {
            $id_tipo_comunidad  = parent::limpiarString($id_tipo_comunidad);
            $nombre             = parent::limpiarString($nombre);
            $descripcion        = parent::limpiarString($descripcion);
            $fecha_registro     = date('Y-m-d H:i:s');
            $imagen             = self::newImagen();

            $result = SeccionTipoComunidad::newSectionTypeCommunity($id_tipo_comunidad, $nombre, $descripcion, $imagen, $fecha_registro);

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
            if (isset($_FILES['imageSectionTypeCommunity']) && $_FILES['imageSectionTypeCommunity']['error'] === UPLOAD_ERR_OK) {
                $source   = $_FILES['imageSectionTypeCommunity']['tmp_name'];
                $filename = $_FILES['imageSectionTypeCommunity']['name'];
                $fileSize = $_FILES['imageSectionTypeCommunity']['size'];
                $imagen   = '';
                
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageSectionTypeCommunity']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SECTION;

                    if (!file_exists($dirImagen))
                        mkdir($dirImagen, 0777, true);

                    $dir = opendir($dirImagen);
                    $trozo1 = explode(".", $filename);
                    $imagen = 'section_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setSectionTypeCommunity($id_seccion, $nombre, $descripcion)
    {
        try {
            $id_seccion  = parent::limpiarString($id_seccion);
            $nombre      = parent::limpiarString($nombre);
            $descripcion = parent::limpiarString($descripcion);

            $result = SeccionTipoComunidad::setSectionTypeCommunity($id_seccion, $nombre, $descripcion);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageSectionTypeCommunity($id_seccion)
    {
        try {
            $id_seccion = parent::limpiarString($id_seccion);
            $seccionDTO = self::getSectionTypeCommunity($id_seccion);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SECTION . $seccionDTO->getImagen();

            if (file_exists($dirImagen) && !empty($seccionDTO->getImagen()) && $seccionDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }
            $imagen = self::newImagen();
            $result = SeccionTipoComunidad::setImageSectionTypeCommunity($id_seccion, $imagen);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSectionTypeCommunity($id_seccion)
    {
        try {
            $id_seccion = parent::limpiarString($id_seccion);

            $result = SeccionTipoComunidad::getSectionTypeCommunity($id_seccion);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteSectionTypeCommunity($id_seccion)
    {
        try {
            $id_seccion = parent::limpiarString($id_seccion);
            $seccionDTO = SeccionTipoComunidad::getSectionTypeCommunity($id_seccion);

            $result = SeccionTipoComunidad::deleteSectionTypeCommunity($id_seccion);
            if ($result)
                header('Location:typeComunity?typeComunity=' . $seccionDTO->getId_tipo_comunidad() . '&delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSectionTableTypeComunity($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
            $tableHtml = "";
            $modelResponse = SeccionTipoComunidad::listSectionTypeCommunityByTypeCommunity($id_tipo_comunidad);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_seccion() . '</td>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("sectionTypeCommunity", $valor->getId_seccion()) . '</td>';
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
    public static function getCardMiniSectionByTypeCommunity($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $modelResponse = SeccionTipoComunidad::listSectionTypeCommunityByTypeCommunity($id_grupo);
            $html = '';
            foreach ($modelResponse as $valor) {
                $html .= Elements::getCardMiniSection($valor->getImagen(), $valor->getNombre());
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardSectionByTypeCommunity($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $modelResponse = SeccionTipoComunidad::listSectionTypeCommunityByTypeCommunity($id_grupo);
            $html = '';
            foreach ($modelResponse as $valor) {
                $html .= Elements::getCardSection($valor->getNombre(), $valor->getDescripcion(), $valor->getImagen());
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
