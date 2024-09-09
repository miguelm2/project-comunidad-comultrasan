<?php
class ActividadDTO
{
    protected $id_actividad;
    protected $actividad;
    protected $fecha_registro;

    /**
     * Get the value of id_actividad
     */ 
    public function getId_actividad()
    {
        return $this->id_actividad;
    }

    /**
     * Set the value of id_actividad
     *
     * @return  self
     */ 
    public function setId_actividad($id_actividad)
    {
        $this->id_actividad = $id_actividad;

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
     *
     * @return  self
     */ 
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

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
     *
     * @return  self
     */ 
    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }
}