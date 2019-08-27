# RBAC base on laravel

## 用途
- 快速构建后台管理系统

## 功能
- 控制台 - 主页、用户、角色、权限、菜单
- 开发示例 - 通用列表、基础表单、高级表单、常用图标

## 特征
- 菜单只支持两级，没有操作日志，RBAC2.pdf里展示了后续的设计
- 菜单显示与功能权限分别配置，权限控制到每一个接口
- 开发实例避免了开发者再去业务代码里复制粘贴以及删删改改

## 部署

```
server {
   listen 80;
   server_name local.admin;
   root /Users/fanzhen/data/mine/admin/public;
   index index.html
   index.php;
   location / {
        try_files $uri $uri/
        /index.php$is_args$query_string;
   }
   location ~ \.php$ {
        try_files $uri =404;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME
        $document_root$fastcgi_script_name;
        include fastcgi_params;
   }
}
```

```
composer install && composer dumpauto
cp .env.example .env
storage 目录和 bootstrap/cache 目录应该允许 Web 服务器写入
导入init.sql
```

## 登录
- 手机号: 18513417479
- 密码: 123456

## 使用
- 新建权限，填入路由
- 新建角色，选择权限
- 新建用户，选择角色
- 新建菜单，选择角色
