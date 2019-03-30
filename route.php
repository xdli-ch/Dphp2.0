<?php
/**
 * Created by PhpStorm
 * User: xdli
 * E-mail: 2538865111@qq.com
 * Date: 2019/2/27
 * Time: 下午2:23
 */
return function(FastRoute\RouteCollector $r) {

//    // {id} 必须是一个数字 (\d+)
//    $r->addRoute('GET', '/user/{id:\d+}', 'WellcomeController');
//    //  /{title} 后缀是可选的
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'WellcomeController');

    //测试
    $r->addRoute('GET', '/test', 'TestController@index');

    //账户登录
    $r->addRoute('GET', '/login', 'LoginController@index');
    $r->addRoute('POST', '/login', 'LoginController@login');
    $r->addRoute('POST', '/logout', 'LoginController@logout');

    //主面板
    $r->addRoute('GET', '/', 'WelcomeController@index');
    $r->addRoute('GET', '/welcome', 'WelcomeController@index');

};