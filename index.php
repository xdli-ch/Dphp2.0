<?php

require 'init.php';

/*
 * 引入自动加载
 * */
require 'vendor/autoload.php';

/*
 * 引入 Eloquent ORM
 * */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection(require APP_PATH.'/Configs/database.php');

$capsule->bootEloquent();

/*
 * 引入smarty 模板
 * */
require("smarty/config/smarty.inc.php");

/*
 * 开启 session
 */
session_start();

/*
 * 实现路由
 * */
$dispatcher = FastRoute\simpleDispatcher(require 'route.php');

// 获取请求的方法和 URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// 去除查询字符串( ? 后面的内容) 和 解码 URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found 没找到对应的方法
        echo "404 Not Found 没找到对应的方法";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed  方法不允许
        print_r($allowedMethods);
        echo "405 Method Not Allowed  方法不允许";
        break;
    case FastRoute\Dispatcher::FOUND: // 找到对应的方法
        $handler = $routeInfo[1]; // 获得处理函数
        $vars = $routeInfo[2]; // 获取请求参数
        $temp = explode('@', $handler);
        $className = 'App\\Controllers\\'.$temp[0];
        $method = $temp[1]??'index';
        $handlerObj = new $className();
        $res = $handlerObj->$method($vars);
        echo $res;
        break;
}