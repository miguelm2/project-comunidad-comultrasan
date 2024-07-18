<?php

class RecompensaDTO
{
    protected $id_recompensa;
    protected $actividad;
    protected $puntos;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_recompenza
     */
    public function getId_recompensa()
    {
        return $this->id_recompensa;
    }

    /**
     * Set the value of id_recompenza
     */
    public function setId_recompensa($id_recompensa)
    {
        $this->id_recompensa = $id_recompensa;

        return $this;
    }

    /**
     * Get the value of actividad
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set the value of actividad
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get the value of puntos
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get the value of fecha_registro
     */
    public function getFecha_registro()
    {
        return $this->fecha_registro;
    }

    /**
     * Set the value of fecha_registro
     */
    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }
}
?>
