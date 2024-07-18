<?php
class RespuestaPreguntaDTO
{
    protected $id_respuesta;
    protected $encuestaDTO;
    protected $preguntaDTO;
    protected $respuesta;
    protected $veracidad;
    protected $fecha_registro;

    /**
     * Get the value of id_respuesta
     */ 
    public function getId_respuesta()
    {
        return $this->id_respuesta;
    }

    /**
     * Set the value of id_respuesta
     *
     * @return  self
     */ 
    public function setId_respuesta($id_respuesta)
    {
        $this->id_respuesta = $id_respuesta;

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
     * Get the value of preguntaDTO
     */ 
    public function getPreguntaDTO()
    {
        return $this->preguntaDTO;
    }

    /**
     * Set the value of preguntaDTO
     *
     * @return  self
     */ 
    public function setPreguntaDTO($preguntaDTO)
    {
        $this->preguntaDTO = $preguntaDTO;

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
     *
     * @return  self
     */ 
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get the value of veracidad
     */ 
    public function getVeracidad()
    {
        return $this->veracidad;
    }

    /**
     * Set the value of veracidad
     *
     * @return  self
     */ 
    public function setVeracidad($veracidad)
    {
        $this->veracidad = $veracidad;

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