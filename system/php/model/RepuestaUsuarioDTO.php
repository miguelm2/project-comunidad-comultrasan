<?php
class RepuestaUsuarioDTO
{
    protected $id_respuesta_usuario;
    protected $usuarioDTO;
    protected $encuestaDTO;
    protected $preguntaDTO;
    protected $respuestaDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_respuesta_usuario
     */
    public function getId_respuesta_usuario()
    {
        return $this->id_respuesta_usuario;
    }

    /**
     * Set the value of id_respuesta_usuario
     *
     * @return  self
     */
    public function setId_respuesta_usuario($id_respuesta_usuario)
    {
        $this->id_respuesta_usuario = $id_respuesta_usuario;

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
     * Get the value of respuestaDTO
     */
    public function getRespuestaDTO()
    {
        return $this->respuestaDTO;
    }

    /**
     * Set the value of respuestaDTO
     *
     * @return  self
     */
    public function setRespuestaDTO($respuestaDTO)
    {
        $this->respuestaDTO = $respuestaDTO;

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
