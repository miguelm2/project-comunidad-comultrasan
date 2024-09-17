<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoComunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';

class ServiceTypeComunity extends System
{
    public static function newTypeComunity($titulo, $icono, $subtitulo, $contenido)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newTypeComunity.php') {
                $titulo = parent::limpiarString($titulo);
                $icono = parent::limpiarString($icono);
                $subtitulo = parent::limpiarString($subtitulo);
                $contenido = parent::limpiarString($contenido);

                $fecha_registro = date('Y-m-d H:i:s');
                $imagen = self::newImagen();

                $result = TipoComunidad::newTypeComunity($titulo, $icono, $subtitulo, $contenido, $imagen, $fecha_registro);

                if ($result) {
                    $lastTypeCommunity = TipoComunidad::getLastTypeCommunity();
                    $text = "CREATE - GRUPO DE INTERES - " . $lastTypeCommunity->getId_tipo_comunidad() . " - " . $lastTypeCommunity->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
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
            if (isset($_FILES['imageTypeComunity']) && $_FILES['imageTypeComunity']['error'] === UPLOAD_ERR_OK) {
                $source = $_FILES['imageTypeComunity']['tmp_name'];
                $filename = $_FILES['imageTypeComunity']['name'];
                $fileSize = $_FILES['imageTypeComunity']['size'];
                $imagen = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageTypeComunity']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }
                if ($fileSize > 4000000) {
                    return Elements::crearMensajeAlerta("El archivo debe pesar menos de 4MB", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM;

                    if (!file_exists($dirImagen))
                        mkdir($dirImagen, 0777, true);

                    $dir = opendir($dirImagen);
                    $trozo1 = explode(".", $filename);
                    $imagen = 'tipo_comunidad_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
                $titulo = parent::limpiarString($titulo);
                $icono = parent::limpiarString($icono);
                $subtitulo = parent::limpiarString($subtitulo);
                $contenido = parent::limpiarString($contenido);

                $result = TipoComunidad::setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido);

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
    public static function setImageTypeComunityPage($id_tipo_comunidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
                $tipoComunidadDTO = self::getTypeComunity($id_tipo_comunidad);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM . $tipoComunidadDTO->getImagen();

                if (file_exists($dirImagen) && !empty($tipoComunidadDTO->getImagen()) && $tipoComunidadDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }
                $imagen = self::newImagen();
                $result = TipoComunidad::setImageTypeComunity($id_tipo_comunidad, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
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
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
                $tipoComunidadDTO = TipoComunidad::getTypeComunity($id_tipo_comunidad);

                $result = TipoComunidad::deleteTypeComunity($id_tipo_comunidad);
                if ($result) {
                    $text = "DELETE - GRUPO DE INTERES - " . $id_tipo_comunidad . " - " . $tipoComunidadDTO->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    header('Location:typeComunities?delete');
                }
            }
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

                    $html .= Elements::getCardGroupInterest(
                        $valor->getId_tipo_comunidad(),
                        $valor->getIcono(),
                        $valor->getTitulo(),
                        $valor->getSubtitulo()
                    );
                }
            } else {
                return '<div>No hay registros para mostrar</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception('Error en getCardGroupInterest: ' . $e->getMessage());
        }
    }
    public static function getButtonJoin($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $tipoComunidadDTO = TipoComunidad::getTypeComunityByUser($_SESSION['id']);
            $perteneceComunidad = false;

            foreach ($tipoComunidadDTO as $valor) {
                if ($valor->getId_tipo_comunidad() == $id_grupo) {
                    $perteneceComunidad = true;
                    break;
                }
            }

            if (!$perteneceComunidad) {
                return Elements::getFormJoinGroupInterest();
            }
            return '';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getButonNewForum($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);

            $tipoComunidadDTO = TipoComunidad::getTypeComunityByUser($_SESSION['id']);

            foreach ($tipoComunidadDTO as $valor) {
                if ($valor->getId_tipo_comunidad() == $id_grupo) {
                    return '<a href="newForum?comunnityForum=' . $id_grupo . '" class="btn btn-success">
                                    <i class="material-icons me-2">edit</i> Añadir nuevo tema
                                </a>';
                }
            }

            return '';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getDisabledComment($id_foro)
    {
        try {
            $foroDTO = Foro::getForum($id_foro);

            if ($foroDTO) {
                $tipoComunidadDTO = TipoComunidad::getTypeComunityByUser($_SESSION['id']);
                foreach ($tipoComunidadDTO as $valor) {
                    if ($valor->getId_tipo_comunidad() == $foroDTO->getTipoComunidadDTO()->getId_tipo_comunidad()) {
                        return '';
                    }
                }
            }

            return 'disabled';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionsGroupCommunity()
    {
        try {
            $modelResponse = TipoComunidad::listTypeComunity();
            $html = '';
            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= '<option value="' . $valor->getId_tipo_comunidad() . '">' . $valor->getTitulo() . '</option>';
                }
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
