<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/PreguntaEncuesta.php';

class ServiceSurveyQuestion extends System
{
    public static function newSurveyQuestion($id_encuesta, $pregunta)
    {
        try {
            $id_encuesta    = parent::limpiarString($id_encuesta);
            $pregunta       = parent::limpiarString($pregunta);
            $estado         = parent::limpiarString(1);
            $fecha_registro = date('Y-m-d H:i:s');
            $imagen = self::newImagen();

            $result = PreguntaEncuesta::newSurveyQuestion($id_encuesta, $pregunta, $estado, $imagen, $fecha_registro);

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
            if (isset($_FILES['imageSurveyQuestion']) && $_FILES['imageSurveyQuestion']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageSurveyQuestion']['tmp_name'];
                $filename   = $_FILES['imageSurveyQuestion']['name'];
                $fileSize   = $_FILES['imageSurveyQuestion']['size'];
                $imagen     = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SURVEY_QUE;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'pregunta_encuesta_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setImageSurveyQuestion($id_pregunta)
    {
        try {
            $id_pregunta            = parent::limpiarString($id_pregunta);
            $preguntaEncuestaDTO    = self::getSurveyQuestion($id_pregunta);

            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_SURVEY . $preguntaEncuestaDTO->getImagen();

            if (file_exists($dirImagen) && !empty($preguntaEncuestaDTO->getImagen()) && $preguntaEncuestaDTO->getImagen() != "default.png") {
                unlink($dirImagen);
            }

            $imagen = self::newImagen();

            $result = PreguntaEncuesta::setImageSurveyQuestion($id_pregunta, $imagen);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setSurveyQuestion($id_pregunta, $pregunta, $estado)
    {
        try {
            $id_pregunta  = parent::limpiarString($id_pregunta);
            $pregunta     = parent::limpiarString($pregunta);
            $estado       = parent::limpiarString($estado);

            $result = PreguntaEncuesta::setSurveyQuestion($id_pregunta, $pregunta, $estado);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getSurveyQuestion($id_pregunta)
    {
        try {
            $id_pregunta = parent::limpiarString($id_pregunta);
            $preguntaEncuestaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
            return $preguntaEncuestaDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteSurveyQuestion($id_pregunta)
    {
        try {
            $id_pregunta = parent::limpiarString($id_pregunta);
            $preguntaDTO = PreguntaEncuesta::getSurveyQuestion($id_pregunta);
            $result = PreguntaEncuesta::deleteSurveyQuestion($id_pregunta);
            if ($result) {
                $_SESSION['alert'] = 1;
                header('Location:survey?survey=' . $preguntaDTO->getEncuestaDTO()->getId_encuesta() . '&delete');
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableSurveyQuestion($id_encuesta)
    {
        try {
            $id_encuesta = parent::limpiarString($id_encuesta);
            $tableHtml = '';
            $modelResponse = PreguntaEncuesta::listSurveyQuestionBySurvey($id_encuesta);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_pregunta() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPregunta() . '</td>';
                    $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                    $tableHtml .= '<td align="center">' . Elements::crearBotonVerTwoLink("surveyQuestion", $valor->getId_pregunta(), "survey", $valor->getEncuestaDTO()->getId_encuesta()) . '</td>';
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
