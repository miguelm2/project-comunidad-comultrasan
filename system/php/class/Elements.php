<?php
class Elements
{
    public static function crearBotonVer($link, $valor)
    {
        return '<a class="btn btn-link text-info px-3 mb-0" href="' . $link . '?' . $link . '=' . $valor . '">
                    <i class="material-icons text-sm me-2">edit</i>Editar
                </a>';
    }
    public static function crearBotonRealizar($link, $valor)
    {
        return '<a class="btn btn-link text-info px-3 mb-0" href="' . $link . '?' . $link . '=' . $valor . '" style="font-size: 16px;">
                    <i class="material-icons text-sm me-2">play_circle</i>Realizar
                </a>';
    }
    public static function crearBotonVerTwoLink($link, $valor, $link2, $valor2)
    {
        return '<a class="btn btn-link text-info px-3 mb-0" href="' . $link . '?' . $link . '=' . $valor . '&' . $link2 . '=' . $valor2 . '">
                    <i class="material-icons text-sm me-2">edit</i>Editar
                </a>';
    }

    public static function crearBotonEliminar($link, $link2, $valor)
    {
        return '<a href="' . $link . '?' . $link2 . '=' . $valor . '" class="btn btn-danger rounded-circle btn-sm"><i class="bi bi-trash-fill"></i></a>';
    }

    public static function getCardBlog($id_blog, $nombre, $imagen, $titulo, $fecha, $contenido)
    {
        return '
        <div class="col-md-6">
            <a href="blog_single?blog=' . $id_blog . '">
            <div class="member d-flex align-items-start" data-aos="zoom-in">
              <div class="pic2" style="width: 190px;"><img src="/system/img/blog/' . $imagen . '" class="" alt="" style="width: 190px; height: 190px;"></div>
              <div class="member-info">
                <h4>' . $titulo . '</h4>
                <span>By ' . $nombre . '</span>
                <b><i class="bi bi-calendar-week"></i> ' . self::getFechaLetras($fecha) . '
                </b>
              </div>
            </div>
            </a>
        </div>
        ';
    }

    public static function getBlogsRecientes($id_blog, $imagen, $titulo, $fecha)
    {
        return '
        <div class="col-md-12">
            <a class="buy-btn" href="blog_single?blog=' . $id_blog . '">
            <div class="card mb-3 member">
                <div class="row">
                    <div class="col-lg-5 d-flex justify-content-center py-2" data-aos="zoom-in">
                        <div class="pic3 d-flex align-items-center w-auto">
                            <img src="/system/img/blog/' . $imagen . '" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7  d-flex flex-column align-items-center justify-content-center">
                        <h5>' . $titulo . '</h5><br>
                        <b><i class="bi bi-calendar-week"></i> ' . self::getFechaLetras($fecha) . '
                        </b>
                    </div>
                </div>
            </div>
            </a>
        </div>
        ';
    }

    public static function getTestimonio($icono, $nombre, $estrellas, $opinion, $fecha)
    {
        return '
        <div class="carousel-item active">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-5" style="width: 60%; height: 300px;">
                    <div class="row g-2">
                        <div class="col-md-1">
                            <img src="/system/assets/img/icono_' . $icono . '.webp" alt="..." style="margin: 5%; width: 60px; height: 60px; border-radius: 50%;">
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h3 class="card-title">' . $nombre . '</h3>
                                <p class="card-text">' . $estrellas . ' ' . self::getFechaLetras($fecha) . '</p>
                                <p class="card-text"><small class="text-body-secondary" style="font-size: 18px;">' . $opinion . '</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    public static function getFechaLetras($fecha)
    {
        $fechaLetras = explode('-', $fecha);
        return $fechaLetras[2] . ' de ' . self::mes($fechaLetras[1]) . ' de ' . $fechaLetras[0];
    }

    public static function mes($numero)
    {
        switch ($numero) {
            case 12: {
                    $numu = "Diciembre";
                    break;
                }
            case 11: {
                    $numu = "Noviembre";
                    break;
                }
            case 10: {
                    $numu = "Octubre";
                    break;
                }
            case 9: {
                    $numu = "Septiembre";
                    break;
                }
            case 8: {
                    $numu = "Agosto";
                    break;
                }
            case 7: {
                    $numu = "Julio";
                    break;
                }
            case 6: {
                    $numu = "Junio";
                    break;
                }
            case 5: {
                    $numu = "Mayo";
                    break;
                }
            case 4: {
                    $numu = "Abril";
                    break;
                }
            case 3: {
                    $numu = "Marzo";
                    break;
                }
            case 2: {
                    $numu = "Febrero";
                    break;
                }
            case 1: {
                    $numu = "Enero";
                    break;
                }
            case 0: {
                    $numu = "";
                    break;
                }
        }
        return $numu;
    }
    public static function crearMensajeAlerta($mensaje, $tipo_alerta)
    {
        return '<script>swal("' . $mensaje . '", "", "' . $tipo_alerta . '");</script>';
    }
    public static function crearMensajeAlerta2($puntos)
    {
        return '<script>
            Swal.fire({
            title: "FELICIDADES!! Haz ganado '. $puntos . ' corazones",
            width: 500,
            padding: "3em",
            color: "#716add",
            background: "#fff url(https://sweetalert2.github.io/#downloadimages/trees.png)",
            backdrop: `
                rgba(0,0,123,0.4)
                url("https://www.icegif.com/wp-content/uploads/2023/07/icegif-129.gif")
                right top
                no-repeat
            `
            });
            </script>';
    }

    public static function getQuestion($pregunta, $respuesta, $contador)
    {
        return '<div class="accordion-item">
                    <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-' . $contador . '">
                        <span class="num">' . $contador . '.</span>
                        ' . $pregunta . '
                    </button>
                    </h3>
                    <div id="faq-content-' . $contador . '" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body text-start">
                        ' . $respuesta . '
                    </div>
                    </div>
                </div>
                ';
    }
    public static function getCardTypeComunity($id, $icono, $titulo, $subtitulo)
    {
        return '<a class="col-md-4 col-sm-4 mt-4" data-aos="fade-up" data-aos-delay="100" href="comunnity?comunnity=' . $id . '">
                    <div class="card mouse">
                        <div class="m-2">
                            <span class="material-symbols-outlined" style="font-size: 70px;">
                                ' . $icono . '
                            </span>
                        </div>
                        <h5 class="title text-black">
                            <strong>
                                ' . $titulo . '
                            </strong>
                        </h5>
                        <p class="text-black p-2">
                            ' . $subtitulo . '
                        </p>
                    </div>
                </a>';
    }
    public static function getCardBenefit($id, $imagen, $titulo, $subtitulo)
    {
        return '<div class="col-md-6 mt-3">
                    <div class="card card1 position-relative">
                        <img src="' . Path::$DIR_IMAGE_BENE_PAGE . $imagen . '" alt="' . $imagen . '">
                        <h5 class="card-title">' . $titulo . '</h5>
                        <p class="card-text">
                            ' . $subtitulo . '
                        </p>
                        <a href="benefitPage?benefit_page=' . $id . '" class="btn btn-ver-mas">Ver más</a>
                    </div>
                </div>';
    }
    public static function getCardDiscount($imagen, $logo, $descuento, $titulo, $vigencia, $acceso)
    {
        return '<div class="card-container">
                    <div class="card-flip">
                        <div class="card card-front">
                            <div class="img-card-container">
                                <img src="' . Path::$DIR_IMAGE_DIS . $imagen . '" class="card-img-top img-fluid img-card" alt="Burger">
                                <img src="' . Path::$DIR_IMAGE_DIS_LOGO . $logo . '" class="card-img__logo" alt="Burger">
                            </div>
                            <div class="card-body text-center">
                                <h6>' . $descuento . '</h6>
                                <button class="btn btn-verde btn1 mt-3">¡Lo quiero! <i class="bi bi-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="card card-back text-start">
                            <div class="card-body">
                                <h6 class="card-title">' . $titulo . '</h6>
                                <p style="font-size: 12px;">
                                    ' . $vigencia . '
                                </p>
                                <h6 class="card-title">¿Cómo puedo acceder al beneficio?</h6>
                                <p style="font-size: 12px;">
                                    ' . $acceso . '
                                </p>
                                <button class="btn btn-verde btn1 mt-3">¡Lo quiero! <i class="bi bi-plus-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    public static function getCardSurveyUserNotResolved($titulo, $puntos, $estado, $btnRealizar)
    {
        return '
        <div class="col-md-6 mt-3">
            <div class="card border-2">
                <div class="card-header mp-0">
                    <h5 class="card-text text-success"><i class="material-icons me-2">library_books</i>' . $titulo . '</h5>
                </div>
                <div class="card-body mt-0 pt-0">
                    <p class="card-text text-black">
                        Cantidad de puntos: <strong>' . $puntos . '</strong><br>
                        Estado: ' . $estado . '
                    </p>
                    ' . $btnRealizar . '
                </div>
            </div>
        </div>
        ';
    }
    public static function getCardSurveyUserResolved($titulo, $puntos, $estado)
    {
        return '
        <div class="col-md-6 mt-3">
            <div class="card border-2">
                <div class="card-header mp-0">
                    <h5 class="card-text text-success"><i class="material-icons me-2">library_books</i>' . $titulo . '</h5>
                </div>
                <div class="card-body mt-0 pt-0">
                    <p class="card-text text-black">
                        Cantidad de puntos: <strong>' . $puntos . '</strong><br>
                        Estado: ' . $estado . '
                    </p>
                    <button class="btn btn-link text-info px-3 mb-0" style="font-size: 16px;" disabled>
                        <i class="material-icons text-sm me-2">play_circle</i>REALIZADO
                    </button>
                </div>
            </div>
        </div>
        ';
    }
    public static function getCardQuestion($con, $pregunta, $respuestas)
    {
        return '
        <div class="card-head ms-3 mt-3">
            <h4 class="text-success">Pregunta N°.' . $con . '</h4>
        </div>
        <div class="card-body mt-0">
            <h5 class="card-text text-success">' . $pregunta . '</h5>
            ' . $respuestas . '
        </div>
        <div class="dark horizontal my-0 border-1 mt-4"></div>
        ';
    }
    public static function getCardCalendarEvent($imagen, $titulo, $fecha, $lugar)
    {
        return '
        <div class="col-md-4">
            <div class="card border-2 p-2 h-100">
                <div class="card-head">
                    <img src="' . Path::$DIR_IMAGE_EVENT_CALE . $imagen . '" alt="" class="img-fluid">
                    <p class="card-text text-pri text-uppercase fw-bold">' . $titulo . '</p>
                </div>
                <div class="card-footer">
                    <p class="card-text text-start">
                        FECHA: ' . $fecha . ' <br>
                        LUGAR: ' . $lugar . '<br>
                    </p>
                </div>
            </div>
        </div>
        ';
    }
}
