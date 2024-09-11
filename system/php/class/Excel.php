<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/PhpSpreadsheet/vendor/autoload.php';

class Excel
{
    public static function readCSVIncomes($rutaArchivo, $fecha_registro)
    {
        try {
            $file = fopen($rutaArchivo, 'r');
            $contador = 0;

            // Omitir la primera fila (cabecera)
            fgetcsv($file);

            // Leer cada fila del archivo CSV
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $tipo_doc    = $data[0];
                $cedula      = $data[1];
                $puntos      = $data[2];
                $descripcion = $data[3];

                if (!empty($tipo_doc) && !empty($cedula) && !empty($puntos) && !empty($descripcion)) {
                    $usuario = Usuario::getUserByCedula($cedula);
                    if ($usuario) {
                        $result = Punto::newPoint($puntos, $usuario->getId_usuario(), $_SESSION['id'], $descripcion, $fecha_registro);
                        if ($result) $contador++;
                    }
                }
            }

            fclose($file);
            unlink($rutaArchivo);
            return $contador;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
