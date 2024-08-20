<?php
class MeGustaDTO
{
    protected $id_megusta;
    protected $foroDTO;
    protected $usuarioDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_megusta
     */
    public function getId_megusta()
    {
        return $this->id_megusta;
    }

    /**
     * Set the value of id_megusta
     *
     * @return  self
     */
    public function setId_megusta($id_megusta)
    {
        $this->id_megusta = $id_megusta;

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
