<?php

class PreguntaEncuestaDTO
{
    protected $id_pregunta;
    protected $encuestaDTO;
    protected $pregunta;
    protected $estado;
    protected $imagen;
    protected $fecha_registro;


    /**
     * Get the value of id_pregunta
     */
    public function getId_pregunta()
    {
        return $this->id_pregunta;
    }

    /**
     * Set the value of id_pregunta
     *
     * @return  self
     */
    public function setId_pregunta($id_pregunta)
    {
        $this->id_pregunta = $id_pregunta;

        return $this;
    }

    /**
     * Get the value of encuestaDTO
     */
    public function getEncuestaDTO()
    {
        return $this->encuestaDTO;
    }

    /**
     * Set the value of encuestaDTO
     *
     * @return  self
     */
    public function setEncuestaDTO($encuestaDTO)
    {
        $this->encuestaDTO = $encuestaDTO;

        return $this;
    }

    /**
     * Get the value of pregunta
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * Set the value of pregunta
     *
     * @return  self
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Activo');
        if ($this->estado == 0) return explode(";", $this->estado . ';Inactivo');
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