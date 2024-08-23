<?php
class SeccionTipoComunidadDTO
{
    protected $id_seccion;
    protected $id_tipo_comunidad;
    protected $nombre;
    protected $descripcion;
    protected $imagen;
    protected $fecha_registro;

    /**
     * Get the value of id_seccion
     */
    public function getId_seccion()
    {
        return $this->id_seccion;
    }

    /**
     * Set the value of id_seccion
     *
     * @return  self
     */
    public function setId_seccion($id_seccion)
    {
        $this->id_seccion = $id_seccion;

        return $this;
    }

    /**
     * Get the value of id_tipo_comunidad
     */
    public function getId_tipo_comunidad()
    {
        return $this->id_tipo_comunidad;
    }

    /**
     * Set the value of id_tipo_comunidad
     *
     * @return  self
     */
    public function setId_tipo_comunidad($id_tipo_comunidad)
    {
        $this->id_tipo_comunidad = $id_tipo_comunidad;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
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
     *
     * @return  self
     */
    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }
}
