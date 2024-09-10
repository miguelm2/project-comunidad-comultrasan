<?php
class CalendarioEventoDTO
{
    protected $id_evento;
    protected $id_grupo;
    protected $titulo;
    protected $fecha;
    protected $lugar;
    protected $hora;
    protected $imagen;
    protected $persona_cargo;
    protected $fecha_registro;

    /**
     * Get the value of id_evento
     */
    public function getId_evento()
    {
        return $this->id_evento;
    }

    /**
     * Set the value of id_evento
     *
     * @return  self
     */
    public function setId_evento($id_evento)
    {
        $this->id_evento = $id_evento;

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

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set the value of lugar
     *
     * @return  self
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

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
     *
     * @return  self
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
     *
     * @return  self
     */
    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    /**
     * Get the value of persona_cargo
     */ 
    public function getPersona_cargo()
    {
        return $this->persona_cargo;
    }

    /**
     * Set the value of persona_cargo
     *
     * @return  self
     */ 
    public function setPersona_cargo($persona_cargo)
    {
        $this->persona_cargo = $persona_cargo;

        return $this;
    }

    /**
     * Get the value of id_grupo
     */ 
    public function getId_grupo()
    {
        return $this->id_grupo;
    }

    /**
     * Set the value of id_grupo
     *
     * @return  self
     */ 
    public function setId_grupo($id_grupo)
    {
        $this->id_grupo = $id_grupo;

        return $this;
    }
}
