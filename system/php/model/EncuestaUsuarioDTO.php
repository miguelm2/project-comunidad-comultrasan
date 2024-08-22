<?php

class EncuestaUsuarioDTO
{
    protected $id_encuesta_usuario;
    protected $id_usuario;
    protected $id_encuesta;
    protected $fecha_registro;

    /**
     * Get the value of id_encuesta_usuario
     */ 
    public function getId_encuesta_usuario()
    {
        return $this->id_encuesta_usuario;
    }

    /**
     * Set the value of id_encuesta_usuario
     *
     * @return  self
     */ 
    public function setId_encuesta_usuario($id_encuesta_usuario)
    {
        $this->id_encuesta_usuario = $id_encuesta_usuario;

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
     * Get the value of id_encuesta
     */ 
    public function getId_encuesta()
    {
        return $this->id_encuesta;
    }

    /**
     * Set the value of id_encuesta
     *
     * @return  self
     */ 
    public function setId_encuesta($id_encuesta)
    {
        $this->id_encuesta = $id_encuesta;

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