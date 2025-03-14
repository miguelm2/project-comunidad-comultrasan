<?php

class ForoDTO
{
    protected $id_foro;
    protected $tipoComunidadDTO;
    protected $usuarioDTO;
    protected $contenido;
    protected $titulo;
    protected $fecha_registro;

    /**
     * Get the value of id_foro
     */ 
    public function getId_foro()
    {
        return $this->id_foro;
    }

    /**
     * Set the value of id_foro
     *
     * @return  self
     */ 
    public function setId_foro($id_foro)
    {
        $this->id_foro = $id_foro;

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
     * Get the value of contenido
     */ 
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set the value of contenido
     *
     * @return  self
     */ 
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

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

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}