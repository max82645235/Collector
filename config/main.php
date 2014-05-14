<?php
$config = array(
    'dbConfig'=>array(
        'hostname'=>'localhost',//服务器地址
        'username'=>'root',//数据库用户名
        'password'=>'',//数据库密码
        'database'=>'collector',//数据库名称
        'charset'=>'utf8',//数据库编码
        'pconnect'=>1,//开启持久连接
        'log'=>1,//开启日志
        'logfilepath'=>'./log/'//开启日志
    )
);
return $config;