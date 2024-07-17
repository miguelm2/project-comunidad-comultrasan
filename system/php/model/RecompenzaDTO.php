<?php

class RecompenzaDTO
{
    protected $id_recompenza;
    protected $actividad;
    protected $costo;
    protected $puntos;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_recompenza
     */
    public function getId_recompenza()
    {
        return $this->id_recompenza;
    }

    /**
     * Set the value of id_recompenza
     */
    public function setId_recompenza($id_recompenza)
    {
        $this->id_recompenza = $id_recompenza;

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
     * Get the value of costo
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set the value of costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

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
