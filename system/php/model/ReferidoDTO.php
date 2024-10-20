<?php

class ReferidoDTO
{
    protected $id_referido;
    protected $nombre_referido;
    protected $cedula_referido;
    protected $tipo_documento_referido;
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
        if ($this->tipo_documento_referido == 1) return explode(";", $this->tipo_documento_referido . ';Cédula de ciudadanía');
        if ($this->tipo_documento_referido == 2) return explode(";", $this->tipo_documento_referido . ';Tarjeta de identidad');
        if ($this->tipo_documento_referido == 3) return explode(";", $this->tipo_documento_referido . ';Cédula de extranjería');
        if ($this->tipo_documento_referido == 4) return explode(";", $this->tipo_documento_referido . ';Pasaporte');
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
        if ($this->tipo_documento_refiere == 1) return explode(";", $this->tipo_documento_refiere . ';Cédula de ciudadanía');
        if ($this->tipo_documento_refiere == 2) return explode(";", $this->tipo_documento_refiere . ';Tarjeta de identidad');
        if ($this->tipo_documento_refiere == 3) return explode(";", $this->tipo_documento_refiere . ';Cédula de extranjería');
        if ($this->tipo_documento_refiere == 4) return explode(";", $this->tipo_documento_refiere . ';Pasaporte');
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
        if ($this->estado == 1) return explode(";", $this->estado . ';Inscrito');
        if ($this->estado == 2) return explode(";", $this->estado . ';Aprobado');
        if ($this->estado == 3) return explode(";", $this->estado . ';En proceso');
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
