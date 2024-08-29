<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';

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
            if (!$usuario) { //Si el asociado no esta regitrado
                Invitacion::newInvitation($_SESSION['id'], $nombre_user, $correo, $celular, $cedula, $fecha_registro);
                $mensaje = "Estimado(a) " . $nombre_user . ",
                            Nos complace informarle que ha sido invitado(a) a unirse a nuestra aplicación, 
                            como parte de la comunidad " . $nombre . ", creada por " . $_SESSION['nombre'] . ".<br><br>
                            Para aceptar la invitación y disfrutar de los beneficios que ofrece nuestra plataforma, 
                            le invitamos a registrarse en el siguiente enlace: " . self::getURL() . "/singup .<br><br>
                            Agradecemos su interés y esperamos contar con su valiosa participación.<br><br>
                            Atentamente,<br>
                            Financiera Comultrasan";
                $asunto = "Invitación a unirse a nuestra plataforma y comunidad";
                Mail::sendEmail($asunto, $mensaje, $correo);

                return Elements::crearMensajeAlerta(Constants::$USER_NOT_EXIST, "error");
            }
            $usuarioComunidad = UsuarioComunidad::getUserCommunityByUser($usuario->getId_usuario());
            $comunidadLider = Comunidad::getCommunityByUser($usuario->getId_usuario());
            if ($usuarioComunidad || $comunidadLider) { //Si el usuario ya pertenece a una comunidad
                return Elements::crearMensajeAlerta(Constants::$USER_READY_COMMUNITY, "error");
            }
            $result = Comunidad::newCommunity($nombre, $id_usuario, $estado, $fecha_registro);
            if ($result) {
                $comunidad = Comunidad::getLastCommunity();
                if ($comunidad) {
                    UsuarioComunidad::newUserCommunity(
                        $usuario->getId_usuario(),
                        $comunidad->getId_comunidad(),
                        2,
                        $fecha_registro
                    );
                }
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
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
            if (basename($_SERVER['PHP_SELF']) == 'communities.php') {
                $tableHtml = "";
                $modelResponse = Comunidad::listCommunity();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $style = self::getColorByEstate($valor->getEstado()[0]);
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_comunidad() . '</td>';
                        $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                        $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                        $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1 text-white">' . $valor->getEstado()[1] . '</small></td>';
                        $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("community", $valor->getId_comunidad()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableCommunityIndex()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {
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
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getUnitedCommunity()
    {
        if (basename($_SERVER['PHP_SELF']) == 'community.php') {
            try {
                $id_usuario = $_SESSION['id'];
                $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);
                if (!$comunidadDTO) {
                    return Elements::getUnitedCommunity();
                }
                $isLeader = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $_SESSION['id'];
                $html = '<div class="row">
                            <div class="col-md-5">
                            ';
                $count = Usuario::countUsersInCommunity($comunidadDTO->getId_comunidad());
                $fecha = self::getDateInWords($comunidadDTO->getFecha_registro());
                $total_points = Punto::getSumPointsByUser($comunidadDTO->getUsuarioDTO()->getId_usuario());
                $total_points += Punto::getSumPointsByCommunity($comunidadDTO->getId_comunidad());
                $btnEditar = $isLeader ? Elements::getButtonEditModalJs(
                    'editName',
                    'Editar',
                    $comunidadDTO->getId_comunidad(),
                    $comunidadDTO->getNombre()
                ) : '';
                $html .= Elements::getUnitedCommunityReady(
                    $comunidadDTO->getNombre(),
                    $comunidadDTO->getUsuarioDTO()->getNombre(),
                    $count,
                    $fecha,
                    $comunidadDTO->getId_comunidad(),
                    $total_points,
                    $btnEditar
                );
                $html .= '</div><div class="col-md-6">';
                $modelResponse = Usuario::getUsersInCommunity($comunidadDTO->getId_comunidad());
                foreach ($modelResponse as $valor) {
                    $btnEliminar = !$isLeader ? '' : Elements::getButtonDeleteModalJs('takeOut', 'Remover', $valor->getId_usuario());
                    $points = '';
                    if ($isLeader) {
                        $count = Punto::getSumPointsByUser($valor->getId_usuario());
                        $points .= '<i class="material-icons me-2">favorite</i>Total: ' . $count;
                    }
                    $html .= Elements::getCardUserInCommunity($valor->getNombre(), $btnEliminar, $points);
                }
                $html .= self::getBenefitByComunity();
                $btnSalir = $isLeader ?
                    Elements::getButtonDeleteModal('leaveLeader', 'Salir de la comunidad') :
                    Elements::getButtonDeleteModal('leave', 'Salir de la comunidad');
                $ranking = Comunidad::getRankingByCommunity($comunidadDTO->getId_comunidad());
                $html .= self::getHtmlCards($btnSalir, $total_points, $ranking['posicion'], $ranking['total_comunidades']);
                $modelResponse = Usuario::getUsersInCommunity($comunidadDTO->getId_comunidad());
                $contador = 1;
                foreach ($modelResponse as $valor) {
                    $points = '';
                    if ($_SESSION['id'] == $valor->getId_usuario() || $isLeader) {
                        $count = Punto::getSumPointsByUser($valor->getId_usuario());
                        $points .= '' . $count;
                    }
                    $html .= Elements::getCardUserInCommunityRanking($valor->getNombre(), $valor->getImagen(), $points, $contador);
                    $contador++;
                }
                $html .= self::getCardsExplApre();
                return $html;
            } catch (\Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
    private static function getHtmlCards($btnSalir, $total_points, $posicion, $comunidades)
    {
        return  '</div>
                    <div class="col-md-11">
                        <div class="text-end">
                        ' . $btnSalir . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-2 mt-2 pb-3">
                <div class="card-head mt-2 ms-2">
                    <h5 class="text-success">Reconocemos tus logros y los de tu comunidad</h5>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <p class="ms-3 text-black">
                            En la Comunidad Comultrasan, premiamos tu lealtad y compromiso con beneficios 
                            exclusivos. Valoramos tu participación y queremos ofrecerte una experiencia 
                            enriquecedora y memorable. Tú y tu comunidad pueden crecer, aprender y obtener 
                            recompensas alcanzando los retos que nuestra comunidad propone en estos dos pilares. 
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#exploraYaprende">
                                    <div class="card border-2 ms-2">
                                        <div class="card-head">
                                            <h5 class="text-success ms-3 mt-2">Explora y aprende</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                Acumula corazones al completar actividades educativas en nuestra 
                                                plataforma. Mejora tu educación financiera y canjea corazones 
                                                por beneficios.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#invitaYgana">
                                    <div class="card border-2">
                                        <div class="card-head">
                                            <h5 class="text-success ms-3 mt-2">Invita y gana</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                Gana corazones haciendo crecer la comunidad e incrementando tus saldos. 
                                                Valorizamos y recompensamos tu esfuerzo.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border-2" style="background: #58B9AB">
                            <div class="card-head mt-2">
                                <h5 class="text-success text-center">Tabla de recompensas</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="card border-2 text-black text-center">
                                    <h6> Mi comunidad ' . $total_points . ' &#10084;</h6>
                                </div>
                                <div class="card border-2 text-black text-center mt-2">
                                    <h6> Ranking ' . $posicion . ' de '. $comunidades .'</h6>
                                </div>
                ';
    }
    public static function getCardsExplApre()
    {
        $html = '</div></div></div></div></div>
                <div class="card mt-2 border-2" id="exploraYaprende">
                    <div class="card-head">
                        <h5 class="text-success ms-3 mt-2">Explora y Aprende</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                            <div class="col-md-3">
                                <div class="card border-2 h-100">
                                    <img src="/assets/img/comunidad/comunida_creada.png" alt="Comunidad" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Crea tu comunidad</h6>
                                        <p class=" ms-2">
                                            Crea tu comunidad y comparte tus retos y recompensas con tus personas más especiales
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-2 h-100">
                                    <img src="/assets/img/comunidad/completar_perfil.png" alt="Perfil" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Completar tu perfil</h6>
                                        <p class=" ms-2">
                                            Completa tu perfil y empieza a acumular corazones. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-2 h-100">
                                    <img src="/assets/img/comunidad/gustos.png" alt="Gustos" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Cuéntanos tus gustos e intereses</h6>
                                        <p class=" ms-2">
                                            Permítenos conocerte mejor para diseñar experiencias para ti y tu comunidad. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-2 h-100">
                                    <img src="/assets/img/comunidad/reto.png" alt="Reto" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Reto Educación Financiera</h6>
                                        <p class=" ms-2">
                                            Fortalece tus conocimientos y gana más &#10084;
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card border-2 h-100">
                                    <img src="/assets/img/comunidad/trivia.png" alt="Trivia" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Trivia de economía solidaria</h6>
                                        <p class=" ms-2">
                                            Conoce el fascinante mundo solidario y sigue ganando recompensas. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card border-2">
                                    <img src="/assets/img/comunidad/recompensas.png" alt="Recompensas" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Trivia de programa de recompensas</h6>
                                        <p class=" ms-2">
                                            Conoce el fascinante mundo solidario y sigue ganando recompensas. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card border-2">
                                    <img src="/assets/img/comunidad/programa_referidos.png" alt="Refereidos" class="img-fluid rounded-2">
                                    <div class="card-body">
                                        <h6 class="text-success text-center">Trivia de programa de referidos</h6>
                                        <p class=" ms-2">
                                            Conoce el fascinante mundo solidario y sigue ganando recompensas. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 border-2 tamano_card" id="invitaYgana">
                    <div class="card-head">
                        <h5 class="text-success ms-3 mt-2">Invita y Gana</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                            <div class="col-md-3">
                                <div class="card-flip">
                                    <div class="card border-2 h-100">
                                        <div class="card-front">
                                            <img src="/assets/img/comunidad/nuevo_miembro.png" alt="NuevoMiembros" class="img-fluid rounded-2">
                                            <h6 class="text-success text-center">Nuevos miembros en la Comunidad</h6>
                                            <p class="ms-2">
                                                Invita a otros a que disfruten de los beneficios de la comunidad.
                                            </p>
                                        </div>
                                        <div class="card-back">
                                            <h6 class="text-center">Nuevos miembros en la comunidad</h6>
                                            <p class="ms-2">
                                                Tus nuevos miembros pueden ser:
                                                <ul class="text-black">
                                                    <li>
                                                        Asociado   -  5
                                                    </li>
                                                    <li>
                                                        Nuevo asociado   -  10
                                                    </li>
                                                    <li>
                                                        Nueva comunidad familiar  (A)   - 10
                                                    </li>
                                                    <li>
                                                        Nueva comunidad familiar  (NA) - 20
                                                    </li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-flip">
                                    <div class="card border-2 h-100">
                                        <div class="card-front">
                                            <img src="/assets/img/comunidad/datos_dia.png" alt="Datos" class="img-fluid rounded-2">
                                            <h6 class="text-success text-center">Datos al día</h6>
                                            <p class=" ms-2">
                                                Actualiza tus datos para que no perdamos contacto.
                                            </p>
                                        </div>
                                        <div class="card-back">
                                            <h6 class="text-center">Datos al día</h6>
                                            <p class="ms-2">
                                                Tu actualización de datos puedes hacerla semestralmente así:
                                                <ul class="text-black">
                                                    <li>
                                                        Agencias, campaña Contact Center  - 5
                                                    </li>
                                                    <li>
                                                        Autogestión con Agencia virtual, Contact Center, Fibot   -  8
                                                    </li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-flip">
                                    <div class="card border-2 h-100">
                                        <div class="card-front">
                                            <img src="/assets/img/comunidad/productos.png" alt="Productos" class="img-fluid rounded-2">
                                            <h6 class="text-success text-center">Tus productos financieros</h6>
                                            <p class=" ms-2">
                                                Incluye nuevos productos a tu portafolio y moviliza los existentes 
                                            </p>
                                        </div>
                                        <div class="card-back">
                                            <h6 class="text-center">Tus productos financieros</h6>
                                            <p class="ms-2">
                                                Puedes incluir o movilizar tus productos así:
                                                <ul class="text-black">
                                                    <li>
                                                        Apertura PAP  - 10
                                                    </li>
                                                    <li>
                                                        Constitución CDAT  - 10
                                                    </li>
                                                    <li>
                                                        Adquisición tarjeta de crédito   -  10
                                                    </li>
                                                    <li>
                                                        Compras y avances en comercios nacionales e internacionales 
                                                        $500.000  - 1 por cada $500.000
                                                    </li>
                                                    <li>
                                                        Incremento saldos en PAP a partir de $50.000 -  1 por cada $50.000
                                                    </li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-flip">
                                    <div class="card border-2 h-100">
                                        <div class="card-front">
                                            <img src="/assets/img/comunidad/referidos_efectivos.png" alt="Referidos_efecrivos" class="img-fluid rounded-2">
                                            <h6 class="text-success text-center">Referidos efectivos</h6>
                                            <p class=" ms-2">
                                                Cuéntale a otros lo feliz que te sientes de estar aquí
                                            </p>
                                        </div>
                                        <div class="card-back">
                                            <h6 class="text-center">Programa de referidos</h6>
                                            <p class="ms-2">
                                                Comparte beneficios con los que más quieres así:
                                                <ul class="text-black">
                                                    <li>
                                                        Desembolso de crédito – ver tabla
                                                    </li>
                                                    <li>
                                                        Constitución CDAT – ver tabla 
                                                    </li>
                                                    <li>
                                                        Adquisición tarjeta de crédito   -  10
                                                    </li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
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
            if (basename($_SERVER['PHP_SELF']) == 'community.php') {
                $id_usuario = $_SESSION['id'];
                $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);

                if (!$comunidadDTO) {
                    return '';
                }

                $buttonHtml = '
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-success">Integrantes</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserComm">
                            <i class="material-icons me-2">add</i> Agregar Integrante
                        </button>
                    </div>
                </div>';

                return $buttonHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardsCommunity()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'allCommunities.php') {
                $html = "";
                $modelResponse = Comunidad::listCommunity();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $fecha = self::getDateInWords($valor->getFecha_registro());
                        $count = Usuario::countUsersInCommunity($valor->getId_comunidad());
                        $html .= Elements::getCardCommunity(
                            $valor->getNombre(),
                            $valor->getUsuarioDTO()->getNombre(),
                            $fecha,
                            $count,
                            $valor->getId_comunidad()
                        );
                    }
                } else {
                    return '<div class="text-center">
                            <h4>No hay comunidades disponibles</h4>
                        </div>';
                }
                return $html;
            }
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
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
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

            if ($count < 2) {
                // Si hay menos de 2 usuarios, eliminar la comunidad
                if (Comunidad::setCommunityEstate($id_comunidad, 0)) {
                    UsuarioComunidad::deleteUserCommunityByCommunity($id_comunidad);
                    return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
                }
            } else {
                // Si hay más de un usuario, transferir el liderazgo
                $usuarioComunidadDTO = UsuarioComunidad::getOnlyUserCommunityByCommunity($id_comunidad);
                if ($usuarioComunidadDTO && Comunidad::setLeaderCommunity(
                    $id_comunidad,
                    $usuarioComunidadDTO->getUsuarioDTO()->getId_usuario()
                )) {
                    // Eliminar al antiguo líder de la comunidad
                    if (UsuarioComunidad::deleteUserCommunity($usuarioComunidadDTO->getId_usuario_comunidad())) {
                        return Elements::crearMensajeAlerta(Constants::$DELETE_USER_COM, "success");
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
                            <h5 class="text-success">Beneficios</h5>';
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
            $html .= Elements::getCardsBenefitUser($beneficio->getTitulo());
        }

        return $html;
    }
}
