<?php

class UsuarioGrupoInteresDTO
{
    protected $id_usuario_grupo;
    protected $usuarioDTO;
    protected $tipoComunidadDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_usuario_grupo
     */
    public function getId_usuario_grupo()
    {
        return $this->id_usuario_grupo;
    }

    /**
     * Set the value of id_usuario_grupo
     *
     * @return  self
     */
    public function setId_usuario_grupo($id_usuario_grupo)
    {
        $this->id_usuario_grupo = $id_usuario_grupo;

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
     * Get the value of tipoComunidadDTO
     */
    public function getTipoComunidadDTO()
    {
        return $this->tipoComunidadDTO;
    }

    /**
     * Set the value of tipoComunidadDTO
     *
     * @return  self
     */
    public function setTipoComunidadDTO($tipoComunidadDTO)
    {
        $this->tipoComunidadDTO = $tipoComunidadDTO;

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
