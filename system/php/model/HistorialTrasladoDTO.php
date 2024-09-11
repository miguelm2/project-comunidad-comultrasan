<?php
class HistorialTrasladoDTO
{
    protected $id_historial;
    protected $id_usuario;
    protected $id_administrador;
    protected $id_comunidad_antigua;
    protected $id_comunidad_nueva;
    protected $fecha_registro;

    /**
     * Get the value of id_historial
     */
    public function getId_historial()
    {
        return $this->id_historial;
    }

    /**
     * Set the value of id_historial
     *
     * @return  self
     */
    public function setId_historial($id_historial)
    {
        $this->id_historial = $id_historial;

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
     * Get the value of id_administrador
     */
    public function getId_administrador()
    {
        return $this->id_administrador;
    }

    /**
     * Set the value of id_administrador
     *
     * @return  self
     */
    public function setId_administrador($id_administrador)
    {
        $this->id_administrador = $id_administrador;

        return $this;
    }

    /**
     * Get the value of id_comunidad_antigua
     */
    public function getId_comunidad_antigua()
    {
        return $this->id_comunidad_antigua;
    }

    /**
     * Set the value of id_comunidad_antigua
     *
     * @return  self
     */
    public function setId_comunidad_antigua($id_comunidad_antigua)
    {
        $this->id_comunidad_antigua = $id_comunidad_antigua;

        return $this;
    }

    /**
     * Get the value of id_comunidad_nueva
     */
    public function getId_comunidad_nueva()
    {
        return $this->id_comunidad_nueva;
    }

    /**
     * Set the value of id_comunidad_nueva
     *
     * @return  self
     */
    public function setId_comunidad_nueva($id_comunidad_nueva)
    {
        $this->id_comunidad_nueva = $id_comunidad_nueva;

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
