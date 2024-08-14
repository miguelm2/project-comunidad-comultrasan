<?php

class ComunidadGrupoInteresDTO
{
    protected $id_comunidad_grupo;
    protected $comunidadDTO;
    protected $tipoComunidadDTO;
    protected $fecha_registro;
    

    /**
     * Get the value of id_comunidad_grupo
     */ 
    public function getId_comunidad_grupo()
    {
        return $this->id_comunidad_grupo;
    }

    /**
     * Set the value of id_comunidad_grupo
     *
     * @return  self
     */ 
    public function setId_comunidad_grupo($id_comunidad_grupo)
    {
        $this->id_comunidad_grupo = $id_comunidad_grupo;

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
}