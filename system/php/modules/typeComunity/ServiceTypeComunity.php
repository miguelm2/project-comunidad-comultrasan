<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoComunidad.php';

class ServiceTypeComunity extends System
{
    public static function newTypeComunity($titulo, $icono, $subtitulo, $contenido)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'newTypeComunity.php') {
                $titulo = parent::limpiarString($titulo);
                $icono = parent::limpiarString($icono);
                $subtitulo = parent::limpiarString($subtitulo);
                $contenido = parent::limpiarString($contenido);

                $fecha_registro = date('Y-m-d H:i:s');
                $imagen = self::newImagen();

                $result = TipoComunidad::newTypeComunity($titulo, $icono, $subtitulo, $contenido, $imagen, $fecha_registro);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function newImagen()
    {
        try {
            if (isset($_FILES['imageTypeComunity']) && $_FILES['imageTypeComunity']['error'] === UPLOAD_ERR_OK) {
                $source = $_FILES['imageTypeComunity']['tmp_name'];
                $filename = $_FILES['imageTypeComunity']['name'];
                $fileSize = $_FILES['imageTypeComunity']['size'];
                $imagen = '';

                if ($fileSize > 100 && $filename != '') {
                    $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM;

                    if (!file_exists($dirImagen))
                        mkdir($dirImagen, 0777, true);

                    $dir = opendir($dirImagen);
                    $trozo1 = explode(".", $filename);
                    $imagen = 'tipo_comunidad_' . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
                    $target_path = $dirImagen . $imagen;
                    move_uploaded_file($source, $target_path);
                    closedir($dir);
                }

                return $imagen;
            } else {
                throw new Exception("No se ha enviado ninguna imagen o ha ocurrido un error en la carga del archivo.");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
                $titulo = parent::limpiarString($titulo);
                $icono = parent::limpiarString($icono);
                $subtitulo = parent::limpiarString($subtitulo);
                $contenido = parent::limpiarString($contenido);

                $result = TipoComunidad::setTypeComunity($id_tipo_comunidad, $titulo, $icono, $subtitulo, $contenido);

                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
                } else {
                    return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE_NOT, "error");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImageTypeComunityPage($id_tipo_comunidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);
                $tipoComunidadDTO = self::getTypeComunity($id_tipo_comunidad);

                $dirImagen = $_SERVER['DOCUMENT_ROOT'] . Path::$DIR_IMAGE_TYPE_COM . $tipoComunidadDTO->getImagen();

                if (file_exists($dirImagen) && !empty($tipoComunidadDTO->getImagen()) && $tipoComunidadDTO->getImagen() != "default.png") {
                    unlink($dirImagen);
                }
                $imagen = self::newImagen();
                $result = TipoComunidad::setImageTypeComunity($id_tipo_comunidad, $imagen);
                if ($result) {
                    return Elements::crearMensajeAlerta(Constants::$IMAGE_UPDATE, "success");
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTypeComunity($id_tipo_comunidad)
    {
        try {
            $id_tipo_comunidad = parent::limpiarString($id_tipo_comunidad);

            $result = TipoComunidad::getTypeComunity($id_tipo_comunidad);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteTypeComunity($id_tipo_comunidad)
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunity.php') {
                $id_beneficios_pagina = parent::limpiarString($id_tipo_comunidad);

                $result = TipoComunidad::deleteTypeComunity($id_beneficios_pagina);
                if ($result)
                    header('Location:typeComunities?delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableTypeComunity()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'typeComunities.php') {
                $tableHtml = "";
                $modelResponse = TipoComunidad::listTypeComunity();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_tipo_comunidad() . '</td>';
                        $tableHtml .= '<td>' . $valor->getTitulo() . '</td>';
                        $tableHtml .= '<td>' . $valor->getIcono() . '</td>';
                        $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                        $tableHtml .= '<td>' . Elements::crearBotonVer("typeComunity", $valor->getId_tipo_comunidad()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="5">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardTypeComunity()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'comunidad.php') {
                $html = "";
                $modelResponse = TipoComunidad::listTypeComunity();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $html .= Elements::getCardTypeComunity($valor->getId_tipo_comunidad(), $valor->getIcono(), $valor->getTitulo(), $valor->getSubtitulo());
                    }
                } else {
                    return '<div>No hay registros para mostrar</div>';
                }
                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardGroupInterest()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'community.php') {
                $html = "";
                $modelResponse = TipoComunidad::listTypeComunity();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $comunidadDTO = Comunidad::getCommunityByUser($_SESSION['id']);
                        $btnForo = '';

                        if (!$comunidadDTO) {
                            $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($_SESSION['id']);
                            if ($comunidadUsuario) {
                                $comunidadDTO = $comunidadUsuario->getComunidadDTO();
                            }
                        }
                        $comunidadGrupoDTO = ComunidadGrupoInteres::getCommunityGroupInterestByCommunity($comunidadDTO->getId_comunidad());
                        if ($comunidadGrupoDTO->getTipoComunidadDTO()->getId_tipo_comunidad() == $valor->getId_tipo_comunidad()) {
                            $btnForo = '<a href="forums?comunnityForum=' . $valor->getId_tipo_comunidad() . '" class="btn btn-info">
                                            <i class="material-icons text-sm me-2">dashboard</i>Ir a foro
                                        </a>';
                        }

                        $html .= Elements::getCardGroupInterest(
                            $valor->getId_tipo_comunidad(),
                            $valor->getIcono(),
                            $valor->getTitulo(),
                            $valor->getSubtitulo(),
                            $btnForo
                        );
                    }
                } else {
                    return '<div>No hay registros para mostrar</div>';
                }
                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception('Error en getCardGroupInterest: ' . $e->getMessage());
        }
    }
    public static function getButtonJoin($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $comunidadDTO = Comunidad::getCommunityByUser($_SESSION['id']);

            if (!$comunidadDTO) {
                $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($_SESSION['id']);
                if ($comunidadUsuario) {
                    $comunidadDTO = $comunidadUsuario->getComunidadDTO();
                } else {
                    return '<button class="btn btn-success disabled">No perteneces a una comunidad</button>';
                }
            }
            $tipoComunidadDTO = TipoComunidad::getTypeComunityByCommunity($comunidadDTO->getId_comunidad());
            if (!$tipoComunidadDTO) {
                return Elements::getFormJoinGroupInterest();
            } else {
                return '<a href="forums?comunnityForum=' . $id_grupo . '" class="btn btn-info">Ir a foro</a>
                <a href="groupInterestInfo?groupInterest=' . $id_grupo . '" class="btn btn-success">Ver más detalles</a>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getButonNewForum($id_grupo)
    {
        try {
            $id_grupo = parent::limpiarString($id_grupo);
            $comunidadDTO = Comunidad::getCommunityByUser($_SESSION['id']);

            if (!$comunidadDTO) {
                $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($_SESSION['id']);
                $comunidadDTO = $comunidadUsuario ? $comunidadUsuario->getComunidadDTO() : null;
            }

            if ($comunidadDTO) {
                $tipoComunidadDTO = TipoComunidad::getTypeComunityByCommunity($comunidadDTO->getId_comunidad());

                if ($tipoComunidadDTO && $tipoComunidadDTO->getId_tipo_comunidad() == $id_grupo) {
                    return '<a href="newForum?comunnityForum=' . $id_grupo . '" class="btn btn-success">
                                <i class="material-icons me-2">edit</i> Añadir nuevo tema
                            </a>';
                }
            }

            return '';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getDisabledComment($id_foro)
    {
        try {
            $comunidadDTO = Comunidad::getCommunityByUser($_SESSION['id']);
            $foroDTO = Foro::getForum($id_foro);

            if (!$comunidadDTO) {
                $comunidadUsuario = UsuarioComunidad::getUserCommunityByUser($_SESSION['id']);
                $comunidadDTO = $comunidadUsuario ? $comunidadUsuario->getComunidadDTO() : null;
            }

            if ($comunidadDTO && $foroDTO) {
                $tipoComunidadDTO = TipoComunidad::getTypeComunityByCommunity($comunidadDTO->getId_comunidad());

                if ($tipoComunidadDTO && $tipoComunidadDTO->getId_tipo_comunidad() == $foroDTO->getTipoComunidadDTO()->getId_comunidad()) {
                    return '';
                }
            }

            return 'disabled';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getOptionsGroupCommunity()
    {
        try {
            $modelResponse = TipoComunidad::listTypeComunity();
            $html = '';
            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $html .= '<option value="' . $valor->getId_tipo_comunidad() . '">' . $valor->getTitulo() . '</option>';
                }
            }
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
