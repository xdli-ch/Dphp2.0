<?php
namespace App\Controllers;

use App\Models\User;
class WelcomeController extends AuthController
{
    public function index($data)
    {
        $view = 'welcome.tpl';

        try{
            $this->tpl->display($view);//显示模板文件
        }catch (\Exception $exception){
            return "模板渲染失败";
        }
    }
}
