<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/CalendarioEvento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';

class ServiceEventCalendar extends System
{
    public static function newEventCalendar($titulo, $fecha, $lugar, $hora, $id_grupo, $persona_cargo)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newEventCalendar.php') {
                $titulo         = parent::limpiarString($titulo);
                $fecha          = parent::limpiarString($fecha);
                $lugar          = parent::limpiarString($lugar);
                $hora           = parent::limpiarString($hora);
                $id_grupo       = parent::limpiarString($id_grupo);
                $persona_cargo  = parent::limpiarString($persona_cargo);

                $fecha_registro = date('Y-m-d H:i:s');
                $imagen         = self::newImagen();

                $result = CalendarioEvento::newEventCalendar($titulo, $fecha, $lugar, $hora, $imagen, $id_grupo, $persona_cargo, $fecha_registro);

                if ($result) {
                    $lastEventCalendar = CalendarioEvento::getLastEventCalendar();
                    $text = "CREATE - EVENTO CALENDARIO - " . $lastEventCalendar->getId_evento() . " - " . $lastEventCalendar->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
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
            if (isset($_FILES['imageEventCalendar']) && $_FILES['imageEventCalendar']['error'] === UPLOAD_ERR_OK) {
                $source     = $_FILES['imageEventCalendar']['tmp_name'];
                $filename   = $_FILES['imageEventCalendar']['name'];
                $fileSize   = $_FILES['imageEventCalendar']['size'];
                $imagen     = '';

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $fileType = $_FILES['imageEventCalendar']['type'];

                if (!in_array($fileType, $allowedTypes)) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos de imagen (JPEG, PNG, GIF, JPG)", "error");
                }
                if ($fileSize > 4000000) {
                    return Elements::crearMensajeAlerta("El archivo debe pesar menos de 4MB", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_EVENT_CALE;

                    if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

                    $dir         = opendir($dirImagen);
                    $trozo1      = explode(".", $filename);
                    $imagen      = 'CalendarioEvento_img_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
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
    public static function setEventCalendar($id_evento, $titulo, $fecha, $lugar, $hora)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'eventCalendar.php') {
                $id_evento         = parent::limpiarString($id_evento);
                $titulo            = parent::limpiarString($titulo);
                $fecha             = parent::limpiarString($fecha);
                $lugar             = parent::limpiarString($lugar);
                $hora              = parent::limpiarString($hora);

                $result = CalendarioEvento::setEventCalendar($id_evento, $titulo, $fecha, $lugar, $hora);

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
    public static function setImageEventCalendar($id_evento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'eventCalendar.php') {
                $id_evento  = parent::limpiarString($id_evento);
                $CalendarioEventoDTO   = self::getEventCalendar($id_evento);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_EVENT_CALE . $CalendarioEventoDTO->getImagen();

                if (file_exists($dirImagen) && !empty($CalendarioEventoDTO->getImagen()) && $CalendarioEventoDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }

                $imagen = self::newImagen();

                $result = CalendarioEvento::setImageEventCalendar($id_evento, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getEventCalendar($id_evento)
    {
        try {
            $id_evento = parent::limpiarString($id_evento);

            $result = CalendarioEvento::getEventCalendar($id_evento);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteEventCalendar($id_evento)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'eventCalendar.php') {
                $id_evento = parent::limpiarString($id_evento);
                $calendarioEventoDTO = CalendarioEvento::getEventCalendar($id_evento);
                $result = CalendarioEvento::deleteEventCalendar($id_evento);
                if ($result) {
                    $text = "DELETE - EVENTO CALENDARIO - " . $id_evento . " - " . $calendarioEventoDTO->getTitulo() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    header('Location:eventCalendars?delete');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableEventCalendar()
    {
        try {
            $tableHtml = "";
            $modelResponse = CalendarioEvento::listAllEventCalendar();

            if (($modelResponse)) {
                foreach ($modelResponse as $valor) {
                    $tipoComunidad = TipoComunidad::getTypeComunity($valor->getId_grupo());
                    $grupoInteres = ($tipoComunidad) ? $tipoComunidad->getTitulo() : 'General';
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_evento() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha() . '</td>';
                    $tableHtml .= '<td>' . $grupoInteres . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("eventCalendar", $valor->getId_evento()) . '</td>';
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
    public static function getCardEventCalendar()
    {
        try {
            $modelResponse = CalendarioEvento::listEventCalendar();
            $html = '';
            foreach ($modelResponse as $value) {
                $html .= Elements::getCardCalendarEvent($value->getImagen(), $value->getTitulo(), $value->getFecha(), $value->getLugar(), $value->getHora());
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardsEventsCalendarByGroup($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $modelResponse = CalendarioEvento::listEventCalendarByGroupInterest($id_grupo);
            $html = '';
            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $fecha = self::getDateInWords($valor->getFecha());
                    $html .= Elements::getCardsEventsByGroup(
                        $fecha,
                        $valor->getTitulo(),
                        $valor->getPersona_cargo(),
                        $valor->getLugar()
                    );
                }
            } else {
                $html .= '<div>No hay eventos disponibles en este momento</div>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getDateInWords($fechaBD)
    {
        $fechaBD = new DateTime($fechaBD);

        $dia = $fechaBD->format('j');
        $mes = Elements::mes((int)$fechaBD->format('n'));
        $fechaEnPalabras = "$mes $dia";
        return $fechaEnPalabras;
    }
}
