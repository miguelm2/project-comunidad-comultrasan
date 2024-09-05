<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioComunidad.php';

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
                $id_puntos_pagina = parent::limpiarString($id_punto);

                $result = Punto::deletePoint($id_puntos_pagina);
                if ($result) header('Location:Points?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablePoint()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'points.php') {
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
            }
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
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                $id_usuario = $_SESSION['id'];
                $total = Punto::getSumPointsByUser($id_usuario);
                return $total;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function listTablePointsUserByUser()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
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
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function loadExcelPoints()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'points.php') {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Excel.php';
                $fecha_registro = date('Y-m-d H:i:s');

                $source    = $_FILES['excelPoint']['tmp_name'];
                $filename  = $_FILES['excelPoint']['name'];
                $fileSize  = $_FILES['excelPoint']['size'];
                $dir_excel = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_EXCEL;

                if ($fileSize > 100 && $filename != '') {
                    if (!is_dir($dir_excel)) mkdir($dir_excel, 0777, true);

                    $trozo1 = explode(".", $filename);
                    $documento = 'excel_points_' . rand() . '.' . end($trozo1);
                    $target_path = $dir_excel . $documento;

                    // Mover el archivo cargado
                    if (move_uploaded_file($source, $target_path)) {
                        // Procesar el archivo Excel
                        $result = Excel::readExcelIncomes($target_path, $fecha_registro);

                        // Verificar si el archivo existe antes de eliminarlo
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
            $sql = '';
            if ($cedula != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT id_usuario FROM Usuario WHERE cedula LIKE '%%%s%%')", $cedula);
            }
            if ($nombre != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT id_usuario FROM Usuario WHERE nombre LIKE '%%%s%%')", $nombre);
            }
            if ($fecha_inicio != '') {
                $sql .= sprintf(" AND fecha_registro >= '%s'", $fecha_inicio);
            }
            if ($fecha_inicio != '') {
                $sql .= sprintf(" AND fecha_registro <= '%s'", $fecha_fin);
            }
            $comunidadDTO = Comunidad::getCommunityFilter($id_comunidad, $sql);
            $tableHtml = [];
            if ($comunidadDTO)
                $tableHtml = self::getPointsTableRowsJSON($comunidadDTO->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre());

            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByCommunityFilter($id_comunidad, $sql);
            if ($usuarioComunidadDTO) {
                foreach ($usuarioComunidadDTO as $value) {
                    $tableHtml = self::getPointsTableRowsJSON($value->getUsuarioDTO()->getId_usuario(), $comunidadDTO->getNombre());
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
    private static function getPointsTableRowsJSON($id_usuario, $nombre)
    {
        $modelResponse = Punto::listPointByUser($id_usuario);

        if (!$modelResponse) {
            return [];
        }

        $tableRows = [];
        foreach ($modelResponse as $valor) {
            if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                $tableRows[] = [
                    'Comunidad' => $nombre,
                    'Asociado' => $valor->getUsuarioDTO()->getNombre(),
                    'Actividad' => $valor->getDescripcion(),
                    'Asignación / Vencimiento' => self::getDateInWords($valor->getFecha_registro()),
                    'Estatus Actividad' => 'Completada',
                    'Corazones' => $valor->getPuntos(),
                    'Opciones' => Elements::crearBotonVer("point", $valor->getId_punto())
                ];
            } else {
                $tableRows[] = [
                    'Comunidad' => $nombre,
                    'Asociado' => $valor->getUsuarioDTO()->getNombre(),
                    'Actividad' => $valor->getDescripcion(),
                    'Asignación / Vencimiento' => self::getDateInWords($valor->getFecha_registro()),
                    'Estatus Actividad' => 'Completada',
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
}
