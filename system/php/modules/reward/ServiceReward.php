<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Recompensa.php';

class ServiceReward extends System
{
    public static function newReward($actividad, $puntos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'rewards.php') {
                $actividad         = parent::limpiarString($actividad);
                $puntos         = parent::limpiarString($puntos);
                $fecha_registro = date('Y-m-d H:i:s');

                $result = Recompensa::newReward($actividad, $puntos, $fecha_registro);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setReward($id_recompensa, $actividad, $puntos)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'reward.php') {
                $id_recompensa  = parent::limpiarString($id_recompensa);
                $actividad      = parent::limpiarString($actividad);
                $puntos         = parent::limpiarString($puntos);

                $result = Recompensa::setReward($id_recompensa, $actividad, $puntos);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getReward($id_recompensa)
    {
        try {
            $id_recompensa = parent::limpiarString($id_recompensa);

            $result = Recompensa::getReward($id_recompensa);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteReward($id_recompensa)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'reward.php') {
                $id_recompensa = parent::limpiarString($id_recompensa);

                $result = Recompensa::deleteReward($id_recompensa);
                if ($result) header('Location:Rewards?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableReward()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'rewards.php') {
                $tableHtml = "";
                $modelResponse = Recompensa::listReward();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getid_recompensa() . '</td>';
                        $tableHtml .= '<td>' . $valor->getActividad() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPuntos() . '</td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("reward", $valor->getid_recompensa()) . '</td>';
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
}
