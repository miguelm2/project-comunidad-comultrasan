<?php

class TipoComunidadDTO
{
    protected $id_tipo_comunidad;
    protected $titulo;
    protected $icono;
    protected $subtitulo;
    protected $contenido;
    protected $imagen;
    protected $fecha_registro;

    public function __construct()
    {
    }

    /**
     * Get the value of id_tipo_comunidad
     */
    public function getId_tipo_comunidad()
    {
        return $this->id_tipo_comunidad;
    }

    /**
     * Set the value of id_tipo_comunidad
     */
    public function setId_tipo_comunidad($id_tipo_comunidad)
    {
        $this->id_tipo_comunidad = $id_tipo_comunidad;

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
     * Get the value of icono
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * Set the value of icono
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

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
