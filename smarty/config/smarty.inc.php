<?php

define('SMARTY_PATH',dirname(dirname(__FILE__)));

include(SMARTY_PATH."/Smarty.class.php");//引入文件类

$tpl=new Smarty();
$tpl->template_dir=APP_PATH."/Views";//指定模版存放目录
$tpl->compile_dir=SMARTY_PATH."/templates_c";//指定编译文件存放目录
$tpl->config_dir=SMARTY_PATH."/config";//指定配置文件存放目录
$tpl->cache_dir=SMARTY_PATH."/cache";//指定缓存存放目录

$tpl->caching=false;//关闭缓存（设置为true表示启用缓存）
//$tpl->cache_lifetime=60*60*24;

$tpl->allow_php_templates = true;//允许{php}{/php}

$tpl->left_delimiter='{';//指定左标签
$tpl->right_delimiter='}';//指定右标签