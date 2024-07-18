<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Encuesta.php';

class ServiceSurvey extends System
{
    public static function newSurvey($nombre, $descripcion, $puntos)
    {
        try {
            $nombre         = parent::limpiarString($nombre);
            $descripcion    = parent::limpiarString($descripcion);
            $estado         = parent::limpiarString(1);
            $puntos         = parent::limpiarString($puntos);
            $fecha_registro = date('Y-m-d H:i:s');
            $imagen = self::newImagen();

            $result = Encuesta::newSurvey($nombre, $descripcion, $estado,  $puntos,$fecha_registro);

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
            if (isset($_FILES['imageSurvey']) && $_FILES['imageSurvey']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageSurvey']['tmp_name'];
                $filename   = $_FILES['imageSurvey']['name'];
                $fileSize   = $_FILES['imageSurvey']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SURVEY_QUE;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'encuesta_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setImageSurvey($id_)
    {
        try {
            $id_            = parent::limpiarString($id_);
            $EncuestaDTO    = self::getSurvey($id_);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SURVEY . $EncuestaDTO->getImagen();

            if (file_exists($dirImagen) && !empty($EncuestaDTO->getImagen()) && $EncuestaDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }

            $imagen = self::newImagen();

            $result = Descuento::setImageDiscount($id_, $imagen);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurvey($id_encuesta, $descripcion, $nombre, $estado,$puntos)
    {
        try {
            $id_encuesta  = parent::limpiarString($id_encuesta);
            $estado       = parent::limpiarString($estado);

            $result = Encuesta::setSurvey($id_encuesta,$descripcion,$nombre, $estado, $puntos);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurvey($id_)
    {
        try {
            $id_ = parent::limpiarString($id_);
            $EncuestaDTO = Encuesta::getSurvey($id_);
            return $EncuestaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteSurvey($id_)
    {
        try {
            $id_ = parent::limpiarString($id_);
            $result = Encuesta::deleteSurvey($id_);
            if ($result) {
                $_SESSION['alert'] = 1;
                header('Location:surveys?delete');
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurvey()
    {
        try {
            $tableHtml = '';
            $modelResponse = Encuesta::listSurvey();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_() . '</td>';
                    $tableHtml .= '<td>' . $valor->get() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVer("survey", $valor->getId_()) . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="4">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
