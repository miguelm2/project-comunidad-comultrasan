<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Informacion.php';

class ServicePage extends System
{
    static function Login($cedula, $pass)
    {
        $cedula = parent::limpiarString($cedula);
        $pass = parent::limpiarString($pass);
        $pass_hash = parent::hash($pass);
        return parent::login($cedula, $pass_hash);
    }

    static function Recovery($cedula)
    {
        $cedula = parent::limpiarString($cedula);
        if (parent::recovery($cedula)) return  '<script>swal("' . Constants::$PAGE_RECUPERAR_PASS2 . '", "", "success");</script>';
        return  '<script>swal("' . Constants::$PAGE_RECUPERAR_PASS_CEDULA . '", "", "warning");</script>';
    }

    public static function getInformation()
    {
        try {
            $result = Informacion::getInformacion();
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getVisitas()
    {
        try {
            $ip = parent::getIP();
            $session_id = session_id();
            $fecha_registro = date('Y-m-d H:i:s');

            $mismaVisita = NumeroVistas::getVistasIp($ip, $session_id);

            if ($mismaVisita == 0) {
                NumeroVistas::insertNuevaVista($ip, $session_id, $fecha_registro);
            } else {
                $fecha_registro = NumeroVistas::getFechaVistas($ip, $session_id);

                $fecha_actual = date('Y-m-d H:i:s');
                $nueva_fecha = strtotime($fecha_registro . '+ 1 hour');
                $nueva_fecha = date('Y-m-d H:i:s', $nueva_fecha);

                $fecha_nuevo_registro = date('Y-m-d H:i:s');

                if ($fecha_actual >= $nueva_fecha) {
                    NumeroVistas::insertNuevaVista($ip, $session_id, $fecha_nuevo_registro);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function sendEmail($destino, $asunto, $mensaje)
    {
        try {
            $destino = parent::limpiarString($destino);
            $asunto = parent::limpiarString($asunto);
            $mensaje = parent::limpiarString($mensaje);

            if (parent::enviarCorreos($destino, $asunto, $mensaje)) {
                return  '<script>swal("' . Constants::$EMAIL_NEW . '", "", "success");</script>';
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getURL()
    {
        if (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'benefits_page.php') {
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
            $host = $_SERVER['HTTP_HOST'];
            $url = $protocol . "://" . $host;
            return $url;
        }
    }
    public static function getHtmlLogout()
    {
        if (basename($_SERVER['PHP_SELF']) == 'index.php' && $_SESSION['usuario'] == 'Gestor') {
            return [
                'modal' =>
                '<form method="POST">
                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Salir del sistema</h5>
                                    <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Esta seguro que desea salir del sistema?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons opacity-10">close</i> Cerrar</button>
                                    <button type="submiT" name="logout" class="btn btn-danger"><i class="material-icons opacity-10">logout</i> Salir del sistema</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>'
            ];
        } else {
            return ['modal' => ''];
        }
    }
    public static function getLocationBySession()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $currentUrl = $protocol . "://" . $host . $_SERVER['REQUEST_URI'];

        $baseUrl = $protocol . "://" . $host . "/"; 
        $adminUrl = $protocol . "://" . $host . "/system/views/admin";
        $userUrl = $protocol . "://" . $host . "/system/views/user";
        $managerUrl = $protocol . "://" . $host . "/system/views/manager";

        if (($currentUrl === $baseUrl || $currentUrl === rtrim($baseUrl, '/')) && isset($_SESSION['id']) && isset($_SESSION['tipo'])) {
            switch ($_SESSION['tipo']) {
                case 0:
                case 5:
                    header("Location: " . $adminUrl);
                    exit;
                case 1:
                    header("Location: " . $userUrl);
                    exit;
                case 2:
                    header("Location: " . $managerUrl);
                    exit;
            }
        }
    }
    public static function getHtmlLogin()
    {
        return '<a href="/system/views/page/login" class="btn btn-outline-dark text-dark btn1 p-1 m-3">Ingresar</a>';
    }

    //ALERTAS ----------------------------------------------------------------------------------

    static function getAlertaNuevo()
    {
        return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
    }

    static function getAlertaEliminar()
    {
        return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
    }
    static function getAlertaWin($puntos)
    {
        return Elements::crearMensajeAlerta2($puntos);
    }
}
