<?php

class Constants
{

    //Configuracion web
    static $HASH_TYPE  = "sha512";
    static $HASH_SALT  = "kondoritecnologia";


    // Configuracion bd
    static $USUARIO_BD = "sa";
    static $PASS_BD    = "K6B74qfibP4Sj3LgZ4";
    static $NOMBRE_BD  = "COMUNIDAD_COMULTRASAN";
    static $IP_BD      = "192.168.32.11";

    //Mensajes Pagina
    static $PAGE_MENSAJE_ENVIADO = "Mensaje enviado exitosamente";
    static $PAGE_NOS_PONDREMOS   = "Nos pondremos en contacto con usted lo mas pronto posible.";
    static $PAGE_LOGIN           = "Cedula o contraseña incorrecta";
    static $PAGE_INTENTE_DENUEVO = "Intente de Nuevo";
    static $PAGE_RECUPERAR_PASS  = "Correo enviado exitosamente";
    static $PAGE_RECUPERAR_PASS2 = "Se envio un correo electronico con las instrucciones para recuperar su cuenta!";
    static $PAGE_RECUPERAR_PASS_CEDULA    = "Cedula incorrecta";
    static $PAGE_RECUPERAR_PASS_CEDULA2   = "El numero de cedula ingresado no esta registrado en el sistema, contacte con un administrador";


    //Configuracion PHPMailer
    static $MAIL_SMTP_SERVER = "mail.biomantenimiento.com";
    static $MAIL_SMTP_USER   = "sistema@biomantenimiento.com";
    static $MAIL_SMTP_PASS   = "JwnQ?O0#E}6A";
    static $MAIL_SMTP_NAME   = "Cominudad familia comultrasan";


    //Mensajes Sistema
    static $ADMIN_NEW               = "Administrador creado exitosamente";
    static $ADMIN_UPDATE            = "Administrador actualizado exitosamente";
    static $REGISTER_DUPLICATE      = "Cedula, ya registrada en el sistema";
    static $ADMIN_REPEAT            = "Correo electronico o cedula ya registrada";
    static $CUSTOMER_NEW            = "Cliente creado exitosamente";
    static $CUSTOMER_UPDATE         = "Cliente actualizado exitosamente";
    static $REGISTER_DELETE         = "Registro eliminado exitosamente";
    static $INFORMATION_NEW         = "Informacion actualizada exitosamente";
    static $IMAGE_UPDATE            = "Imagen actualizada exitosamente";
    static $CONFIRM_PASS            = "Las contraseñas no coinciden";
    static $UPDATE_PASS             = "Contraseña actualizada exitosamente";
    static $CURRENT_PASS            = "La contraseña actual es incorrecta";
    static $USER_NEW                = "Usuario creado exitosamente";
    static $USER_UPDATE             = "Usuario actualizado exitosamente";
    static $MANAGER_UPDATE          = "Gestor actualizado exitosamente";
    static $REGISTER_NEW            = "Registro creado exitosamente";
    static $REGISTER_UPDATE         = "Registro actualizado correctamente";
    static $REGISTER_UPDATE_NOT     = "Registro no se ha actualizado";
    static $MESSAGE_NEW             = "Mensaje enviado exitosamente, pronto nos pondremos en contacto contigo";
    static $EMAIL_NEW               = "Correo enviado exitosamente";
    static $MESSAGE_NEW_BLOG        = "Artículo creado exitosamente";
    static $REGISTER_DELETE_NOT     = "No se ha eliminado el registro, tiene elementos asociados";
    static $ANSWER_REPEAT           = "La pregunta ya tiene una respuesta correcta";
    static $DELETE_USER_COM         = "Has salido de la comunidad, puedes unirte a otra comunidad";
    static $DELETE_USER_LEAD        = "Has eliminado al líder de esta comunidad";
    static $DELETE_USER_COM_NOT     = "No te has podido desvincular de la comunidad";
    static $DELETE_USER_BY_LEAD     = "Has eliminado el usuario de la comunidad";
    static $DELETE_USER_BY_LEAD_NOT = "No se ha eliminado el usuario de la comunidad";
    static $USER_NOT_EXIST          = "El asociado que busca no existe";
    static $USER_READY_COMMUNITY    = "El asociado que busca ya pertenece a una comunidad";
    static $USER_DIFERENT           = "La cédula debe pertenecer a otro asociado";
    static $COMMUNITY_NOT           = "La comunidad que digitó no existe";
    static $MOVE_USER_COMMUNITY     = "Se ha realizado el cambio de comunidad";
    static $NO_USER_FOUND           = "No se encontro otro usuario para hacer la transferencia de lider";
    static $DELETE_LEADER           = "Haz removido el líder de esta comunidad";
    static $USER_COMMUNITY_EXITS    = "Ya enviaste una solitud de unirte a una comunidad";
    static $REQUEST_SEND            = "Solicitud para unirse a la comunidad enviada con éxito";
    static $FORM_POINTS             = "La plantilla no está disponible.";
    static $EXISTS_COMMUNITY        = "No se encontró ninguna comunidad registrada donde figure como líder.";
}
