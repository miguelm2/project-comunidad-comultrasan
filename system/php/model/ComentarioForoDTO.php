<?php

class ComentarioForoDTO
{
    protected $id_comentario;
    protected $foroDTO;
    protected $usuarioDTO;
    protected $comentario;
    protected $fecha_registro;

    /**
     * Get the value of id_comentario
     */
    public function getId_comentario()
    {
        return $this->id_comentario;
    }

    /**
     * Set the value of id_comentario
     *
     * @return  self
     */
    public function setId_comentario($id_comentario)
    {
        $this->id_comentario = $id_comentario;

        return $this;
    }

    /**
     * Get the value of foroDTO
     */
    public function getForoDTO()
    {
        return $this->foroDTO;
    }

    /**
     * Set the value of foroDTO
     *
     * @return  self
     */
    public function setForoDTO($foroDTO)
    {
        $this->foroDTO = $foroDTO;

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
     * Get the value of comentario
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     *
     * @return  self
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

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
