<?php

class BeneficioDTO
{
    protected $id_beneficio;
    protected $titulo;
    protected $descripcion;
    protected $puntos;
    protected $imagen;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_beneficio
     */
    public function getId_beneficio()
    {
        return $this->id_beneficio;
    }

    /**
     * Set the value of id_beneficio
     */
    public function setId_beneficio($id_beneficio)
    {
        $this->id_beneficio = $id_beneficio;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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