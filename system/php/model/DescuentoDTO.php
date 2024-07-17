<?php

class DescuentoDTO
{
    protected $id_descuento;
    protected $descuento;
    protected $vigencia;
    protected $acceso;
    protected $imagen;
    protected $logo;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_descuento
     */
    public function getId_descuento()
    {
        return $this->id_descuento;
    }

    /**
     * Set the value of id_descuento
     */
    public function setId_descuento($id_descuento)
    {
        $this->id_descuento = $id_descuento;

        return $this;
    }

    /**
     * Get the value of descuento
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set the value of descuento
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get the value of vigencia
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Set the value of vigencia
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;

        return $this;
    }

    /**
     * Get the value of acceso
     */
    public function getAcceso()
    {
        return $this->acceso;
    }

    /**
     * Set the value of acceso
     */
    public function setAcceso($acceso)
    {
        $this->acceso = $acceso;

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
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
}
?>
