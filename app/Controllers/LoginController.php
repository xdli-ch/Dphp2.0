<?php
namespace App\Controllers;

use App\Models\User;
class LoginController extends BaseController
{
    public function index($data)
    {

        //  判断是否登陆
        if (isset($_SESSION["have_login"]) && $_SESSION["have_login"] === true) {
            unset($_SESSION["error"]);
            header("location:/welcome");
        }

        //清空 user 信息
        if(isset($_SESSION["user_info"])){
            unset($_SESSION["user_info"]);
        }

        $view = 'login/login.tpl';
        try{
            $this->tpl->display($view);//显示模板文件
        }catch (\Exception $exception){
            return "模板渲染失败".$exception->getMessage();
        }
    }

    public function login($data){
        //清空 user 信息
        if(isset($_SESSION["user_info"])){
            unset($_SESSION["user_info"]);
        }

        //验证
        if(!isset($_REQUEST['account']) || !isset($_REQUEST['password'])){
            $_SESSION["have_login"] = false;
            $_SESSION["error"] = "请输入您的账号和密码.";
            header("location:/login");
        }else{
            $account = $_REQUEST['account'];
            $password = md5($_REQUEST['password']);
            $user = User::where('account',$account)->where('password',$password)->first();
            if ($user) {
                $_SESSION["have_login"] = true;
                $_SESSION["success"] = "登录成功";
                unset($_SESSION["error"]);
                $_SESSION["user_info"] = $user;
                if($user->is_admin == 1){
                    header("location:/welcome");
                }else{
                    header("location:/vote");
                }
            }else{
                $_SESSION["have_login"] = false;
                $_SESSION["error"] = "账号和密码错误,请重新输入.";
                header("location:/login");
            }
        }

    }

    public function logout($data){

        //登录验证
        if (!isset($_SESSION["have_login"]) or $_SESSION["have_login"] === false) {
            $_SESSION["have_login"] = false;
            $_SESSION["error"] = "请登录.";
            header("location:/login");
        }

        //安全退出处理
        $_SESSION["have_login"] = false;
        unset($_SESSION["user_info"]);
        session_destroy();
        header("location:/login");
    }
}
