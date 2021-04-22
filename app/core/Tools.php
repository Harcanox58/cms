<?php
class Tools
{

    protected function methodPost($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            // $_POST[$clave]=htmlspecialchars($_POST[$clave],END_QUOTES);
            return trim($_POST[$clave]);
        }
        return '';
    }
    protected function methodGet($int)
    {
        $int = (int) $int;
        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }
    protected function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
    protected function ajaxResponse($arr)
    {
        echo json_encode($arr);
    }
}
