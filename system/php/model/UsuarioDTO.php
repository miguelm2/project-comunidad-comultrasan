<?php

class UsuarioDTO
{
    protected $id_usuario;
    protected $nombre;
    protected $correo;
    protected $cedula;
    protected $pass;
    protected $estado;
    protected $tipo;
    protected $imagen;
    protected $tipo_documento;
    protected $fecha_registro;

    public function __construct() {}

    /**
     * Get the value of id_usuario
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     */
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

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
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of cedula
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        if ($this->estado == 0) return explode(";", $this->estado . ';Inactivo');
        if ($this->estado == 1) return explode(";", $this->estado . ';Activo');
        if ($this->estado == 2) return explode(";", $this->estado . ';En proceso');
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

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

    /**
     * Get the value of tipo_documento
     */
    public function getTipo_documento()
    {
        if ($this->tipo_documento == 1) return explode(";", $this->tipo_documento . ';Cédula de ciudadanía');
        if ($this->tipo_documento == 2) return explode(";", $this->tipo_documento . ';Tarjeta de identidad');
        if ($this->tipo_documento == 3) return explode(";", $this->tipo_documento . ';Cédula de extranjería');
        if ($this->tipo_documento == 4) return explode(";", $this->tipo_documento . ';Pasaporte');
        return $this->tipo_documento;
    }

    /**
     * Set the value of tipo_documento
     *
     * @return  self
     */
    public function setTipo_documento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }
}
