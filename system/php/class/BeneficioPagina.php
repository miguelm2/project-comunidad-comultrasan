<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/BeneficioPaginaDTO.php';

class BeneficioPagina extends System
{
    public static function newBenefitPage($titulo, $subtitulo, $contenido, $requisitos, $imagen, $fecha_registro)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO BeneficioPagina (titulo, subtitulo, contenido, requisitos, imagen, fecha_registro) 
                                VALUES (:titulo, :subtitulo, :contenido, :requisitos, :imagen, :fecha_registro)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':requisitos', $requisitos);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setBenefitPage($id_beneficios_pagina, $titulo, $subtitulo, $contenido, $requisitos)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE BeneficioPagina 
                            SET titulo = :titulo, subtitulo = :subtitulo, contenido = :contenido,
                                requisitos = :requisitos
                            WHERE id_beneficios_pagina = :id_beneficios_pagina");
        $stmt->bindParam(':id_beneficios_pagina', $id_beneficios_pagina);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':requisitos', $requisitos);
        return  $stmt->execute();
    }
    public static function setImageBenefitPage($id_beneficios_pagina, $imagen)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE BeneficioPagina 
                            SET imagen = :imagen
                            WHERE id_beneficios_pagina = :id_beneficios_pagina");
        $stmt->bindParam(':id_beneficios_pagina', $id_beneficios_pagina);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }
    public static function getBenefitPage($id_beneficios_pagina)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM BeneficioPagina WHERE id_beneficios_pagina = :id_beneficios_pagina");
        $stmt->bindParam(':id_beneficios_pagina', $id_beneficios_pagina);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioPaginaDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
    public static function listBenefitPage()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM BeneficioPagina");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'BeneficioPaginaDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }
    public static function deleteBenefitPage($id_beneficios_pagina)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM BeneficioPagina WHERE id_beneficios_pagina = :id_beneficios_pagina");
        $stmt->bindParam(':id_beneficios_pagina', $id_beneficios_pagina);
        return  $stmt->execute();
    }
}
