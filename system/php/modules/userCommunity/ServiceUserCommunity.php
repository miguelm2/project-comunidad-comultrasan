<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioComunidad.php';

class ServiceUserCommunity extends System
{
    public static function newUserCommunity($id_usuario, $id_comunidad)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_comunidad       = parent::limpiarString($id_comunidad);
            $estado             = parent::limpiarString(1);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $estado, $fecha_registro);

            if ($result) {
                $lastRegister = UsuarioComunidad::getUserCommunityByUserInactive($id_usuario);
                $correo = $lastRegister->getUsuarioDTO()->getCorreo();
                $asunto = "Solicitud de unión a comunidad";
                $mensaje = "Hola, estas siendo invitada a unirte a una nueva comunidad, para aceptar o rechzar la 
                oferta da click en el siguiente link: " . self::getURL() . '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad();
                Mail::sendEmail($asunto, $mensaje, $correo);
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getURL()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['REQUEST_URI'];
        $url = $protocol . "://" . $host . $script;
        return $url;
    }
    public static function newUserCommunityJoin($id_usuario, $id_comunidad)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_comunidad       = parent::limpiarString($id_comunidad);
            $estado             = parent::limpiarString(2);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $estado, $fecha_registro);

            if ($result) {
                header('Location: community?new');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserOfCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByUser($id_usuario);
            $result = UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
            $id_comunidad = $usuarioComunidadDTO->getComunidadDTO()->getId_comunidad();
            if ($result) {
                $count = Usuario::countUsersInCommunity($id_comunidad);
                if ($count < 2) {
                    $response = Comunidad::deleteCommunity($id_comunidad);
                    if ($response) {
                        UsuarioComunidad::deleteUserCommunityByCommunity($id_comunidad);
                    }
                }
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
            }
            return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM_NOT, "error");
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserOfCommunityByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            $result = UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_BY_LEAD, "success");
            } else {
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_BY_LEAD_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUserCommunityByComummnity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $modelResponse = UsuarioComunidad::getUserCommunityByCommunity($id_comunidad);
            $tableHtml = '';
            foreach ($modelResponse as $value) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td class="text-center">' . $value->getId_usuario_comunidad() . '</td>';
                $tableHtml .= '<td>' . $value->getUsuarioDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $value->getComunidadDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $value->getFecha_registro() . '</td>';
                if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5)
                    $tableHtml .= '<td class="text-center">' . Elements::getButtonDeleteModalJs('takeOut', '', $value->getUsuarioDTO()->getId_usuario()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function tableUserCommunityByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByUser($id_usuario);

            if ($usuarioComunidadDTO) {
                return Elements::getCardBodyCommunityUser(
                    $usuarioComunidadDTO->getComunidadDTO()->getId_comunidad(),
                    $usuarioComunidadDTO->getComunidadDTO()->getNombre(),
                    $usuarioComunidadDTO->getComunidadDTO()->getUsuarioDTO()->getNombre(),
                    $usuarioComunidadDTO->getComunidadDTO()->getFecha_registro(),
                    $usuarioComunidadDTO->getFecha_registro()
                );
            } else {
                return '<div class="text-center">
                            <h4>Aún no pertenece a una comunidad</h4>
                        </div>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUserCommunityByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByUser($id_usuario);
            return $usuarioComunidadDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setEstateUserCommunity($id_usuario_comunidad, $estado)
    {
        try {
            $id_usuario_comunidad = parent::limpiarString($id_usuario_comunidad);
            $estado = parent::limpiarString($estado);

            $result = UsuarioComunidad::setEstateUserCommunity($id_usuario_comunidad, $estado);
            if ($result) {
                header('Location: community?new');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserCommunity($id_usuario_comunidad)
    {
        try {
            $id_usuario_comunidad = parent::limpiarString($id_usuario_comunidad);
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunity($id_usuario_comunidad);
            $result = UsuarioComunidad::deleteUserCommunity($id_usuario_comunidad);
            if ($result) {
                $mail_leader = $usuarioComunidadDTO->getComunidadDTO()->getUsuarioDTO()->getCorreo();
                $mensaje = "Estimado(a) " . $usuarioComunidadDTO->getComunidadDTO()->getUsuarioDTO()->getNombre() . ",<br><br>
                Le informamos que la persona a quien extendió una invitación para unirse a la comunidad que ha creado, 
                no ha aceptado dicha invitación.<br><br>
                Agradecemos su confianza en nuestra plataforma y quedamos a su disposición para cualquier consulta adicional.<br><br>
                Atentamente,<br><br>
                Financiera Comultrasan";
                $asunto = "Notificación sobre invitación pendiente a su comunidad";
                Mail::sendEmail($asunto, $mensaje, $mail_leader);
                header('Location:community?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUserCommunity($id_usuario_comunidad)
    {
        try {
            $id_usuario_comunidad = parent::limpiarString($id_usuario_comunidad);
            $usuarioComunidad = UsuarioComunidad::getUserCommunity($id_usuario_comunidad);
            return $usuarioComunidad;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
