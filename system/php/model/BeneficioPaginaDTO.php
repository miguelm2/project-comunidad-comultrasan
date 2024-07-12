<?php

class BeneficioPaginaDTO
{
    protected $id_beneficios_pagina;
    protected $titulo;
    protected $subtitulo;
    protected $contenido;
    protected $requisitos;
    protected $imagen;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_beneficios_pagina
     */
    public function getId_beneficios_pagina()
    {
        return $this->id_beneficios_pagina;
    }

    /**
     * Set the value of id_beneficios_pagina
     */
    public function setId_beneficios_pagina($id_beneficios_pagina)
    {
        $this->id_beneficios_pagina = $id_beneficios_pagina;

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
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of subtitulo
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * Set the value of subtitulo
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;

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
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get the value of requisitos
     */
    public function getRequisitos()
    {
        return $this->requisitos;
    }

    /**
     * Set the value of requisitos
     */
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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
