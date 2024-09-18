<?php
class CodigoOTPDTO
{
   protected $id_codigo;
   protected $id_usuario;
   protected $codigo;
   protected $tiempo;
   protected $estado;
   protected $fecha_registro;

   /**
    * Get the value of id_codigo
    */
   public function getId_codigo()
   {
      return $this->id_codigo;
   }

   /**
    * Set the value of id_codigo
    *
    * @return  self
    */
   public function setId_codigo($id_codigo)
   {
      $this->id_codigo = $id_codigo;

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
    * Get the value of codigo
    */
   public function getCodigo()
   {
      return $this->codigo;
   }

   /**
    * Set the value of codigo
    *
    * @return  self
    */
   public function setCodigo($codigo)
   {
      $this->codigo = $codigo;

      return $this;
   }

   /**
    * Get the value of tiempo
    */
   public function getTiempo()
   {
      return $this->tiempo;
   }

   /**
    * Set the value of tiempo
    *
    * @return  self
    */
   public function setTiempo($tiempo)
   {
      $this->tiempo = $tiempo;

      return $this;
   }

   /**
    * Get the value of estado
    */
   public function getEstado()
   {
      return $this->estado;
   }

   /**
    * Set the value of estado
    *
    * @return  self
    */
   public function setEstado($estado)
   {
      $this->estado = $estado;

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
