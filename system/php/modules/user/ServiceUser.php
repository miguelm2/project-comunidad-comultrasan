<?php

use PhpOffice\PhpSpreadsheet\Writer\Ods\Content;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HistorialInformacion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Referido.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoComunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/ActividadUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Invitacion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Log.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/client/clientComultrasan.php';

class ServiceUser extends System
{
    public static function newUser(
        $nombre,
        $correo,
        $cedula,
        $pass,
        $tipo_documento
    ) {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'singup.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $cedula = parent::limpiarString($cedula);
                $pass = parent::limpiarString($pass);
                $pass_hash = parent::hash($pass);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $tipo = 1;
                $fecha_registro = date('Y-m-d H:i:s');

                $imagen = "default.png";
                if ($_SESSION['usuario'] != "Administrador") {
                    $estado = self::getUserByAPI($cedula);
                } else {
                    $estado = 1;
                }
                $result = Usuario::newUser(
                    $nombre,
                    $correo,
                    $cedula,
                    $pass_hash,
                    $estado,
                    $tipo,
                    $imagen,
                    $tipo_documento,
                    $fecha_registro
                );

                // Si existe una invitación, gestionar unión a la comunidad
                if ($invitacionDTO = Invitacion::getInvitationByCedula($cedula)) {
                    $usuarioDTO = Usuario::getUserByCedula($cedula);
                    $referidoDTO = Referido::getReferredByCedula($cedula);
                    $comunidadDTO = Comunidad::getCommunityByUser($referidoDTO->getId_usuario());
                    ActividadUsuario::newActivityUser($referidoDTO->getId_usuario(), 5, $fecha_registro);

                    $result = UsuarioComunidad::newUserCommunity($usuarioDTO->getId_usuario(), $comunidadDTO->getId_comunidad(), 1, $fecha_registro);
                    self::enviarCorreoUnionComunidad($usuarioDTO, $correo);
                }

                if ($result && isset($_SESSION['id'])) {
                    $lastUsuario = Usuario::lastUsuario();
                    $text = "CREATE - USUARIO - " . $lastUsuario->getId_usuario() . " - " . $lastUsuario->getNombre() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                } elseif ($result) {
                    $lastUsuario = Usuario::lastUsuario();
                    $text = "CREATE - USUARIO - " . $lastUsuario->getId_usuario() . " - " . $lastUsuario->getNombre() . " ----> Creado desde uneté";
                    Log::setLog($text);
                }

                return $result
                    ? Elements::crearMensajeAlerta(Constants::$USER_NEW, "success")
                    : Elements::crearMensajeAlerta(Constants::$ADMIN_REPEAT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function getUserByAPI($cedula)
    {
        $restCall = new RestCall();

         
        $restCall->setHost("https://fcappshlab.comultrasan.com.co:8080/validador");
        $restCall->setEndpoint("/shareppy/tx_validator.Proxy/executeProxy/923e6b7g-4048-5e8d-b818-8695c27e1ee3");

        $restCall->setKey("8TfxinxvlVTlhs7wgR8CZ/haijQzsZay/4hrnU6uo0UGU43PyZINMH5N9/zG+MiJ8pnhDEpbV1h8ZpDtXUdxzQ==");
        $restCall->setUser('KONDORY_LAB');

        $restCall->add('CEDULA', $cedula);

        $result = $restCall->run($cedula);
        $texto = "SELECT - USUARIO - " . $cedula . " ----> API de comultrasan";
        Log::setLog($texto);
        if (!empty($result->RETCOD)) {
            return 1;
        }
        if ($result->CODEST != 1) {
            return 1;
        } else {
            return 2;
        }
    }
    private static function enviarCorreoUnionComunidad($usuarioDTO, $correo)
    {
        $lastRegister = UsuarioComunidad::getUserCommunityByUserInactive($usuarioDTO->getId_usuario());
        $asunto = "Solicitud de unión a comunidad";
        $mensaje = "Estimado/a líder de la comunidad, <br><br>
                El usuario " . $lastRegister->getUsuarioDTO()->getNombre() . " ha solicitado unirse a tu comunidad. 
                Para revisar y aceptar o rechazar esta solicitud, por favor, haz clic en el siguiente enlace: " . self::getURL() .
            '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad() . "<br><br>
                Gracias por tu liderazgo y dedicación. <br><br>
                Saludos cordiales, <br> El equipo de Financiera Comultrasan";

        Mail::sendEmail($asunto, $mensaje, $correo);
    }
    private static function getURL()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['REQUEST_URI'];
        $url = $protocol . "://" . $host . $script;
        return $url;
    }
    public static function setProfile(
        $nombre,
        $correo,
        $cedula,
        $tipo_documento,
        $tipo_imagen
    ) {
        try {

            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $cedula = parent::limpiarString($cedula);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $tipo_imagen = parent::limpiarString($tipo_imagen);
                $id_usuario = $_SESSION['id'];

                switch ($tipo_imagen) {
                    case 1: {
                        $imagen = 'avatar_hombre.jpeg';
                        break;
                    }
                    case 2: {
                        $imagen = 'avatar_mujer.jpeg';
                        break;
                    }
                    default: {
                        $imagen = $_SESSION['imagen'];
                    }
                }

                if (
                    Usuario::setUserProfile(
                        $id_usuario,
                        $nombre,
                        $correo,
                        $cedula,
                        $tipo_documento,
                        $imagen
                    )
                ) {
                    $usuario = Usuario::getUserById($id_usuario);
                    $_SESSION['id'] = $usuario->getId_usuario();
                    $_SESSION['nombre'] = $usuario->getNombre();
                    $_SESSION['correo'] = $usuario->getCorreo();
                    $_SESSION['cedula'] = $usuario->getCedula();
                    $_SESSION['imagen'] = $usuario->getImagen();
                    $_SESSION['tipo'] = $usuario->getTipo();
                    $_SESSION['fecha_registro'] = $usuario->getFecha_registro();
                    $historialDTO = HistorialInformacion::getHistoryInformationByUser($_SESSION['id']);
                    $fecha_registro = date('Y-m-d H:i:s');
                    if (!$historialDTO) {
                        HistorialInformacion::newHistoryInformation($_SESSION['id'], $fecha_registro);
                        ActividadUsuario::newActivityUser($_SESSION['id'], 2, $fecha_registro);
                        Punto::newPoint(5, $_SESSION['id'], 1, "Actualización de información", $fecha_registro);
                    }

                    $text = "UPDATE - USUARIO - " . $_SESSION['id'] . " - " . $_SESSION['nombre'] . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                    Log::setLog($text);
                    return '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
                } else {
                    return '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPassProfile($pass, $newPass, $confirmPass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'profile.php') {
                $pass = parent::limpiarString($pass);
                $newPass = parent::limpiarString($newPass);
                $confirmPass = parent::limpiarString($confirmPass);

                $cedula = $_SESSION['cedula'];
                $pass_hash = parent::hash($pass);
                $result = Usuario::getUser($cedula, $pass_hash);

                if (!$result) {
                    return '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
                }
                if ($newPass !== $confirmPass) {
                    return Elements::crearMensajeAlerta("Las contraseñas no coinciden, intente de nuevo", "warning");
                }
                if (!self::valideSecurityPassword($newPass)) {
                    return Elements::crearMensajeAlerta("La contraseña debe tener mínimo 8 caracteres, incluyendo 1 mayúscula, 1 número y 1 carácter especial", "warning");
                }
                $id_usuario = $_SESSION['id'];
                $pass_hash = parent::hash($newPass);
                $result = Usuario::setUserPass($id_usuario, $pass_hash);
                if ($result)
                    return '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setUser(
        $id_usuario,
        $nombre,
        $correo,
        $cedula,
        $estado,
        $tipo_documento
    ) {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $nombre = parent::limpiarString($nombre);
                $correo = parent::limpiarString($correo);
                $cedula = parent::limpiarString($cedula);
                $tipo_documento = parent::limpiarString($tipo_documento);
                $result = Usuario::setUser(
                    $id_usuario,
                    $nombre,
                    $correo,
                    $cedula,
                    $estado,
                    $tipo_documento
                );

                if ($result) {
                    return '<script>swal("' . Constants::$USER_UPDATE . '", "", "success");</script>';
                } else {
                    return '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setPassUser($id_usuario, $pass, $confirmPass)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);
                $pass = parent::limpiarString($pass);
                $confirmPass = parent::limpiarString($confirmPass);
                if ($pass == $confirmPass) {
                    if (!self::valideSecurityPassword($pass)) {
                        return Elements::crearMensajeAlerta("La contraseña debe tener mínimo 8 caracteres, incluyendo 1 mayúscula, 1 número y 1 carácter especial", "warning");
                    }
                    $pass_hash = parent::hash($pass);
                    $result = Usuario::setUserPass($id_usuario, $pass_hash);
                    if ($result)
                        return '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
                } else {
                    return Elements::crearMensajeAlerta("Las contraseñas no coinciden, intente de nuevo", "warning");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function valideSecurityPassword($password)
    {
        return (
            strlen($password) >= 8 &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[\W]/', $password)
        );
    }
    public static function deleteUser($id_usuario)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                $id_usuario = parent::limpiarString($id_usuario);

                $usuarioDTO = Usuario::getUserById($id_usuario);
                $listBenefit = Beneficio::listBenefitByUser($id_usuario);
                $comunidad = Comunidad::getCommunityByUser($id_usuario);
                $grupoInteres = TipoComunidad::getTypeComunityByUser($id_usuario);

                if (!$listBenefit && !$comunidad && !$grupoInteres) {
                    $result = Usuario::deleteUser($id_usuario);
                    if ($result) {
                        $text = "DELETE - USUARIO - " . $id_usuario . " - " . $usuarioDTO->getNombre() . " ----> " . $_SESSION['id'] . " - " . $_SESSION['nombre'];
                        Log::setLog($text);
                        header('Location:users?delete');
                    }
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUsuario($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);

            $result = Usuario::getUserById($id_usuario);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTablaUserByManager()
    {
        try {
            $tableHtml = "";
            $modelResponse = Usuario::listUser();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $comunidadDTO = Comunidad::getCommunityByUserType($valor->getId_usuario());
                    $referidoDTO = Referido::getReferredByCedula($valor->getCedula());
                    $referido = ($referidoDTO) ? $referidoDTO->getNombre_refiere() : 'No fue referido';
                    $grupoInteresDTO = TipoComunidad::getUserGroupInterestByUser($valor->getId_usuario());
                    $puntoDTO = Punto::getLastPointByUser($valor->getId_usuario());
                    $countPoints = Punto::getSumPointsByUser($valor->getId_usuario());
                    $benfits = self::getBenefitByUser($valor->getId_usuario());
                    $groups = self::getGroupInterestByUser($valor->getId_usuario());

                    $style = self::getColorByEstate($valor->getEstado()[0]);
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                    $tableHtml .= '<td>' . $comunidadDTO->nombre . '</td>';
                    $tableHtml .= '<td>' . $comunidadDTO->id_comunidad . '</td>';
                    $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                    $tableHtml .= '<td>' . $referido . '</td>';
                    $tableHtml .= '<td>' . $comunidadDTO->tipo . '</td>';
                    $tableHtml .= '<td>' . $comunidadDTO->creacion . '</td>';
                    $tableHtml .= '<td>' . $comunidadDTO->fecha . '</td>';
                    $tableHtml .= '<td>' . $groups . '</td>';
                    $tableHtml .= '<td>' . ($puntoDTO ? $puntoDTO->getFecha_registro() : 'Sin registro') . '</td>';
                    $tableHtml .= '<td>' . $countPoints . '</td>';
                    $tableHtml .= '<td>' . $benfits . '</td>';
                    $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                        $tableHtml .= '<td>' . Elements::crearBotonVer("user", $valor->getId_usuario()) . '</td>';
                    } else {
                        $tableHtml .= '<td>' . Elements::crearBotonVer2("user", $valor->getId_usuario()) . '</td>';
                    }
                    $tableHtml .= '</tr>';
                }
            } else {
                $tableHtml = '<tr><td colspan="6">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getBenefitByUser($id_usuario)
    {
        $beneficiosDTO = Beneficio::listBenefitByUser($id_usuario);
        $benefits = [];

        foreach ($beneficiosDTO as $value) {
            $benefits[] = $value->getTitulo(); // Acumulamos los títulos en el array
        }

        $benefitsString = implode(', ', $benefits); // Unimos los títulos con comas
        return $benefitsString;
    }
    private static function getGroupInterestByUser($id_usuario)
    {

        $tipoComunidadDTO = TipoComunidad::getTypeComunityByUser($id_usuario);
        $groups = [];

        foreach ($tipoComunidadDTO as $value) {
            $groups[] = $value->getTitulo(); // Acumulamos los títulos en el array
        }

        $benefitsString = implode(', ', $groups); // Unimos los títulos con comas
        return $benefitsString;
    }
    public static function getOptionUser()
    {
        try {
            $html = "";
            $modelResponse = Usuario::listUser();

            foreach ($modelResponse as $value) {
                $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionUserWithoutCommunity()
    {
        try {
            $html = "";
            $modelResponse = Usuario::getUsersWithoutCommunity();

            foreach ($modelResponse as $value) {
                $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
            }
            return $html;
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
    public static function getTablaUserByManagerFilter($id_comunidad, $nombre, $cedula)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $nombre = parent::limpiarString($nombre);
            $cedula = parent::limpiarString($cedula);
            $sql = '';
            if ($id_comunidad != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT com.id_usuario
                                                        FROM Comunidad com
                                                        WHERE com.id_comunidad = %s
                                                        UNION 
                                                        SELECT uc.id_usuario
                                                        FROM Comunidad com,
                                                            UsuarioComunidad uc,
                                                            Usuario us
                                                        WHERE us.id_usuario = uc.id_usuario
                                                        AND com.id_usuario != us.id_usuario
                                                        AND com.id_comunidad = uc.id_comunidad
                                                        AND com.id_comunidad =  %s
                                                        AND uc.estado = 2 ) ", $id_comunidad, $id_comunidad);
            }

            if ($nombre != '') {
                $sql .= sprintf(" AND nombre LIKE '%%%s%%'", $nombre);
            }

            if ($cedula != '') {
                $sql .= sprintf(" AND cedula LIKE %%%s%%", $cedula);
            }
            $tableHtml = [];
            $modelResponse = Usuario::listUserByFilter($sql);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $comunidadDTO = Comunidad::getCommunityByUserType($valor->getId_usuario());
                    $referidoDTO = Referido::getReferredByCedula($valor->getCedula());
                    $referido = ($referidoDTO) ? $referidoDTO->getNombre_refiere() : 'No fue referido';
                    $grupoInteresDTO = TipoComunidad::getUserGroupInterestByUser($valor->getId_usuario());
                    $grupoInteres = ($grupoInteresDTO) ? $grupoInteresDTO->getTitulo() : 'No tiene';
                    $puntoDTO = Punto::getLastPointByUser($valor->getId_usuario());
                    $countPoints = Punto::getSumPointsByUser($valor->getId_usuario());
                    $style = self::getColorByEstate($valor->getEstado()[0]);
                    $benfits = self::getBenefitByUser($valor->getId_usuario());
                    $groups = self::getGroupInterestByUser($valor->getId_usuario());
                    $tableHtml[] = [
                        'Nombre' => $valor->getNombre(),
                        'Cedula' => $valor->getCedula(),
                        'Comunidad' => $comunidadDTO->nombre,
                        'Codigo' => $comunidadDTO->id_comunidad,
                        'Correo' => $valor->getCorreo(),
                        'Referido' => $referido,
                        'Tipo' => $comunidadDTO->tipo,
                        'Fecha_creacion' => $comunidadDTO->creacion,
                        'Fecha_comunidad' => $comunidadDTO->fecha,
                        'Grupo_interes' => $grupoInteres,
                        'Ultimo_punto' => ($puntoDTO ? $puntoDTO->getFecha_registro() : 'Sin registro'),
                        'Total_puntos' => $countPoints,
                        'Beneficios' => $benfits,
                        'Estado' => '<small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small>',
                        'Opciones' => Elements::crearBotonVer2("user", $valor->getId_usuario())
                    ];
                }
            }
            return json_encode($tableHtml);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableMisingActivityByCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $tableHtml = "";
            $modelResponse = ActividadUsuario::listMissingActivityUserCommunity($id_comunidad);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor['nombre'] . '</td>';
                    $tableHtml .= '<td>' . $valor['actividad'] . '</td>';
                    $tableHtml .= '<td>Actividad pendiente por realizar</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                $tableHtml = '<tr><td colspan="3" class="text-center">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableRealizedActivityByCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $tableHtml = "";
            $modelResponse = ActividadUsuario::listRealizedActivityUserCommunity($id_comunidad);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor['nombre'] . '</td>';
                    $tableHtml .= '<td>' . $valor['actividad'] . '</td>';
                    $tableHtml .= '<td>Actividad realizada</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                $tableHtml = '<tr><td colspan="3" class="text-center">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getShowAllActivityByCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $tableHtml = "";
            $modelResponse = ActividadUsuario::listShowAllActivityUserCommunity($id_comunidad);

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor['nombre'] . '</td>';
                    $tableHtml .= '<td>' . $valor['actividad'] . '</td>';
                    $tableHtml .= '<td>' . $valor['estado'] . '</td>';
                    $tableHtml .= '</tr>';
                }
            } else {
                $tableHtml = '<tr><td colspan="3" class="text-center">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function valideOTP($otp)
    {
        if ($otp == $_SESSION['otp']) {
            if (time() < $_SESSION['otp_expiry']) {
                $_SESSION['show_modal'] = true;
                $_SESSION['show_modalOTP'] = false;
                CodigoOTP::setCodeOTPEstate($_SESSION['id_codigo'], 2);
                unset($_SESSION['otp']);
                unset($_SESSION['otp_expiry']);
            } else {
                return Elements::crearMensajeAlerta("El código que digitó ya expiró, genere un nuevo código", "error");
            }
        } else {
            return Elements::crearMensajeAlerta("El código que digitó es invalido, vuelva a digitarlo", "error");
        }
    }
    public static function getScriptModalOTP()
    {
        try {
            return '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const otpModal = new bootstrap.Modal(document.getElementById("otpModal"), {
                                backdrop: "static",
                                keyboard: false
                            });
                            otpModal.show();
                        });
                    </script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setCodeOTP()
    {
        $length = 5;
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= rand(0, 9);
        }
        $_SESSION['otp'] = $otp;
        $time = time() + 3600;
        $_SESSION['otp_expiry'] = $time;
        CodigoOTP::setCodeOTPCodeNew($_SESSION['id_codigo'], $otp, $time);
        parent::sendMailOTP($_SESSION['nombre'], $otp, $_SESSION['correo']);
    }
}
