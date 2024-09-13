<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioComunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Administrador.php';

class ServicePoint extends System
{
    public static function newPoint($puntos, $id_usuario, $id_administrador, $descripcion)
    {
        try {
            $puntos         = parent::limpiarString($puntos);
            $id_usuario    = parent::limpiarString($id_usuario);
            $fecha_registro = date('Y-m-d H:i:s');
            $id_administrador = parent::limpiarString($id_administrador);
            $descripcion = parent::limpiarString($descripcion);

            $result = Punto::newPoint($puntos, $id_usuario, $id_administrador, $descripcion, $fecha_registro);

            if ($result) {
                $usuarioDTO = Usuario::getUserById($id_usuario);
                $lastPoint = Punto::getLastPointByUser($id_usuario);
                $administradorDTO = Administrador::getAdministradorById($id_administrador);
                $text = "CREATE - PUNTOS - " . $lastPoint->getId_punto() . " - " . $lastPoint->getDescripcion() . " ----> " . $id_administrador . " - " . $administradorDTO->getNombre();
                Log::setLog($text);
                $correo = $usuarioDTO->getCorreo();
                $asunto = 'Notificación de nuevos puntos acreditados en tu cuenta';
                $mensaje = 'Estimado/a ' . $usuarioDTO->getNombre() . ',
                            Nos complace informarte que hemos acreditado nuevos puntos en tu 
                            cuenta como parte de tu participación en nuestras actividades y comunidad. 
                            Estos puntos ya están disponibles y podrás visualizarlos ingresando a tu perfil en nuestra plataforma.<br><br>
                            Te invitamos a seguir participando para acumular más puntos y disfrutar de los beneficios que ofrecemos.<br><br>
                            Si tienes alguna consulta o necesitas más información, no dudes en contactarnos.<br><br>
                            Atentamente, Financiera Comultrasan';
                Mail::sendEmail($asunto, $mensaje, $correo);
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPoint($id_punto,  $puntos, $descripcion)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'point.php') {
                $id_punto      = parent::limpiarString($id_punto);
                $puntos        = parent::limpiarString($puntos);
                $descripcion   = parent::limpiarString($descripcion);

                $result = Punto::setPoint($id_punto, $puntos, $descripcion);

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
    public static function getPoint($id_punto)
    {
        try {
            $id_punto = parent::limpiarString($id_punto);

            $result = Punto::getPoint($id_punto);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deletePoint($id_punto)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'point.php') {
                $id_punto = parent::limpiarString($id_punto);
                $puntoDTO = Punto::getPoint($id_punto);

                $result = Punto::deletePoint($id_punto);
                if ($result) {
                    $text = "DELETE - PUNTOS - " . $id_punto . " - " . $puntoDTO->getDescripcion() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    header('Location:Points?delete');
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablePoint()
    {
        try {
            $tableHtml = "";
            $modelResponse = Punto::listPoint();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_punto() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getAdministradorDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td class="text-wrap">' . $valor->getDescripcion() . '</td>';
                    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                        $tableHtml .= '<td>' . Elements::crearBotonVer("point", $valor->getId_punto()) . '</td>';
                    }
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablePointByUser($id_usuario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $tableHtml = "";
                $id_usuario = parent::limpiarString($id_usuario);
                $modelResponse = Punto::listPointByUser($id_usuario);
                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_punto() . '</td>';
                        $tableHtml .= '<td>' . $valor->getAdministradorDTO()->getNombre() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                        $tableHtml .= '<td class="text-wrap">' . $valor->getDescripcion() . '</td>';
                        if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                            $tableHtml .= '<td>' . Elements::crearBotonVer("point", $valor->getId_punto()) . '</td>';
                        }
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getPointsByUser()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $total = Punto::getSumPointsByUser($id_usuario);
            return $total;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listTablePointsUserByUser()
    {
        try {
            $tableHtml = "";
            $id_usuario = $_SESSION['id'];
            $modelResponse = Punto::listPointByUser($id_usuario);
            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getAdministradorDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                    $tableHtml .= '<td class="text-wrap">' . $valor->getDescripcion() . '</td>';
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
    public static function loadCSVPoints()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'points.php') {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Excel.php';
                $fecha_registro = date('Y-m-d H:i:s');

                $source    = $_FILES['csvPoint']['tmp_name'];
                $filename  = $_FILES['csvPoint']['name'];
                $fileSize  = $_FILES['csvPoint']['size'];
                $dir_csv   = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_EXCEL;

                $allowedExtension = 'csv';
                $fileName = $_FILES['file']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                if ($fileExtension !== $allowedExtension) {
                    return Elements::crearMensajeAlerta("Por favor, sube solo archivos con el formato CSV", "error");
                }
                if ($fileSize > 8000000) {
                    return Elements::crearMensajeAlerta("El archivo debe pesar menos de 8MB", "error");
                }

                if ($fileSize > 100 && $filename != '') {
                    if (!is_dir($dir_csv)) mkdir($dir_csv, 0777, true);

                    $trozo1 = explode(".", $filename);
                    $documento = 'csv_points_' . rand() . '.' . end($trozo1);
                    $target_path = $dir_csv . $documento;

                    if (move_uploaded_file($source, $target_path)) {
                        $result = Excel::readCSVIncomes($target_path, $fecha_registro);

                        if (file_exists($target_path)) {
                            unlink($target_path);
                        }

                        if ($result) {
                            return Elements::crearMensajeAlerta('Se han cargado ' . $result . ' registros exitosamente', 'success');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function listTablePointsUserByManager($id_comunidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'community.php') {
                $id_comunidad = parent::limpiarString($id_comunidad);
                $comunidadDTO = Comunidad::getCommunity($id_comunidad);
                $tableHtml = "";

                $tableHtml .= self::getPointsTableRows($comunidadDTO->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre());

                $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByCommunity($id_comunidad);
                if ($usuarioComunidadDTO) {
                    foreach ($usuarioComunidadDTO as $value) {
                        $tableHtml .= self::getPointsTableRows($value->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre());
                    }
                }

                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listTablePointsUserByManagerFilter($id_comunidad, $cedula, $nombre, $fecha_inicio, $fecha_fin)
    {
        try {
            $nombre       = parent::limpiarString($nombre);
            $id_comunidad = parent::limpiarString($id_comunidad);
            $cedula       = parent::limpiarString($cedula);
            $fecha_inicio = parent::limpiarString($fecha_inicio);
            $fecha_fin    = parent::limpiarString($fecha_fin);

            $sql = $sql1 = '';
            if ($cedula != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT id_usuario FROM Usuario WHERE cedula LIKE '%%%s%%')", $cedula);
            }
            if ($nombre != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT id_usuario FROM Usuario WHERE nombre LIKE '%%%s%%')", $nombre);
            }
            if ($fecha_inicio != '') {
                $sql1 .= sprintf(" AND CONVERT(DATE, fecha_registro) >= '%s'", $fecha_inicio);
            }
            if ($fecha_fin != '') {
                $sql1 .= sprintf(" AND CONVERT(DATE, fecha_registro) <= '%s'", $fecha_fin);
            }
            $comunidadDTO = Comunidad::getCommunityFilter($id_comunidad, $sql);

            $tableHtml = [];
            if ($comunidadDTO)
                $tableHtml = self::getPointsTableRowsJSON($comunidadDTO->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre(), $sql1);

            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByCommunityFilter($id_comunidad, $sql);
            if ($usuarioComunidadDTO) {
                foreach ($usuarioComunidadDTO as $value) {
                    $tableHtml = self::getPointsTableRowsJSON($value->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre(), $sql1);
                }
            }

            return json_encode($tableHtml);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getPointsTableRows($id_usuario, $nombre)
    {
        $modelResponse = Punto::listPointByUser($id_usuario);

        if (!$modelResponse) {
            return '';
        }

        // Construir las filas de la tabla
        $tableRows = '';
        foreach ($modelResponse as $valor) {
            $tableRows .= '<tr>';
            $tableRows .= '<td>' . $nombre . '</td>';
            $tableRows .= '<td>' . $valor->getUsuarioDTO()->getCedula() . '</td>';
            $tableRows .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
            $tableRows .= '<td class="text-wrap">' . $valor->getDescripcion() . '</td>';
            $tableRows .= '<td class="text-wrap">' . self::getDateInWords($valor->getFecha_registro()) . '</td>';
            $tableRows .= '<td>Completada</td>';
            $tableRows .= '<td class="text-center">' . $valor->getPuntos() . '</td>';
            if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                $tableRows .= '<td>' . Elements::crearBotonVer("point", $valor->getId_punto()) . '</td>';
            }
            $tableRows .= '</tr>';
        }

        return $tableRows;
    }
    private static function getPointsTableRowsJSON($id_usuario, $nombre, $filtro)
    {
        $modelResponse = Punto::listPointByUserFilter($id_usuario, $filtro);

        $tableRows = [];
        foreach ($modelResponse as $valor) {
            if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                $tableRows[] = [
                    'Comunidad' => $nombre,
                    'Documenro' => $valor->getUsuarioDTO()->getCedula(),
                    'Asociado' => $valor->getUsuarioDTO()->getNombre(),
                    'Actividad' => $valor->getDescripcion(),
                    'AsignacionVencimiento' => self::getDateInWords($valor->getFecha_registro()),
                    'EstatusActividad' => 'Completada',
                    'Corazones' => $valor->getPuntos(),
                    'Opciones' => Elements::crearBotonVer("point", $valor->getId_punto())
                ];
            } else {
                $tableRows[] = [
                    'Comunidad' => $nombre,
                    'Documenro' => $valor->getUsuarioDTO()->getCedula(),
                    'Asociado' => $valor->getUsuarioDTO()->getNombre(),
                    'Actividad' => $valor->getDescripcion(),
                    'AsignacionVencimiento' => self::getDateInWords($valor->getFecha_registro()),
                    'EstatusActividad' => 'Completada',
                    'Corazones' => $valor->getPuntos()
                ];
            }
        }

        return $tableRows;
    }

    private static function getDateInWords($fecha_bd)
    {
        $fecha = new DateTime($fecha_bd);
        $fecha_formateada = $fecha->format('F d \d\e\l Y');
        $fecha->modify('+1 year');
        $fecha_formateada_mas_un_ano = $fecha->format('F d \d\e\l Y');
        $meses = array(
            'January' => 'Enero',
            'February' => 'Febrero',
            'March' => 'Marzo',
            'April' => 'Abril',
            'May' => 'Mayo',
            'June' => 'Junio',
            'July' => 'Julio',
            'August' => 'Agosto',
            'September' => 'Septiembre',
            'October' => 'Octubre',
            'November' => 'Noviembre',
            'December' => 'Diciembre'
        );

        $fecha_formateada = str_replace(array_keys($meses), array_values($meses), $fecha_formateada);
        $fecha_formateada_mas_un_ano = str_replace(array_keys($meses), array_values($meses), $fecha_formateada_mas_un_ano);

        return $fecha_formateada . "/" . $fecha_formateada_mas_un_ano;
    }
    public static function getPointsUserByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            return Punto::getSumPointsByUser($id_usuario);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function descargarPlantilla($name)
    {
        $archivo = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_EXCEL . $name;

        if (file_exists($archivo)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $name . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($archivo));
            readfile($archivo);
            exit;
        } else {
            return Elements::crearMensajeAlerta(Constants::$FORM_POINTS, "error");
        }
    }
}
