<?php
class UsuarioBeneficioDTO
{
    protected $id_usuario_beneficio;
    protected $usuarioDTO;
    protected $beneficioDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_usuario_beneficio
     */
    public function getId_usuario_beneficio()
    {
        return $this->id_usuario_beneficio;
    }

    /**
     * Set the value of id_usuario_beneficio
     *
     * @return  self
     */
    public function setId_usuario_beneficio($id_usuario_beneficio)
    {
        $this->id_usuario_beneficio = $id_usuario_beneficio;

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
     * Get the value of beneficioDTO
     */
    public function getBeneficioDTO()
    {
        return $this->beneficioDTO;
    }

    /**
     * Set the value of beneficioDTO
     *
     * @return  self
     */
    public function setBeneficioDTO($beneficioDTO)
    {
        $this->beneficioDTO = $beneficioDTO;

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