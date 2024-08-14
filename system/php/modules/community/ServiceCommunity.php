<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Comunidad.php';

class ServiceCommunity extends System
{
    public static function newCommunity($nombre)
    {
        try {
            $id_usuario    = $_SESSION['id'];
            $fecha_registro = date('Y-m-d H:i:s');
            $nombre = parent::limpiarString($nombre);

            $result = Comunidad::newCommunity($nombre, $id_usuario, $fecha_registro);

            if ($result) {
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
            } else {
                $html = '<div class="row">
                            <div class="col-md-5">
                            ';
                $count = Usuario::countUsersInCommunity($comunidadDTO->getId_comunidad());
                $fecha = self::getDateInWords($comunidadDTO->getFecha_registro());
                $html .= Elements::getUnitedCommunityReady(
                    $comunidadDTO->getNombre(),
                    $comunidadDTO->getUsuarioDTO()->getNombre(),
                    $count,
                    $fecha,
                    $comunidadDTO->getId_comunidad(),
                    10
                );
                $html .= '</div>
                            <div class="col-md-6">';
                $modelResponse = Usuario::getUsersInCommunity($comunidadDTO->getId_comunidad());
                $isLeader = $comunidadDTO->getUsuarioDTO()->getId_usuario() == $_SESSION['id'];
                foreach ($modelResponse as $valor) {
                    $btnEliminar = (!$isLeader) ? '' : Elements::getButtonDeleteModalJs('takeOut', 'Remover', $valor->getId_usuario());
                    $html .= Elements::getCardUserInCommunity($valor->getNombre(), $valor->getTelefono(), $btnEliminar);
                }
                $html .= '</div>
                            <div class="col-md-11">
                                <div class="text-end">
                                ' . Elements::getButtonDeleteModal('leave', 'Salir de la comunidad') . '
                                </div>
                            </div>
                        </div>
                        ';
                return $html;
            }
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
        $formatter = new IntlDateFormatter(
            'es_ES',
            IntlDateFormatter::LONG, // Estilo largo para la fecha
            IntlDateFormatter::NONE // No mostrar la hora
        );
        return $formatter->format($fechaBD);
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
                    $html .= Elements::getCardCommunty(
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
}
