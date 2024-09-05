<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/app.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Path.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Mail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Administrador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Elements.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/NumeroVistas.php';


abstract  class System
{




    public static function Conexion()
    {
        try {
            $dbname = Constants::$NOMBRE_BD;
            $dbh = new PDO("sqlsrv:Server={" . Constants::$IP_BD . "};Database={" .
                Constants::$NOMBRE_BD . "};Encrypt=false", Constants::$USUARIO_BD, Constants::$PASS_BD);
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function hyphenize($string)
    {
        try {
            $dict = array(
                "I'm"      => "I am",
                "thier"    => "their",
            );

            return strtolower(
                preg_replace(
                    array('#[\\s-]+#', '#[^A-Za-z0-9. -]+#'),
                    array('-', ''),
                    $this->limpiarString(
                        str_replace(
                            array_keys($dict),
                            array_values($dict),
                            urldecode($string)
                        )
                    )
                )
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function limpiarString($text)
    {
        try {
            $utf8 = array(
                '/[áàâãªä]/u'   =>   'á',
                '/[ÁÀÂÃÄ]/u'    =>   'Á',
                '/[ÍÌÎÏ]/u'     =>   'Í',
                '/[íìîï]/u'     =>   'í',
                '/[éèêë]/u'     =>   'é',
                '/[ÉÈÊË]/u'     =>   'É',
                '/[óòôõºö]/u'   =>   'ó',
                '/[ÓÒÔÕÖ]/u'    =>   'Ó',
                '/[úùûü]/u'     =>   'ú',
                '/[ÚÙÛÜ]/u'     =>   'Ú',
                '/ç/'           =>   'c',
                '/Ç/'           =>   'C',
                '/ñ/'           =>   'n',
                '/Ñ/'           =>   'N',
                '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
                '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
                '/[“”«»„]/u'    =>   ' ', // Double quote
                '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
            );
            return preg_replace(array_keys($utf8), array_values($utf8), $text);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function hash($password)
    {
        try {
            return hash(Constants::$HASH_TYPE, Constants::$HASH_SALT . $password);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function verify($password, $hash)
    {
        try {
            return ($hash == self::hash($password));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function logout()
    {
        try {
            //session_start();
            //$_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            session_destroy();
            if (isset($mysqli)) {
                mysqli_close($mysqli);
            }
            header("Location: ../page/login");
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function validarSession()
    {
        try {
            if (!isset($_SESSION['id']) && basename($_SERVER['PHP_SELF']) != 'login.php') {
                self::logout();
                exit();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function validarAdmin()
    {
        try {
            if (!($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5)) {
                self::logout();
                exit();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function validarUser()
    {
        try {
            if ($_SESSION['tipo'] != 1) {
                self::logout();
                exit();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function validarManager()
    {
        try {
            if ($_SESSION['tipo'] != 2) {
                self::logout();
                exit();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function login($user, $pass_hash)
    {
        try {
            $administrador  = Administrador::getAdministrador($user, $pass_hash);
            $usuario        = Usuario::getUser($user, $pass_hash);
            $manager        = Gestor::getManager($user, $pass_hash);

            if ($administrador != null) {
                session_start();
                $_SESSION['id']             =   $administrador->getId_administrador();
                $_SESSION['nombre']         =   $administrador->getNombre();
                $_SESSION['correo']         =   $administrador->getCorreo();
                $_SESSION['cedula']         =   $administrador->getCedula();
                $_SESSION['telefono']       =   $administrador->getTelefono();
                $_SESSION['imagen']         =   $administrador->getImagen();
                $_SESSION['tipo']           =   $administrador->getTipo();
                $_SESSION['fecha_registro'] =   $administrador->getFecha_registro();
                $_SESSION['usuario']        =   "Administrador";

                header("Location:/system/views/admin/index");
            }
            if ($usuario != null) {
                session_start();
                $_SESSION['id']                 =   $usuario->getId_usuario();
                $_SESSION['nombre']             =   $usuario->getNombre();
                $_SESSION['correo']             =   $usuario->getCorreo();
                $_SESSION['cedula']             =   $usuario->getCedula();
                $_SESSION['telefono']           =   $usuario->getTelefono();
                $_SESSION['imagen']             =   $usuario->getImagen();
                $_SESSION['tipo']               =   $usuario->getTipo();
                $_SESSION['fecha_nacimiento']   =   $usuario->getFecha_nacimiento();
                $_SESSION['departamento']       =   $usuario->getDepartamento();
                $_SESSION['ciudad']             =   $usuario->getCiudad();
                $_SESSION['fecha_registro']     =   $usuario->getFecha_registro();
                $_SESSION['usuario']            = "Usuario";
                $_SESSION['show_modal']         = true;

                header("Location:/system/views/user/index");
            }
            if ($manager != null) {
                session_start();
                $_SESSION['id']             =   $manager->getId_gestor();
                $_SESSION['nombre']         =   $manager->getNombre();
                $_SESSION['correo']         =   $manager->getCorreo();
                $_SESSION['cedula']         =   $manager->getCedula();
                $_SESSION['telefono']       =   $manager->getTelefono();
                $_SESSION['imagen']         =   $manager->getImagen();
                $_SESSION['tipo']           =   $manager->getTipo();
                $_SESSION['fecha_registro'] =   $manager->getFecha_registro();
                $_SESSION['usuario']        =   "Gestor";

                header("Location:/system/views/manager/index");
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function recovery($cedula)
    {
        try {
            $administrador  = Administrador::getAdministradorByCedula($cedula);
            $usuario = Usuario::getUserByCedula($cedula);
            $gestor = Gestor::getManagerByCedula($cedula);
            $asunto = "Recuperar cuenta Aplicacion Web Kondory";

            $new_pass = self::randomPassword();
            if ($administrador != null) {
                if (Administrador::setAdministradorPass($administrador->getId_administrador(), self::hash($new_pass))) {
                    $mensaje = "Hola " . $administrador->getNombre();
                    $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                    Mail::sendEmail($asunto, $mensaje, $administrador->getCorreo());
                    return true;
                }
            } else if ($usuario != null) {
                if (Usuario::setUserPass($usuario->getId_usuario(), self::hash($new_pass))) {
                    $mensaje = "Hola " . $usuario->getNombre();
                    $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                    Mail::sendEmail($asunto, $mensaje, $usuario->getCorreo());
                    return true;
                }
            } else if ($gestor != null) {
                if (Gestor::setManagerPass($gestor->getId_gestor(), self::hash($new_pass))) {
                    $mensaje = "Hola " . $gestor->getNombre();
                    $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                    Mail::sendEmail($asunto, $mensaje, $gestor->getCorreo());
                    return true;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function getIP()
    {
        try {
            //whether ip is from the share internet  
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from the remote address  
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function randomPassword()
    {
        try {
            $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function converterImageToBase64($url_image)
    {
        try {
            // Extensión de la imagen
            $type = pathinfo($url_image, PATHINFO_EXTENSION);
            // Cargando la imagen
            $data = file_get_contents($url_image);
            // Codificando la imagen en base64
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return $base64;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function enviarCorreos($destino, $asunto, $mensaje)
    {
        try {
            if (Mail::sendEmail($asunto, $mensaje, $destino)) {
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
