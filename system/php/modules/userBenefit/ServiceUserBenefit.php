<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/UsuarioBeneficio.php';

class ServiceUserBenefit extends System
{
    public static function newUserBenefit($id_usuario, $id_beneficio)
    {
        try {
            $id_usuario         = parent::limpiarString($id_usuario);
            $id_beneficio    = parent::limpiarString($id_beneficio);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = UsuarioBeneficio::newUserBenefit($id_usuario, $id_beneficio, $fecha_registro);


            if ($result) {
                $usuarioDTO = Usuario::getUserById($id_usuario);
                $asunto = 'Notificación de nuevo beneficio disponible para ti';
                $correo = $usuarioDTO->getCorreo();
                $mensaje = 'Estimado/a ' . $usuarioDTO->getNombre() . ',<br><br>
                            Nos complace informarte que hemos cargado un nuevo beneficio en tu cuenta, 
                            disponible a partir de hoy. Este beneficio ha sido diseñado para brindarte más 
                            ventajas dentro de nuestra comunidad y esperamos que lo encuentres valioso.<br><br>
                            Para conocer los detalles completos del beneficio, te invitamos a ingresar a tu 
                            perfil en nuestra plataforma.<br><br>
                            Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.<br><br>
                            Agradecemos tu participación y esperamos que disfrutes de este nuevo recurso.<br><br>
                            Atentamente, Financiera Comultrasan';

                Mail::sendEmail($asunto, $mensaje, $correo);

                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
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
