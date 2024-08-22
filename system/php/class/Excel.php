<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel
{
    public static function readExcelIncomes($rutaArchivo, $fecha_registro)
    {
        try {
            $documento      = IOFactory::load($rutaArchivo);
            $hojaActual     = $documento->getSheet(0);
            $numeroFilas    = $hojaActual->getHighestDataRow();
            $contador = 0;

            for ($row = 2; $row <= $numeroFilas; $row++) {
                $tipo_doc      = $hojaActual->getCell("A" . $row)->getValue();
                $cedula        = $hojaActual->getCell("B" . $row)->getValue();
                $puntos        = $hojaActual->getCell("C" . $row)->getValue();
                $descripcion   = $hojaActual->getCell("D" . $row)->getValue();

                if (!empty($tipo_doc) && !empty($cedula) && !empty($puntos) && !empty($descripcion)) {
                    $usuario = Usuario::getUserByCedula($cedula);
                    if($usuario){
                        $result = Punto::newPoint($puntos, $usuario->getId_usuario(), $_SESSION['id'], $descripcion, $fecha_registro);
                        if($result) $contador++;
                    }
                }
            }
            unlink($rutaArchivo);
            return $contador;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
