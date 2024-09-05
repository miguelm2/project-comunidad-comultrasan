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

            $comunidadDTO = Comunidad::getCommunity($id_comunidad);

            if (!$comunidadDTO) {
                return Elements::crearMensajeAlerta(Constants::$COMMUNITY_NOT, "error");
            }

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $estado, $fecha_registro);

            if ($result && $comunidadDTO) {
                $lastRegister = UsuarioComunidad::getUserCommunityByUserInactive($id_usuario);
                if ($comunidadDTO->getUsuarioDTO()->getId_usuario() == $_SESSION['id']) {
                    $correo = $lastRegister->getUsuarioDTO()->getCorreo();
                    $asunto = "Solicitud de unión a comunidad";
                    $mensaje = "Estimado/a, <br><br>
                            Has sido invitado/a a unirte a una nueva comunidad en nuestra plataforma. 
                            Para aceptar o rechazar esta oferta, por favor, haz clic en el siguiente enlace:<a href='" . self::getURL() .
                        '/acceptUser?acceptUser=' . $lastRegister->getId_usuario_comunidad() . "'>" . self::getURL() .
                        '/acceptUser?acceptUser=' . $lastRegister->getId_usuario_comunidad() . "</a><br>br>
                            Gracias por ser parte de nuestra comunidad. <br><br>
                            Saludos cordiales,<br>
                            El equipo de Financiera Comultrasan";
                } else {
                    $correo = $comunidadDTO->getUsuarioDTO()->getCorreo();
                    $asunto = "Solicitud de unión a comunidad";
                    $mensaje = "Estimado/a líder de la comunidad, <br><br>
                            El usuario " . $lastRegister->getUsuarioDTO()->getNombre() . " ha solicitado unirse a tu comunidad. 
                            Para revisar y aceptar o rechazar esta solicitud, por favor, haz clic en el siguiente enlace: <a href='" . self::getURL() .
                        '/acceptUser?acceptUser=' . $lastRegister->getId_usuario_comunidad() . "'>" . self::getURL() .
                        '/acceptUser?acceptUser=' . $lastRegister->getId_usuario_comunidad() . "</a><br><br>
                            Gracias por tu liderazgo y dedicación. <br><br>
                            Saludos cordiales, <br>
                            El equipo de Financiera Comultrasan";
                }
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
            $estado             = parent::limpiarString(1);
            $fecha_registro = date('Y-m-d H:i:s');

            $comunidadDTO = Comunidad::getCommunity($id_comunidad);

            if (!$comunidadDTO) {
                return Elements::crearMensajeAlerta(Constants::$COMMUNITY_NOT, "error");
            }

            $result = UsuarioComunidad::newUserCommunity($id_usuario, $id_comunidad, $estado, $fecha_registro);

            if ($result && $comunidadDTO) {
                $lastRegister = UsuarioComunidad::getUserCommunityByUserInactive($id_usuario);
                if ($comunidadDTO->getUsuarioDTO()->getId_usuario() == $_SESSION['id']) {
                    $correo = $lastRegister->getUsuarioDTO()->getCorreo();
                    $asunto = "Solicitud de unión a comunidad";
                    $mensaje = "Estimado/a, <br><br>
                            Has sido invitado/a a unirte a una nueva comunidad en nuestra plataforma. 
                            Para aceptar o rechazar esta oferta, por favor, haz clic en el siguiente enlace:<a href='" . self::getURL() .
                        '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad() . "'>" . self::getURL() .
                        '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad() . "</a><br>br>
                            Gracias por ser parte de nuestra comunidad. <br><br>
                            Saludos cordiales,<br>
                            El equipo de Financiera Comultrasan";
                } else {
                    $correo = $comunidadDTO->getUsuarioDTO()->getCorreo();
                    $asunto = "Solicitud de unión a comunidad";
                    $mensaje = "Estimado/a líder de la comunidad, <br><br>
                            El usuario " . $lastRegister->getUsuarioDTO()->getNombre() . " ha solicitado unirse a tu comunidad. 
                            Para revisar y aceptar o rechazar esta solicitud, por favor, haz clic en el siguiente enlace: " . self::getURL() .
                        '/acceptCommunity?com_us=' . $lastRegister->getId_usuario_comunidad() . "<br><br>
                            Gracias por tu liderazgo y dedicación. <br><br>
                            Saludos cordiales, <br>
                            El equipo de Financiera Comultrasan";
                }
                Mail::sendEmail($asunto, $mensaje, $correo);
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteUserOfCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);
            $id_comunidad = $comunidadDTO->getId_comunidad();
            $count = Usuario::countUsersInCommunity($id_comunidad);

            if ($count <= 2) {
                if (Comunidad::setCommunityEstate($id_comunidad, 0, $comunidadDTO->getUsuarioDTO()->getId_comunidad())) {
                    UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
                    return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
                }
            } else {
                UsuarioComunidad::deleteUserCommunityByUser($id_usuario);
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
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunityByUser($id_usuario);
            $comunidadDTO = $usuarioComunidadDTO->getComunidadDTO();
            $id_comunidad = $usuarioComunidadDTO->getComunidadDTO()->getId_comunidad();
            $count = Usuario::countUsersInCommunity($id_comunidad);
            if ($count <= 2) {
                if (Comunidad::setCommunityEstate($id_comunidad, 0, $comunidadDTO->getUsuarioDTO()->getId_comunidad())) {
                    UsuarioComunidad::deleteUserCommunityByCommunity($id_comunidad);
                    return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
                }
            } else {
                UsuarioComunidad::deleteUserCommunityByCommunity($id_comunidad);
                return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUserCommunityByComummnity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $comunidadDTO = Comunidad::getCommunity($id_comunidad);
            $count_points = Punto::getSumPointsByUser($comunidadDTO->getUsuarioDTO()->getId_usuario());
            $tableHtml = '<tr>';
            $tableHtml .= '<td>Líder</td>';
            $tableHtml .= '<td>' . $comunidadDTO->getUsuarioDTO()->getNombre() . '</td>';
            $tableHtml .= '<td>' . $comunidadDTO->getNombre() . '</td>';
            $tableHtml .= '<td class="text-center">' . $count_points . '</td>';
            $tableHtml .= '<td>' . $comunidadDTO->getFecha_registro() . '</td>';
            $tableHtml .= '<td></td>';
            $tableHtml .= '</tr>';

            $modelResponse = UsuarioComunidad::getUserCommunityByCommunity($id_comunidad);
            foreach ($modelResponse as $value) {
                $count_points = Punto::getSumPointsByUser($value->getUsuarioDTO()->getId_usuario());
                $tableHtml .= '<tr>';
                $tableHtml .= '<td class="text-center">' . $value->getId_usuario_comunidad() . '</td>';
                $tableHtml .= '<td>' . $value->getUsuarioDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $value->getComunidadDTO()->getNombre() . '</td>';
                $tableHtml .= '<td class="text-center">' . $count_points . '</td>';
                $tableHtml .= '<td>' . $value->getFecha_registro() . '</td>';
                if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                    $tableHtml .= '<td class="text-center">' . Elements::getButtonDeleteModalJs('takeOut', 'Remover', $value->getUsuarioDTO()->getId_usuario())  .
                        Elements::crearBotonMover('moveUser', $value->getId_usuario_comunidad()) . '</td>';
                }
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
                    $usuarioComunidadDTO->getFecha_registro(),
                    Elements::crearBotonMover('moveUser', $usuarioComunidadDTO->getId_usuario_comunidad())
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
    public static function getTableRequestUnited()
    {
        try {

            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);

            if (!$comunidadDTO) {
                return '<tr><th colspan="5">No hay datos que mostrar</th></tr>';
            }

            $tableHtml = '';

            if ($comunidadDTO->getUsuarioDTO()->getId_usuario() == $id_usuario) {
                $usuarios = Usuario::getUsersInCommunityRequest($comunidadDTO->getId_comunidad());
                if ($usuarios) {
                    foreach ($usuarios as $value) {
                        $usuarioComunidad = UsuarioComunidad::getUserCommunityByUserInactive($value->getId_usuario());

                        $style = self::getColorByEstate($value->getEstado()[0]);
                        $count_points = Punto::getSumPointsByUser($value->getId_usuario());
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $value->getNombre() . '</td>';
                        $tableHtml .= '<td class="text-center">' . $count_points . '</td>';
                        $tableHtml .= '<td class="text-center"><small class="alert alert-' . $style . ' p-1">' . $value->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td>' . self::getDateInWords($usuarioComunidad->getFecha_registro()) . '</td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer2("acceptUser", $usuarioComunidad->getId_usuario_comunidad()) . '</td>';

                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><th colspan="5">No hay datos que mostrar</th></tr>';
                }
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getColorByEstate($estado)
    {
        try {
            switch ($estado) {
                case 1: {
                        return 'warning';
                    }
                case 2: {
                        return 'success';
                    }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getDateInWords($fechaBD)
    {
        $fechaBD = new DateTime($fechaBD);

        $dia = $fechaBD->format('j');
        $mes = Elements::mes((int)$fechaBD->format('n'));
        $año = $fechaBD->format('Y');

        // Formatear la fecha en palabras
        $fechaEnPalabras = "$dia de $mes de $año";
        return $fechaEnPalabras;
    }
    public static function getOptionCommunity($id_usuario_comunidad)
    {
        try {
            $id_usuario_comunidad = parent::limpiarString($id_usuario_comunidad);
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunity($id_usuario_comunidad);
            $comunidadesDTO = Comunidad::listCommunityDiferernt($usuarioComunidadDTO->getComunidadDTO()->getId_comunidad());
            $html = '';
            foreach ($comunidadesDTO as $value) {
                $html .= '<option value="' . $value->getId_comunidad() . '">' . $value->getId_comunidad() . ' - ' . $value->getNombre() . ' ' . $value->getUsuarioDTO()->getNombre() . '</option>';
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function moveUser($id_usuario_comunidad, $id_comunidad)
    {
        try {
            $id_usuario_comunidad = parent::limpiarString($id_usuario_comunidad);
            $id_comunidad = parent::limpiarString($id_comunidad);
            $usuarioComunidadDTO = UsuarioComunidad::getUserCommunity($id_usuario_comunidad);
            $comunidadDTO = $usuarioComunidadDTO->getComunidadDTO();
            $count = Usuario::countUsersInCommunity($id_comunidad);
            if ($count <= 2) {
                if (Comunidad::setCommunityEstate($id_comunidad, 0, $comunidadDTO->getUsuarioDTO()->getId_usuario())) {
                    UsuarioComunidad::moveUserCommunityToCommunity($id_usuario_comunidad, $id_comunidad);
                    return Elements::crearMensajeAlerta(Constants::$MOVE_USER_COMMUNITY, "success");
                }
            } else {
                UsuarioComunidad::moveUserCommunityToCommunity($id_usuario_comunidad, $id_comunidad);
                return Elements::crearMensajeAlerta(Constants::$MOVE_USER_COMMUNITY, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
