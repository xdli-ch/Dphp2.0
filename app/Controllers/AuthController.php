<?php

namespace App\Controllers;

class AuthController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        //登录验证
        if (!isset($_SESSION["have_login"]) or $_SESSION["have_login"] === false) {
            $_SESSION["have_login"] = false;
            $_SESSION["error"] = "请登录.";
            header("location:/login");
        }else{
            $_SESSION["have_login"] = true;
            $this->tpl->assign("have_login",$_SESSION["have_login"]);
        }

        //身份验证(系统管理员 or 员工)
        if(isset($_SESSION["user_info"])){
            $this->tpl->assign("user_info",$_SESSION["user_info"]);
        }
    }
}
