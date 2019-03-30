# Dphp
一款轻量级 php框架，遵循MVC设计模式，使用smarty模板作为模板引擎，实现自定义路由，使用ORM的数据库操作。

###简介
单一入口为 index.php

利用 composer 的包的依赖管理

遵循MVC设计模式

数据的ORM操作参考文档：https://learnku.com/docs/laravel/5.8/eloquent/3931

自定义路由文件为：Dphp/route.php


###nginx配置建议
如果你使用 Nginx ，在你的站点配置中加入以下配置，所有的请求将会引导至 index.php 前端控制器。

```
location / {
     try_files $uri $uri/ /index.php?$query_string;
}
```

