<?php
class ActividadUsuarioDTO
{
    protected $id_actividad_usuario;
    protected $id_usuario;
    protected $id_actividad;
    protected $fecha_registro;

    /**
     * Get the value of id_actividad_usuario
     */ 
    public function getId_actividad_usuario()
    {
        return $this->id_actividad_usuario;
    }

    /**
     * Set the value of id_actividad_usuario
     *
     * @return  self
     */ 
    public function setId_actividad_usuario($id_actividad_usuario)
    {
        $this->id_actividad_usuario = $id_actividad_usuario;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

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