<?php

class PreguntaFrecuenteDTO
{
    protected $id_pregunta;
    protected $pregunta;
    protected $respuesta;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_pregunta
     */
    public function getId_pregunta()
    {
        return $this->id_pregunta;
    }

    /**
     * Set the value of id_pregunta
     */
    public function setId_pregunta($id_pregunta)
    {
        $this->id_pregunta = $id_pregunta;

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
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    /**
     * Get the value of respuesta
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set the value of respuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

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
