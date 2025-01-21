<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Punto.php';

class ServiceCommunity extends System
{
    public static function newCommunity($nombre, $cedula, $nombre_user, $correo, $celular)
    {
        try {
            $id_usuario    = $_SESSION['id'];
            $nombre = parent::limpiarString($nombre);
            $estado = parent::limpiarString(1);
            $nombre_user = parent::limpiarString($nombre_user);
            $correo = parent::limpiarString($correo);
            $celular = parent::limpiarString($celular);
            $fecha_registro = date('Y-m-d H:i:s');

            if ($_SESSION['cedula'] == $cedula) {
                return Elements::crearMensajeAlerta(Constants::$USER_DIFERENT, "error");
            }

            $usuario = Usuario::getUserByCedula($cedula);
            if (!$usuario) {
                self::registrarNuevoReferido($nombre_user, $cedula, $correo, $celular, $fecha_registro);
                self::enviarInvitacionCorreo($nombre_user, $nombre, $correo, $celular, $cedula);

                return Elements::crearMensajeAlerta(Constants::$USER_NOT_EXIST, "error");
            }

            // Si ya pertenece a una comunidad
            if (UsuarioComunidad::getValideUserCommunityByUser($usuario->getId_usuario()) || Comunidad::getCommunityByUser($usuario->getId_usuario())) {
                return Elements::crearMensajeAlerta(Constants::$USER_READY_COMMUNITY, "error");
            }

            // Registro de la comunidad
            $result = Comunidad::newCommunity($nombre, $id_usuario, $estado, $fecha_registro);
            if ($result) {
                ActividadUsuario::newActivityUser($_SESSION['id'], 1, $fecha_registro);
                Punto::newPoint(16, $_SESSION['id'], 1, 'Puntos por conformar nueva comunidad', $fecha_registro);
                if ($comunidad = Comunidad::getLastCommunity()) {
                    UsuarioComunidad::newUserCommunity($usuario->getId_usuario(), $comunidad->getId_comunidad(), 2, $fecha_registro);
                }
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function registrarNuevoReferido($nombre_user, $cedula, $correo, $celular, $fecha_registro)
    {
        Referido::newReferred(
            $nombre_user,
            $cedula,
            1,
            $celular,
            $_SESSION['nombre'],
            1,
            $_SESSION['cedula'],
            1,
            $_SESSION['id'],
            $fecha_registro
        );
    }

    // Enviar invitación por correo
    private static function enviarInvitacionCorreo($nombre_user, $nombre_comunidad, $correo, $celular, $cedula)
    {
        $mensaje = "Estimado(a) $nombre_user,
                Nos complace informarle que ha sido invitado(a) a unirse a nuestra aplicación, 
                como parte de la comunidad $nombre_comunidad, creada por " . $_SESSION['nombre'] . ".<br><br>
                Para aceptar la invitación y disfrutar de los beneficios que ofrece nuestra plataforma, 
                le invitamos a registrarse en el siguiente enlace: " . self::getURL() . "/singup .<br><br>
                Agradecemos su interés y esperamos contar con su valiosa participación.<br><br>
                Atentamente,<br> Financiera Comultrasan";

        $asunto = "Invitación a unirse a nuestra plataforma y comunidad";
        Mail::sendEmail($asunto, $mensaje, $correo);
    }
    public static function getCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);

            $result = Comunidad::getCommunity($id_comunidad);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteCommunity($id_Comunidad)
    {
        try {
            $id_Comunidads_pagina = parent::limpiarString($id_Comunidad);

            $result = Comunidad::deleteCommunity($id_Comunidads_pagina);
            if ($result) header('Location:Communitys?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableCommunity()
    {
        try {
            $tableHtml = "";
            $modelResponse = Comunidad::listCommunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $style = self::getColorByEstate($valor->getEstado()[0]);
                    $count_user = Usuario::countUsersInCommunity($valor->getId_comunidad());
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_comunidad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $count_user . '</td>';
                    $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                        $tableHtml .= '<td>' . Elements::crearBotonVer("community", $valor->getId_comunidad()) . '</td>';
                    } else {
                        $tableHtml .= '<td>' . Elements::crearBotonVer2("community", $valor->getId_comunidad()) . '</td>';
                    }
                    $tableHtml .= '</tr>';
                }
            } else {
                return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableCommunityIndex()
    {
        try {
            $tableHtml = "";
            $modelResponse = Comunidad::listCommunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td class="text-center">' . $valor->getId_comunidad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
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
    public static function getUnitedCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUserLider($id_usuario); //consulta usuario lider de tabla Comunidad
            $tipo_user = 0; //identificar al usuario lider con 1
            if(!$comunidadDTO) {
                $comunidadDTO = Comunidad::getCommunityByUser($id_usuario); //consulta usuario miembro de tabla UsuarioComunidad
                $tipo_user = 1; //identificar al usuario miembro con 0
            }

            if (!$comunidadDTO) {
                return Elements::getUnitedCommunity();
            }

            $isLeader = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $id_usuario;
            $html = '<div class="row"><div class="col-md-6">';

            $count = Usuario::countUsersInCommunity($comunidadDTO->getId_comunidad());
            $fecha = self::getDateInWords($comunidadDTO->getFecha_registro());
            $ranking = Comunidad::getRankingByCommunity($comunidadDTO->getId_comunidad());
            $btnEditar = $isLeader ? Elements::getButtonEditModalJs('editName', 'Editar', $comunidadDTO->getId_comunidad(), $comunidadDTO->getNombre()) : '';
            $puntos = Punto::getSumPointsByUser($comunidadDTO->getUsuarioDTO()->getId_usuario());

            $html .= Elements::getUnitedCommunityReady(
                $comunidadDTO->getNombre(),
                $comunidadDTO->getUsuarioDTO()->getNombre(),
                $count,
                $fecha,
                $comunidadDTO->getId_comunidad(),
                ($ranking['total_puntos'] ?? 0) + $puntos,
                $btnEditar
            );

            $html .= '</div><div class="col-md-5">';
            $html .= $tipo_user != 0 ? '' : Elements::getCardUserInCommunity($comunidadDTO->getUsuarioDTO()->getNombre(), '', '<i class="material-icons me-2">favorite</i>Total: ' . $puntos);
            $html .= $tipo_user != 0 ? '' : self::getCommunityMembers($comunidadDTO->getId_comunidad(), $isLeader);
            $html .= self::getBenefitByComunity();

            $btnSalir = $isLeader ?
                Elements::getButtonDeleteModal('leaveLeader', 'Salir de la comunidad') :
                Elements::getButtonDeleteModal('leave', 'Salir de la comunidad');

            $html .= '</div>
                        <div class="col-md-11">
                            <div class="text-end">
                            ' . $btnSalir . '
                            </div>
                        </div>
                    </div>';

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getRestHmtl()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUserLider($id_usuario) ?? Comunidad::getCommunityByUser($id_usuario);

            if (!$comunidadDTO) {
                return '<div class="col-md-5"><h5 class="text-black">Debes unirte a una Comunidad</h5></div>';
            }

            $isLeader = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $id_usuario;
            $html = '';
            $ranking = Comunidad::getRankingByCommunity($comunidadDTO->getId_comunidad());
            $puntos = Punto::getSumPointsByUser($comunidadDTO->getUsuarioDTO()->getId_usuario());
            $html .= Elements::getHtmlCards(($ranking['total_puntos'] ?? 0) + $puntos, ($ranking['posicion'] ?? 0), ($ranking['total_comunidades'] ?? 0));

            $html .= Elements::getCardUserInCommunityRanking($comunidadDTO->getUsuarioDTO()->getNombre(), $comunidadDTO->getUsuarioDTO()->getImagen(), $puntos, 0);
            $html .= self::getCommunityRanking($comunidadDTO->getId_comunidad());

            $html .= '</div></div></div>';
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionRequest()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUserLider($id_usuario) ?? Comunidad::getCommunityByUser($id_usuario);

            if (!$comunidadDTO) {
                return [
                    'html' => '',
                    'style' => 'style="display: none"'
                ];
            }

            $isLeader = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $id_usuario;
            if ($isLeader) {
                return [
                    'html' => '<li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 text-success" data-bs-toggle="tab" href="#information" 
                                role="tab" aria-controls="dashboard" aria-selected="false">
                                Solicitudes
                            </a>
                        </li>',
                    'style' => ''
                ];
            } else {
                return [
                    'html' => '',
                    'style' => 'style="display: none"'
                ];
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getCommunityMembers($id_comunidad, $isLeader)
    {
        $html = '';
        $modelResponse = Usuario::getUsersInCommunity($id_comunidad);

        foreach ($modelResponse as $valor) {
            $btnEliminar = $isLeader ? Elements::getButtonDeleteModalJs('takeOut', 'Remover', $valor->getId_usuario()) : '';
            $points = '<i class="material-icons me-2">favorite</i>Total: ' . Punto::getSumPointsByUser($valor->getId_usuario());
            $html .= Elements::getCardUserInCommunity($valor->getNombre(), $btnEliminar, $points);
        }

        return $html;
    }
    private static function getCommunityRanking($id_comunidad)
    {
        $html = '';
        $modelResponse = Usuario::getUsersInCommunity($id_comunidad);
        $contador = 1;

        foreach ($modelResponse as $valor) {
            $points =  Punto::getSumPointsByUser($valor->getId_usuario());
            $html .= Elements::getCardUserInCommunityRanking($valor->getNombre(), $valor->getImagen(), $points, $contador);
            $contador++;
        }

        return $html;
    }
    public static function getCommunityByUser($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);

            $result = Comunidad::getCommunityByUser($id_usuario);
            return $result;
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
    public static function getButtonUnitUser()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUserLider($id_usuario) ?? Comunidad::getCommunityByUser($id_usuario);

            if (!$comunidadDTO) {
                return '';
            }

            $buttonHtml = '
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-success">Miembros</h4>
                    </div>
                    <div class="col-md-7">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserComm">
                            <i class="material-icons me-2">add</i> Agregar Miembro
                        </button>
                    </div>
                </div>';

            return $buttonHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setCommunity($id_comunidad, $nombre, $estado)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $nombre = parent::limpiarString($nombre);
            $estado = parent::limpiarString($estado);

            $result = Comunidad::setCommunity($id_comunidad, $nombre, $estado);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function leaveLeaderCommunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);
            $id_comunidad = $comunidadDTO->getId_comunidad();
            $count = Usuario::countUsersInCommunity($id_comunidad);

            // Obtener el único usuario de la comunidad
            $usuarioComunidadDTO = UsuarioComunidad::getOnlyUserCommunityByCommunity($id_comunidad);

            if (!$usuarioComunidadDTO) {
                return Elements::crearMensajeAlerta(Constants::$NO_USER_FOUND, "warning");
            }

            // Si hay menos de 2 usuarios, cambiar el estado a inactivo
            if ($count < 2) {
                if (Comunidad::setCommunityEstate($id_comunidad, 0, null)) {
                    // Transferir el liderazgo si es posible
                    if (Comunidad::setLeaderCommunity($id_comunidad, $usuarioComunidadDTO->getUsuarioDTO()->getId_usuario())) {
                        if (UsuarioComunidad::deleteUserCommunity($usuarioComunidadDTO->getId_usuario_comunidad())) {
                            return Elements::crearMensajeAlerta(Constants::$DELETE_LEADER, "success");
                        }
                    }
                }
            } else {
                // Transferir el liderazgo a otro usuario
                if (Comunidad::setLeaderCommunity($id_comunidad, $usuarioComunidadDTO->getUsuarioDTO()->getId_usuario())) {
                    if (UsuarioComunidad::deleteUserCommunity($usuarioComunidadDTO->getId_usuario_comunidad())) {
                        return Elements::crearMensajeAlerta(Constants::$DELETE_LEADER, "success");
                    }
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function removeLeaderCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $comunidadDTO = Comunidad::getCommunity($id_comunidad);
            $id_comunidad = $comunidadDTO->getId_comunidad();
            $count = Usuario::countUsersInCommunity($id_comunidad);

            // Obtener el único usuario de la comunidad
            $usuarioComunidadDTO = UsuarioComunidad::getOnlyUserCommunityByCommunity($id_comunidad);

            if (!$usuarioComunidadDTO) {
                return Elements::crearMensajeAlerta(Constants::$NO_USER_FOUND, "warning");
            }

            // Si hay menos de 2 usuarios, cambiar el estado a inactivo
            if ($count < 2) {
                if (Comunidad::setCommunityEstate($id_comunidad, 0, null)) {
                    // Transferir el liderazgo si es posible
                    if (Comunidad::setLeaderCommunity($id_comunidad, $usuarioComunidadDTO->getUsuarioDTO()->getId_usuario())) {
                        if (UsuarioComunidad::deleteUserCommunity($usuarioComunidadDTO->getId_usuario_comunidad())) {
                            return Elements::crearMensajeAlerta(Constants::$DELETE_USER_LEAD, "success");
                        }
                    }
                }
            } else {
                // Transferir el liderazgo a otro usuario
                if (Comunidad::setLeaderCommunity($id_comunidad, $usuarioComunidadDTO->getUsuarioDTO()->getId_usuario())) {
                    if (UsuarioComunidad::deleteUserCommunity($usuarioComunidadDTO->getId_usuario_comunidad())) {
                        return Elements::crearMensajeAlerta(Constants::$DELETE_USER_LEAD, "success");
                    }
                }
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

    public static function getBenefitByComunity()
    {
        try {
            $id_usuario = $_SESSION['id'];
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);

            // Si no existe comunidad directamente asociada al usuario, buscar en la tabla UsuarioComunidad
            if (!$comunidadDTO) {
                $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($id_usuario);
                if ($comunidadUsuario) {
                    $comunidadDTO = $comunidadUsuario->getComunidadDTO();
                }
            }

            // Si se encuentra una comunidad asociada
            if ($comunidadDTO) {
                $html = '<div class="mt-3">
                            <h5 class="text-success ms-2">Beneficios</h5>';
                $html .= self::generateBenefitCards($comunidadDTO->getUsuarioDTO()->getId_usuario());
                $usuariosComunidadDTO = UsuarioComunidad::getUserCommunityByCommunity($comunidadDTO->getId_comunidad());
                foreach ($usuariosComunidadDTO as $usuarioComunidad) {
                    $html .= self::generateBenefitCards($usuarioComunidad->getUsuarioDTO()->getId_usuario());
                }
                $html .= '</div>';

                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function generateBenefitCards($id_usuario)
    {
        $html = '';
        $beneficioDTO = Beneficio::listBenefitByUser($id_usuario);

        foreach ($beneficioDTO as $beneficio) {
            $html .= Elements::getCardsBenefitUserCommunity($beneficio->getTitulo(), $beneficio->getCondiciones());
        }

        return $html;
    }
    public static function getInformationByCommunity($id_comunidad)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $count = Usuario::countUsersInCommunity($id_comunidad);
            $ranking = Comunidad::getRankingByCommunity($id_comunidad);
            $comunidadDTO = Comunidad::getCommunity($id_comunidad);
            $puntos = Punto::getSumPointsByUser($comunidadDTO->getUsuarioDTO()->getId_usuario());
            return (object)[
                'nro_usuarios' => $count,
                'total_puntos' => $ranking['total_puntos'] + $puntos,
                'ranking' => $ranking['posicion'],
                'total_comunidades' => $ranking['total_comunidades']
            ];
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableCommunityFilter($id_comunidad, $nombre_comunidad, $nombre_lider, $fecha_inicio, $fecha_fin)
    {
        try {
            $id_comunidad       = parent::limpiarString($id_comunidad);
            $nombre_comunidad   = parent::limpiarString($nombre_comunidad);
            $nombre_lider       = parent::limpiarString($nombre_lider);
            $fecha_inicio       = parent::limpiarString($fecha_inicio);
            $fecha_fin          = parent::limpiarString($fecha_fin);
            $tableHtml = [];

            $sql = '';
            if ($id_comunidad != '') {
                $sql .= sprintf(" AND id_comunidad = %s", $id_comunidad);
            }

            if ($nombre_comunidad != '') {
                $sql .= sprintf(" AND nombre LIKE '%%%s%%'", $nombre_comunidad);
            }

            if ($nombre_lider != '') {
                $sql .= sprintf(" AND id_usuario IN (SELECT id_usuario FROM Usuario WHERE nombre LIKE '%%%s%%')", $nombre_lider);
            }

            if ($fecha_inicio != '') {
                $sql .= sprintf(" AND fecha_registro >= '%s%'", $fecha_inicio);
            }

            if ($fecha_fin != '') {
                $sql .= sprintf(" AND fecha_registro <= '%s%'", $fecha_fin);
            }
            $comunidadDTO = Comunidad::getCommunityByFilter($sql);

            foreach ($comunidadDTO as $valor) {
                $count = Usuario::countUsersInCommunity($valor->getId_comunidad());
                $style = self::getColorByEstate($valor->getEstado()[0]);
                $tableHtml[] = [
                    'Codigo' => $valor->getId_comunidad(),
                    'Nombre' => $valor->getNombre(),
                    'Lider' =>  $valor->getUsuarioDTO()->getNombre(),
                    'Cantidad' => $count,
                    'Estado' => '<small class="alert alert-' . $style . ' p-1">' . $valor->getEstado()[1] . '</small>',
                    'Fecha' => $valor->getFecha_registro(),
                    'Opciones' => Elements::crearBotonVer("community", $valor->getId_comunidad())
                ];
            }

            return json_encode($tableHtml);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
