<?php

/**
 *
 */
class Boot
{

    private static $rq;
    public static function init()
    {

        if (!self::$rq instanceof self) {
            try {
                self::$rq = new self;
            } catch (PDOException $err) {
                echo $err->getMessage();
            }
        }
        return self::$rq;
    }
    public function initialize()
    {
        self::$rq = new Request();
        $modulo = self::$rq->getModulo();
        $controlador = self::$rq->getControlador() . 'Controller';
        $metodo = self::$rq->getMetodo();
        $args = self::$rq->getArgumentos();

        if ($modulo) {
            $rutaControlador = _CJ_MODULES_DIR_  . 'modules' . DS . 'controllers' . DS . $controlador . '.php';
        } else {
            $rutaControlador = _CJ_CONTROLLERS_DIR_  . $controlador . '.php';
        }
        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
            $controlador = new $controlador;
            if (is_callable(array($controlador, $metodo))) {
                $metodo = self::$rq->getMetodo();
            } else {
                $metodo = DEFAULT_METHOD;
            }
            if (isset($args)) {
                call_user_func_array(array($controlador, $metodo), $args);
            } else {
                call_user_func(array($controlador, $metodo));
            }
        } else {
            throw new Exception("CONTROLADOR NO ENCONTRADO", 1);
        }
    }
}
