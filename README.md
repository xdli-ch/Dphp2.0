# Dphp
一款轻量级 php框架，遵循MVC设计模式，使用smarty模板作为模板引擎，实现自定义路由，使用ORM的数据库操作。

### 说明
该框架适用于中小型项目，灵活度高，自定义强。较 laravel框架来说，他舍弃了许多开发人员平时用不到的"鸡肋"功能，有利于提高业务效率
，也有利于新手的掌握，这样大大的降低了项目的维护成本(包括用人成本)。

### 要求
php >= 7.0

### 简介
单一入口为 index.php

利用 composer 的包的依赖管理

遵循MVC设计模式

数据的ORM操作参考文档：https://learnku.com/docs/laravel/5.8/eloquent/3931

自定义路由文件为：Dphp/route.php


### nginx配置建议
如果你使用 Nginx ，在你的站点配置中加入以下配置，所有的请求将会引导至 index.php 前端控制器。

```
location / {
     try_files $uri $uri/ /index.php?$query_string;
}
```

