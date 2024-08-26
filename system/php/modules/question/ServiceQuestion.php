<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/PreguntaFrecuente.php';

class ServiceQuestion extends System
{
    public static function newQuestion($pregunta, $repuesta)
    {
        try {
            $pregunta = parent::limpiarString($pregunta);
            $repuesta = parent::limpiarString($repuesta);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = PreguntaFrecuente::newQuestion($pregunta, $repuesta, $fecha_registro);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setQuestion($id_pregunta, $pregunta, $repuesta)
    {
        try {
            $id_pregunta  = parent::limpiarString($id_pregunta);
            $pregunta               = parent::limpiarString($pregunta);
            $repuesta               = parent::limpiarString($repuesta);

            $result = PreguntaFrecuente::setQuestion($id_pregunta, $pregunta, $repuesta);

            if ($result) {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getQuestion($id_pregunta)
    {
        try {
            $id_pregunta = parent::limpiarString($id_pregunta);
            $preguntaFrecuenteDTO = PreguntaFrecuente::getQuestion($id_pregunta);
            return $preguntaFrecuenteDTO;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function deleteQuestion($id_pregunta)
    {
        try {
            $id_pregunta = parent::limpiarString($id_pregunta);
            $result = PreguntaFrecuente::deleteQuestion($id_pregunta);
            if ($result) {
                $_SESSION['alert'] = 1;
                header('Location:questions?delete');
            } else {
                return Elements::crearMensajeAlerta(Constants::$REGISTER_DELETE_NOT, "error");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableQuestion()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'questions.php') {
                $tableHtml = '';
                $modelResponse = PreguntaFrecuente::listQuestion();

                if ($modelResponse) {
                    foreach ($modelResponse as $valor) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . $valor->getId_pregunta() . '</td>';
                        $tableHtml .= '<td>' . $valor->getPregunta() . '</td>';
                        $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                        $tableHtml .= '<td align="center">' . Elements::crearBotonVer("question", $valor->getId_pregunta()) . '</td>';
                        $tableHtml .= '</tr>';
                    }
                } else {
                    return '<tr><td colspan="4">No hay registros para mostrar</td></tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getQuestionIndex()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                $html = '';
                $modelResponse = PreguntaFrecuente::listQuestion();
                $con = 1;
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getQuestion($valor->getPregunta(), $valor->getRespuesta(), $con);
                    $con++;
                }
                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
