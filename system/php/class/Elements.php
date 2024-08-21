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
            title: "FELICIDADES!! Haz ganado ' . $puntos . ' corazones",
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
        return '<div class="col-md-6 mt-5">
                    <div class="card card1 position-relative h-100">
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
            <div class="card border-2" style="background: rgb(150, 190, 22, 0.2) !important">
                <div class="card-head mt-3 ms-3">
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
    public static function getCardCalendarEvent($imagen, $titulo, $fecha, $lugar, $hora)
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
                        LUGAR: ' . $lugar . '<br>
                        FECHA: ' . $fecha . ' <br>
                        HORA: ' . $hora . '
                    </p>
                </div>
            </div>
        </div>
        ';
    }
    public static function getCardGroupInterest($id, $icono, $titulo, $subtitulo, $btnForo)
    {
        return '<div class="col-md-5 col-sm-5 mt-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-3 h-100">
                        <div class="card-head justify-content-center text-center mt-2">
                            <span class="material-symbols-outlined" style="font-size: 70px;">
                                ' . $icono . '
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="title text-black text-center">
                                <strong>
                                    ' . $titulo . '
                                </strong>
                            </h5>
                            <p class="text-black ms-2">
                                ' . $subtitulo . '
                            </p>
                        </div>
                        <div class="card-foot">
                            <div class="row ms-4">
                                <div class="col-md-6">
                                    <a href="groupInterest?groupInterest=' . $id . '" class="btn btn-success">
                                        <i class="material-icons text-sm me-2">visibility</i>Ver grupo
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    ' . $btnForo . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    public static function getCardForum($imagen, $titulo, $usuario, $id_foro)
    {
        return '<div class="col-md-12 mt-2">
                    <div class="row ps-2">
                        <div class="col-md-1">
                            <img src="' . Path::$DIR_IMAGE_USER . $imagen . '" alt="Imagen" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-9">
                            <h4><a href="forum?forum=' . $id_foro . '">' . $titulo . '</a></h4>
                            <p>por <strong>' . $usuario . '</strong></p>
                        </div>
                        <div class="col-md-2">
                            <a href="forum?forum=' . $id_foro . '" class="btn btn-secondary">
                            <i class="material-icons me-2">chat</i>Comentar</a>
                        </div>
                    </div>
                </div>';
    }
    public static function getCardForumComment($imagen, $usuario, $tiempo, $comentario, $btnEliminar)
    {
        return '<div class="card border-2 mt-2">
                    <div class="col-md-12">
                        <div class="row ps-2 mt-2">
                            <div class="col-md-1">
                                <img src="' . Path::$DIR_IMAGE_USER . $imagen . '" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong class="text-black" style="color:black">' . $usuario . '</strong>
                                    </div>
                                    <div class="col-md-12">
                                        <small><i class="material-icons me-2">schedule</i>' . $tiempo . '</small>
                                    </div>
                                    <div class="col-md-10">
                                        <p>
                                            ' . $comentario . '
                                        </p>
                                    </div>
                                    ' . $btnEliminar . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    public static function getCardsGroupInterestIndexByUser($titulo, $contenido, $icono)
    {
        return '<div class="card border-2 shadow-sm rounded mt-2">
                    <div class="card-head mt-2 pb-0 mb-0">
                        <h5>Grupo: ' . $titulo . ' <i class="material-icons me-2">' . $icono . '</i></h5>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <p class="text-muted">' . $contenido . '</p>
                    </div>
                </div>';
    }
    public static function getButtonDeleteCommentForum($id)
    {
        return '<div class="col-md-2">
                    <form method="post">
                        <input type="hidden" name="comment" value="' . $id . '">
                        <button type="submit" class="btn btn-danger" name="deleteForumComment"><i class="material-icons me-2">delete</i>Eliminar</button>
                    </form>
                </div>';
    }
    public static function getFormJoinGroupInterest()
    {
        return '<form method="post">
                    <button name="newCommunityGroupInterest" class="btn btn-success">¡Unirme Ahora!</button>
                </form>';
    }
    public static function getUnitedCommunity()
    {
        return '<div class="card-body m-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-2 h-100">
                                <div class="card-head ms-4 mt-3">
                                    <h5 class="text-success">
                                    Crear una nueva Comunidad
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    Para crear una nueva comunidad, deben de ser al menos dos personas
                                    </p>
                                </div>
                                <div class="card-foot">
                                    <button type="button" class="btn btn-success ms-4" data-bs-toggle="modal" data-bs-target="#newCommunity">
                                        <i class="material-icons me-2">add</i> Crear nueva comunidad
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-2 h-100">
                                <div class="card-head ms-4 mt-3">
                                    <h5 class="text-success">
                                    Unirme a una nueva comunidad
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                    Te puedes unir a cualquier comunidad
                                    </p>
                                </div>
                                <div class="card-foot">
                                    <a href="allCommunities" class="btn btn-success ms-4">Unirme a una comunidad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    public static function getUnitedCommunityReady($nombre, $lider, $cantidad, $fecha, $codigo, $puntos, $btnEditar)
    {
        return '<div class="card-body m-0">
                    <h6><i class="material-icons">vpn_key</i> Código del grupo: </h6>
                    <p>' . $codigo . '</p>
                    <h6><i class="material-icons">diversity_3</i> Nombre: </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p>' . $nombre . '</p>
                        </div>
                        <div class="col-md-6">
                            ' . $btnEditar . '
                        </div>
                    </div>
                    
                    <h6><i class="material-icons">supervisor_account</i> Lider: </h6>
                    <p>' . $lider . '</p>
                    <h6><i class="material-icons">group_add</i> Usuarios en la comunidad: </h6>
                    <p>' . $cantidad . ' asociados</p>
                    <h6><i class="material-icons">event</i> Fecha de creación: </h6>
                    <p>' . $fecha . '</p>
                    <h6><i class="material-icons">favorite</i> Sumatoria de corazones: </h6>
                    <p>' . $puntos . ' corazones</p>
                </div>';
    }
    public static function getCardUserInCommunity($nombre, $celular, $btnEliminar)
    {
        return '<div class="card mt-2 border-2">
                    <div class="row">
                        <div class="col-md-8 mt-2">
                            <h6 class="p-2"><i class="material-icons me-2">account_circle</i> ' . $nombre . '</h6>
                            <h6 class="ms-2"><i class="material-icons me-2">call</i>Celular: ' . $celular . '</h6>
                        </div>
                        <div class="col-md-4 mt-2">
                            ' . $btnEliminar . '
                        </div>
                    </div>
                </div>';
    }
    public static function getCardCommunity($nombre, $lider, $fecha, $cantidad, $id_comunidad)
    {
        return '<div class="card border-2 mt-2">
                    <div class="row">
                        <div class="col-md-6 ms-2 mt-2">
                            <h4>' . $nombre . '</h4>
                            <p><strong>Líderada por:</strong> ' . $lider . '</p>
                        </div>
                        <div class="col-md-5 mt-2">
                            <p class=""><strong>Fecha de creación:</strong> ' . $fecha . '</p>
                            <p class=""><strong>Cantidad de usuarios:</strong> ' . $cantidad . '</p>
                        </div>
                        <div class="col-md-11">
                            <div class="text-end">
                                <form method="post">
                                    <input type="hidden" name="comunidad" value="' . $id_comunidad . '">
                                    <button name="newUserCommunityJoin" class="btn btn-success">¡Unirme Ahora!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    public static function getButtonDeleteModal($modal, $text)
    {
        return '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#' . $modal . '">
                    <i class="material-icons me-2">logout</i>' . $text . '
                </button>';
    }
    public static function getButtonDeleteModalJs($modal, $text, $id)
    {
        return '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#' . $modal . '" data-id="' . $id . '">
        <i class="material-icons me-2">person_remove</i>' . $text . '</button>';
    }
    public static function getButtonEditModalJs($modal, $text, $id, $nombre)
    {
        return '<button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#' . $modal . '" data-id="' . $id . '" data-nombre="' . $nombre . '">
        <i class="material-icons me-2">edit</i>' . $text . '</button>';
    }
    public static function getCardBodyCommunityUser($codigo, $nombre, $lider, $fecha, $fecha_union)
    {
        return '<div class="row">
                    <div class="col-md-6">
                        <h6><i class="material-icons">vpn_key</i> Código del grupo: </h6>
                        <p>' . $codigo . '</p>
                        <h6><i class="material-icons">diversity_3</i> Nombre: </h6>
                        <p>' . $nombre . '</p>
                        <h6><i class="material-icons">supervisor_account</i> Lider: </h6>
                        <p>' . $lider . '</p>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="material-icons">event</i> Fecha de creación: </h6>
                        <p>' . $fecha . '</p>
                        <h6><i class="material-icons">event</i> Fecha de unión: </h6>
                        <p>' . $fecha_union . '</p>
                    </div>
                </div>';
    }
    public static function getCardForo($imagen, $usuario, $contenido, $likes, $tiempo)
    {
        return '<div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="' . Path::$DIR_IMAGE_USER . $imagen . '" alt="Profile Image" class="img-fluid img-foro">
                        </div>
                        <div class="col-md-10">
                            <div class="name">' . $usuario . '</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    ' . $contenido . '
                </div>
                <div class="card-footer">
                    <div class="likes">
                        <span>&#10084; ' . $likes . '</span>
                    </div>
                    <div class="time">
                        ' . $tiempo . '
                    </div>
                </div>';
    }
    public static function getCardsEventsByGroup($fecha, $titulo, $persona)
    {
        return '
            <div class="card p-2 border-2">
                <div class="row">
                    <div class="col-md-4">
                        <strong>' . $fecha . '</strong>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <strong class="text-success">
                                ' . $titulo . '
                            </strong>
                            ' . $persona . '
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}
