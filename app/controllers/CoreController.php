<?php

class CoreController
{
    private $_controlador, $_Smarty, $_peticion, $_modulo, $_rutas;
    protected $_Authenticator, $layout, $menu, $ImgDir;

    public function __construct()
    {
        $this->_peticion = new CRequest();
        $this->_Smarty = new Smarty();
        // $this->_Authenticator = new CAuthenticator();

        $this->_controlador = $this->_peticion->getControlador();
        $this->_modulo = $this->_peticion->getModulo();
        $this->_rutas = array();
        if ($this->_modulo) {
            $this->_rutas['view'] = WebRoot . 'protected' . DS . 'modules' . DS . $this->_modulo . DS . 'views' . DS . $this->_controlador . DS;
        } else {
            $this->_rutas['view'] = WebRoot . 'protected' . DS . 'views' . DS . $this->_controlador . DS;
        }
    }
    protected function render($vista, $dataTransfer = null)
    {

        $this->_Smarty->template_dir = WebRoot . 'protected' . DS . 'views' . DS . 'layouts' . DS . $this->layout . DS;
        $this->_Smarty->config_dir = WebRoot . 'protected' . DS . 'views' . DS . 'layouts' . DS . $this->layout . DS . 'configs' . DS;
        $this->_Smarty->cache_dir = WebRoot . 'protected' . DS . 'temp' . DS . 'cache' . DS;
        $this->_Smarty->compile_dir = WebRoot . 'protected' . DS . 'temp' . DS . 'template' . DS;

        if (is_array($dataTransfer)) {
            foreach ($dataTransfer as $k => $v) {
                $this->_Smarty->assign($k, $v);
            }
        }
        if (!$this->layout) {
            $this->layout = DEFAULT_LAYOUT;
        }
        $templateParams = array(
            'cssDir' => $this->CssDir,
            'imgDir' => CUrl::baseUrl() . 'framework/assets/',
            'jsDir' => $this->JsDir,
            'app' => array(
                'app_name' => AppName,
                'app_company' => AppCompany,
            ),
        );

        $rutaLayout = WebRoot . 'protected' . DS . 'views' . DS . 'layouts' . DS . $this->layout . '.tpl';
        $this->_Smarty->assign('content', $this->_rutas['view'] . $vista . '.tpl');
        $this->_Smarty->assign('templateParams', $templateParams);
        if (is_readable($rutaLayout)) {
            $this->_Smarty->display($rutaLayout);
        } else {
            throw new Exception('VISTA NO ENCONTRADA');
        }
    }
    protected function layout($layout)
    {
        $this->layout = $layout;
    }
    protected function loadModel($modelo)
    {

        $modelo = $modelo . 'Model';
        if ($this->_modulo) {
            $rutaModelo = WebRoot . 'protected' . DS . 'modules' . DS . $this->_modulo . DS . 'models' . DS . $modelo . '.php';
        } else {
            $rutaModelo = WebRoot . 'protected' . DS . 'models' . DS . $modelo . '.php';
        }
        if (is_readable($rutaModelo)) {
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception('Error al Procesar la Penticion <=" Modelo No Encontrado "=>', 1);
        }
    }
    protected function loadLib($libs)
    {
        $rutalibs = WebRoot . 'Core' . DS . 'Libs' . DS . $libs . '.php';
        if (is_readable($rutalibs)) {
            require_once $rutalibs;
        } else {
            throw new Exception('Error al Procesar la Penticion <=" Libreria No Encontrado "=>', 1);
        }
    }
    public static function redirect($ruta = false)
    {
        if ($ruta) {
            header("location:" . CUrl::baseUrl() . $ruta);
            exit();
        } else {
            header("location:" . CUrl::baseUrl());
            exit();
        }
    }
}
