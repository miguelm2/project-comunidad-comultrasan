<?php

class PuntoDTO
{
    protected $id_punto;
    protected $puntos;
    protected $usuarioDTO;
    protected $administradorDTO;
    protected $descripcion;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_punto
     */
    public function getId_punto()
    {
        return $this->id_punto;
    }

    /**
     * Set the value of id_punto
     */
    public function setId_punto($id_punto)
    {
        $this->id_punto = $id_punto;

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
     * Get the value of usuarioDTO
     */ 
    public function getUsuarioDTO()
    {
        return $this->usuarioDTO;
    }

    /**
     * Set the value of usuarioDTO
     *
     * @return  self
     */ 
    public function setUsuarioDTO($usuarioDTO)
    {
        $this->usuarioDTO = $usuarioDTO;

        return $this;
    }

    /**
     * Get the value of administradorDTO
     */ 
    public function getAdministradorDTO()
    {
        return $this->administradorDTO;
    }

    /**
     * Set the value of administradorDTO
     *
     * @return  self
     */ 
    public function setAdministradorDTO($administradorDTO)
    {
        $this->administradorDTO = $administradorDTO;

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

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
