<?php

class ReferidoDTO
{
    protected $id_referido;
    protected $nombre_referido;
    protected $cedula_referido;
    protected $tipo_documento_referido;
    protected $departamento;
    protected $ciudad;
    protected $correo;
    protected $celular;
    protected $nombre_refiere;
    protected $tipo_documento_refiere;
    protected $cedula_refiere;
    protected $estado;
    protected $id_usuario;
    protected $fecha_registro;

    /**
     * Get the value of id_referido
     */ 
    public function getId_referido()
    {
        return $this->id_referido;
    }

    /**
     * Set the value of id_referido
     *
     * @return  self
     */ 
    public function setId_referido($id_referido)
    {
        $this->id_referido = $id_referido;

        return $this;
    }

    /**
     * Get the value of nombre_referido
     */ 
    public function getNombre_referido()
    {
        return $this->nombre_referido;
    }

    /**
     * Set the value of nombre_referido
     *
     * @return  self
     */ 
    public function setNombre_referido($nombre_referido)
    {
        $this->nombre_referido = $nombre_referido;

        return $this;
    }

    /**
     * Get the value of cedula_referido
     */ 
    public function getCedula_referido()
    {
        return $this->cedula_referido;
    }

    /**
     * Set the value of cedula_referido
     *
     * @return  self
     */ 
    public function setCedula_referido($cedula_referido)
    {
        $this->cedula_referido = $cedula_referido;

        return $this;
    }

    /**
     * Get the value of tipo_documento_referido
     */ 
    public function getTipo_documento_referido()
    {
        return $this->tipo_documento_referido;
    }

    /**
     * Set the value of tipo_documento_referido
     *
     * @return  self
     */ 
    public function setTipo_documento_referido($tipo_documento_referido)
    {
        $this->tipo_documento_referido = $tipo_documento_referido;

        return $this;
    }

    /**
     * Get the value of departamento
     */ 
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of departamento
     *
     * @return  self
     */ 
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of celular
     */ 
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */ 
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get the value of nombre_refiere
     */ 
    public function getNombre_refiere()
    {
        return $this->nombre_refiere;
    }

    /**
     * Set the value of nombre_refiere
     *
     * @return  self
     */ 
    public function setNombre_refiere($nombre_refiere)
    {
        $this->nombre_refiere = $nombre_refiere;

        return $this;
    }

    /**
     * Get the value of tipo_documento_refiere
     */ 
    public function getTipo_documento_refiere()
    {
        return $this->tipo_documento_refiere;
    }

    /**
     * Set the value of tipo_documento_refiere
     *
     * @return  self
     */ 
    public function setTipo_documento_refiere($tipo_documento_refiere)
    {
        $this->tipo_documento_refiere = $tipo_documento_refiere;

        return $this;
    }

    /**
     * Get the value of cedula_refiere
     */ 
    public function getCedula_refiere()
    {
        return $this->cedula_refiere;
    }

    /**
     * Set the value of cedula_refiere
     *
     * @return  self
     */ 
    public function setCedula_refiere($cedula_refiere)
    {
        $this->cedula_refiere = $cedula_refiere;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
