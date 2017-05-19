Restfule Base On Yii2 
==========================



## 命令行下以此执行以下命令

- cd /data/
- git clone https://github.com/halfstring/yii2-basic-restful
- cd yii2-basic-restful
- cp vagrant/restful.conf  /etc/nginx/conf.d/  #根据实际请求修改 line 14-15
- vi /etc/hosts  追加记录   127.0.0.1   restful.api.com
- 安装composer 并设置国内源 具体参照  [国内composer源](https://pkg.phpcomposer.com/)
- composer require "fxp/composer-asset-plugin:^1.3.1"
- composer install  ##可能慢些，耐心等待
- 登录mysql，执行： create database db_restful; # 完成数据库的创建；
- vim  /data/yii2-basic-restful/config/db.php #修改数据库连接密码
- ./yii migrate #并根据提示输入yes  完成数据表结构
- ./yii gii/model --tableName=restful_user --modelClass=User #gii生成model： User
- ./yii migrate/create loadUserData  # 在新生成的migrates/mxxxx_xxxx_loadUserData.php 中打开  function up 输入如下内容


``` php 
 $cols = [
            'name',
            'age',
            'mobile',
            'address'
        ];
        
        
$rows = [];
for ($i = 0; $i < 10; $i++) {
    $rows[] = ['张' . $i, 25 + $i, '1380000000' . $i, '帝都XX东路30' . $i . '号'];
}


$this->batchInsert(\app\models\User::tableName(), $cols, $rows);
```

- 执行 ./yii migrate 导入新增数据变更


- 安装postman 调试如下接口


- GET http://restful.api.com/user 		#用户列表
- GET http://restful.api.com/user/2 	#用户2明细
- POST http://restful.api.com/user 		#用户新建
- PUT http://restful.api.com/user/2 	#用户修改

## 如何基于yii2-restful自定义接口呢

例如自定义 search 接口 传入keyword关键字
新增路由见 /config/routes.php

逻辑代码见，/controller/UserController.php  line66-90



- GET http://restful.api.com/user/search?keyword=张  # 用户检索 

## 文章出处

 该库为文章[yii2-restful](http://www.halfstring.com/2017/05/19/yii2-restful/)辅助库
