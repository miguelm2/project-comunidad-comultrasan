<?php
class ComunidadDTO
{
    protected $id_comunidad;
    protected $nombre;
    protected $usuarioDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_comunidad
     */
    public function getId_comunidad()
    {
        return $this->id_comunidad;
    }

    /**
     * Set the value of id_comunidad
     *
     * @return  self
     */
    public function setId_comunidad($id_comunidad)
    {
        $this->id_comunidad = $id_comunidad;

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
}
