<?php 

class UsuarioComunidadDTO
{
    protected $id_usuario_comunidad;
    protected $usuarioDTO;
    protected $comunidadDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_usuario_comunidad
     */ 
    public function getId_usuario_comunidad()
    {
        return $this->id_usuario_comunidad;
    }

    /**
     * Set the value of id_usuario_comunidad
     *
     * @return  self
     */ 
    public function setId_usuario_comunidad($id_usuario_comunidad)
    {
        $this->id_usuario_comunidad = $id_usuario_comunidad;

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
     * Get the value of comunidadDTO
     */ 
    public function getComunidadDTO()
    {
        return $this->comunidadDTO;
    }

    /**
     * Set the value of comunidadDTO
     *
     * @return  self
     */ 
    public function setComunidadDTO($comunidadDTO)
    {
        $this->comunidadDTO = $comunidadDTO;

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