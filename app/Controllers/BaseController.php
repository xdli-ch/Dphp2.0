<?php

namespace App\Controllers;

use App\Models\Logo;

class BaseController
{
    use \App\ResponseResult;

    public $config = [];
    public $tpl = null;

    public function __construct()
    {

        global $tpl;
        global $config;

        $this->config = $config;

        $tpl->assign("title",$config['app_name']);//用定义的变量替换模板中的变量

        //保证 seesion error 只会被加载一次
        if (isset($_SESSION["error"])) {
            $tpl->assign("error",$_SESSION["error"]);
            unset($_SESSION["error"]);
        }

        //保证 seesion success 只会被加载一次
        if (isset($_SESSION["success"])) {
            $tpl->assign("success",$_SESSION["success"]);
            unset($_SESSION["success"]);
        }

        //系统logo
        $logoBoj = Logo::find(1);
        if (empty($logoBoj)){
            $logo = '/public/images/logo.png';
        }else{
            $logo = $logoBoj->path;
        }
        $tpl->assign("logo",$logo);

        //获取当前处于激活状态的菜单
        $request_uri = explode('/',parse_url($_SERVER['REQUEST_URI'])['path']);
        $current_menu = $request_uri[1];
        $tpl->assign("current_menu",$current_menu);

        $this->tpl = $tpl;

    }
}
