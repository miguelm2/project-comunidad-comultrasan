<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioBeneficio.php';

class ServiceUserBenefit extends System
{
    public static function newUserBenefit($identificador, $id_beneficio, $tipo)
    {
        try {
            $identificador  = parent::limpiarString($identificador);
            $id_beneficio   = parent::limpiarString($id_beneficio);
            $tipo           = parent::limpiarString($tipo);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioBeneficio::newUserBenefit($identificador, $id_beneficio, $tipo, $fecha_registro);

            if ($result && $tipo == 1) {
                $usuarioDTO = Usuario::getUserById($identificador);
                self::sendMailNewBenefit($usuarioDTO->getCorreo(), $usuarioDTO->getNombre());

                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            } elseif ($result && $tipo == 2) {
                $usuarios = Usuario::getUsersInCommunity($identificador);
                foreach ($usuarios as $user) {
                    self::sendMailNewBenefit($user->getCorreo(), $user->getNombre());
                }
            }

            return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function sendMailNewBenefit($correo, $nombre)
    {
        $asunto = 'Notificación de nuevo beneficio disponible para ti';
        $mensaje = 'Estimado/a ' . $nombre . ',<br><br>
                            Nos complace informarte que hemos cargado un nuevo beneficio en tu cuenta, 
                            disponible a partir de hoy. Este beneficio ha sido diseñado para brindarte más 
                            ventajas dentro de nuestra comunidad y esperamos que lo encuentres valioso.<br><br>
                            Para conocer los detalles completos del beneficio, te invitamos a ingresar a tu 
                            perfil en nuestra plataforma.<br><br>
                            Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.<br><br>
                            Agradecemos tu participación y esperamos que disfrutes de este nuevo recurso.<br><br>
                            Atentamente, Financiera Comultrasan';

        Mail::sendEmail($asunto, $mensaje, $correo);
    }
    public static function deleteUserBenefit($id_usuario_beneficio)
    {
        try {
            $id_usuario_beneficio = parent::limpiarString($id_usuario_beneficio);
            $result = UsuarioBeneficio::deleteUserBenefit($id_usuario_beneficio);
            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
