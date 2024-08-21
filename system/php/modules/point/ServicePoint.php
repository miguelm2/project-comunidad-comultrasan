<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServicePoint extends System
{
    public static function newPoint($puntos, $id_usuario, $id_administrador, $descripcion)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'points.php') {
                $puntos         = parent::limpiarString($puntos);
                $id_usuario    = parent::limpiarString($id_usuario);
                $fecha_registro = date('Y-m-d H:i:s');
                $id_administrador = parent::limpiarString($id_administrador);
                $descripcion = parent::limpiarString($descripcion);

                $result = Punto::newPoint($puntos, $id_usuario, $id_administrador, $descripcion, $fecha_registro);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
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
                        $tableHtml .= '<td>' . $valor->getId_punto() . '</td>';
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

                $source         = $_FILES['excelPoint']['tmp_name'];
                $filename       = $_FILES['excelPoint']['name'];
                $fileSize       = $_FILES['excelPoint']['size'];
                $dir_excel      = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_EXCEL;

                if ($fileSize > 100 & $filename != '') {
                    if (!file_exists($dir_excel)) mkdir($dir_excel, 0777, true);

                    $dir       = opendir($dir_excel); //Abrimos el directorio de destino
                    $trozo1    = explode(".", $filename);
                    $documento = 'excel_points_' . rand() . '.' . end($trozo1);
                    $target_path    = $dir_excel . $documento; //Indicamos la ruta de destino, así como el nombre del archivo
                    move_uploaded_file($source, $target_path);
                    closedir($dir);
                    $result = Excel::readExcelIncomes($target_path, $fecha_registro);
                    unlink($target_path);
                    if ($result) {
                        return Elements::crearMensajeAlerta('Se han cargado' . $result . ' registros exitosamente', 'success');
                    }
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
