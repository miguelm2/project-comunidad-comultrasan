<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Referido.php';

class ServiceManager extends System
{
    public static function newReferredPage(
        $nombre_referido,
        $cedula_referido,
        $tipo_documento_referido,
        $departamento,
        $ciudad,
        $correo,
        $celular,
        $nombre_refiere,
        $tipo_documento_refiere,
        $cedula_refiere
    ) {
        try {
            $nombre_referido            = parent::limpiarString($nombre_referido);
            $cedula_referido            = parent::limpiarString($cedula_referido);
            $tipo_documento_referido    = parent::limpiarString($tipo_documento_referido);
            $departamento               = parent::limpiarString($departamento);
            $ciudad                     = parent::limpiarString($ciudad);
            $correo                     = parent::limpiarString($correo);
            $celular                    = parent::limpiarString($celular);
            $nombre_refiere             = parent::limpiarString($nombre_refiere);
            $tipo_documento_refiere     = parent::limpiarString($tipo_documento_refiere);
            $cedula_refiere             = parent::limpiarString($cedula_refiere);
            $estado                     = parent::limpiarString(1);
            $fecha_registro             = date('Y-m-d H:i:s');

            $result = Referido::newReferred(
                $nombre_referido,
                $cedula_referido,
                $tipo_documento_referido,
                $departamento,
                $ciudad,
                $correo,
                $celular,
                $nombre_refiere,
                $tipo_documento_refiere,
                $cedula_refiere,
                $estado,
                NULL,
                $fecha_registro
            );
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function newReferred(
        $nombre_referido,
        $cedula_referido,
        $tipo_documento_referido,
        $departamento,
        $ciudad,
        $correo,
        $celular
    ) {
        try {
            $nombre_referido            = parent::limpiarString($nombre_referido);
            $cedula_referido            = parent::limpiarString($cedula_referido);
            $tipo_documento_referido    = parent::limpiarString($tipo_documento_referido);
            $departamento               = parent::limpiarString($departamento);
            $ciudad                     = parent::limpiarString($ciudad);
            $correo                     = parent::limpiarString($correo);
            $celular                    = parent::limpiarString($celular);
            $estado                     = parent::limpiarString(1);
            $fecha_registro             = date('Y-m-d H:i:s');
            $id_usuario                 = $_SESSION['id'];

            $result = Referido::newReferred(
                $nombre_referido,
                $cedula_referido,
                $tipo_documento_referido,
                $departamento,
                $ciudad,
                $correo,
                $celular,
                '',
                '',
                '',
                $estado,
                $id_usuario,
                $fecha_registro
            );
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setReferred(
        $nombre_referido,
        $cedula_referido,
        $tipo_documento_referido,
        $departamento,
        $ciudad,
        $correo,
        $celular,
        $nombre_refiere,
        $tipo_documento_refiere,
        $cedula_refiere,
        $estado,
        $id_referido
    ) {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'referred.php') {
                $nombre_referido            = parent::limpiarString($nombre_referido);
                $cedula_referido            = parent::limpiarString($cedula_referido);
                $tipo_documento_referido    = parent::limpiarString($tipo_documento_referido);
                $departamento               = parent::limpiarString($departamento);
                $ciudad                     = parent::limpiarString($ciudad);
                $correo                     = parent::limpiarString($correo);
                $celular                    = parent::limpiarString($celular);
                $nombre_refiere             = parent::limpiarString($nombre_refiere);
                $tipo_documento_refiere     = parent::limpiarString($tipo_documento_refiere);
                $cedula_refiere             = parent::limpiarString($cedula_refiere);
                $estado                     = parent::limpiarString($estado);
                $id_referido                = parent::limpiarString($id_referido);

                $result = Referido::setReferred(
                    $nombre_referido,
                    $cedula_referido,
                    $tipo_documento_referido,
                    $departamento,
                    $ciudad,
                    $correo,
                    $celular,
                    $nombre_refiere,
                    $tipo_documento_refiere,
                    $cedula_refiere,
                    $estado,
                    $id_referido
                );

                if ($result) {
                    return  '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteReferred($id_referido)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'referred.php') {
                $id_referido = parent::limpiarString($id_referido);

                $result = Referido::deleteReferred($id_referido);
                if ($result) header('Location:referrals?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getReferred($id_referido)
    {
        try {
            $id_referido = parent::limpiarString($id_referido);

            $result = Referido::getReferred($id_referido);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableReferred()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'referrals.php') {
                $tableHtml = "";
                $modelResponse = Referido::listReferred();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->setCedula_referido() . '</td>';
                        $tableHtml .= '<td>' . $valor->getNombre_referido() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getCelular() . '</td>';
                        $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("referred", $valor->getId_gestor()) . '</td>';
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
    private static function getColorByEstate($estado)
    {
        try {
            switch ($estado) {
                case 0: {
                        return 'danger';
                    }
                case 1: {
                        return 'success';
                    }
                case 2: {
                        return 'warning';
                    }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
