<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';

class ServiceCommunity extends System
{
    public static function newCommunity($nombre, $cedula)
    {
        try {
            $id_usuario    = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');
            $nombre = parent::limpiarString($nombre);
            //si la cedula es igual a la del usuario logueado
            if ($_SESSION['cedula'] == $cedula) {
                return Elements::crearMensajeAlerta(Constants::$USER_DIFERENT, "error");
            }
            $usuario = Usuario::getUserByCedula($cedula);
            if (!$usuario) { //Si el asociado no esta regitrado
                return Elements::crearMensajeAlerta(Constants::$USER_NOT_EXIST, "error");
            }
            $usuarioComunidad = UsuarioComunidad::getUserCommunityByUser($usuario->getId_usuario());
            $comunidadLider = Comunidad::getCommunityByUser($usuario->getId_usuario());
            if ($usuarioComunidad || $comunidadLider) { //Si el usuario ya pertenece a una comunidad
                return Elements::crearMensajeAlerta(Constants::$USER_READY_COMMUNITY, "error");
            }
            $result = Comunidad::newCommunity($nombre, $id_usuario, $fecha_registro);
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
            $tableHtml = "";
            $modelResponse = Comunidad::listCommunity();

            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_comunidad() . '</td>';
                    $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td>' . Elements::crearBotonVer("community", $valor->getId_comunidad()) . '</td>';
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
            $total_points = Punto::getSumPointsByCommunity($comunidadDTO->getId_comunidad());
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
            $html .= '</div>
                            <div class="col-md-6">';
            $modelResponse = Usuario::getUsersInCommunity($comunidadDTO->getId_comunidad());
            foreach ($modelResponse as $valor) {
                $btnEliminar = !$isLeader ? '' : Elements::getButtonDeleteModalJs('takeOut', 'Remover', $valor->getId_usuario());
                $html .= Elements::getCardUserInCommunity($valor->getNombre(), $valor->getTelefono(), $btnEliminar);
            }
            $btnSalir = $isLeader ?
                Elements::getButtonDeleteModal('leaveLeader', 'Salir de la comunidad') :
                Elements::getButtonDeleteModal('leave', 'Salir de la comunidad');
            $html .= '</div>
                            <div class="col-md-11">
                                <div class="text-end">
                                ' . $btnSalir . '
                                </div>
                            </div>
                        </div>
                        ';
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
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
            $comunidadDTO = Comunidad::getCommunityByUser($id_usuario);

            if (!$comunidadDTO) {
                return '';
            }

            $isUserCreator = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $id_usuario;
            $buttonHtml = '';

            if ($isUserCreator) {
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
            } else {
                $buttonHtml = '
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-success">Integrantes</h4>
                    </div>
                </div>';
            }
            return $buttonHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardsCommunity()
    {
        try {
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
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setCommunity($id_comunidad, $nombre)
    {
        try {
            $id_comunidad = parent::limpiarString($id_comunidad);
            $nombre = parent::limpiarString($nombre);

            $result = Comunidad::setCommunity($id_comunidad, $nombre);

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
                if (Comunidad::deleteCommunity($id_comunidad)) {
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
}
