<?php 

class HistorialInformacionDTO
{
    protected $id_historial;
    protected $id_usuario;
    protected $fecha_registro;

    /**
     * Get the value of id_historial
     */ 
    public function getId_historial()
    {
        return $this->id_historial;
    }

    /**
     * Set the value of id_historial
     *
     * @return  self
     */ 
    public function setId_historial($id_historial)
    {
        $this->id_historial = $id_historial;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

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