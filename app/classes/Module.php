<?php
class Module
{
    protected $name, $version, $author, $diplayName, $logo;

    public function Install()
    {
        $check = Db::getInstance()->Execute("SELECT * FROM " . _DB_PREFIX_ . "modules WHERE name='" . $this->name . "'");
        if (!$check['id_module'] != null) {
            Db::getInstance()->runQuery("INSERT INTO `" . _DB_PREFIX_ . "modules`(`name`, `op_status`) VALUES ('" . $this->name . "','1')");
        }
    }
}
