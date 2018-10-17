<?php
isset($_SESSION) || session_start();
// error_reporting(0);
$dir = dirname(dirname(__FILE__));
// D:\phpStudy\PHPTutorial\WWW\mycode\admin
require $dir . '/class/DB.class.php';

// 数据库连接配置
$dbconfig               = [];
$dbconfig['host']       = 'localhost';      //数据库服务器地址
$dbconfig['username']   = 'root';           //数据库账号
$dbconfig['passwd']     = 'root';           //密码
$dbconfig['database']   = 'mianshiti';   //数据库
$dbconfig['port']       = 3306;             //端口号

// 创建一个DB对象
$mysql = new DB($dbconfig);

// 引入公用函数
require $dir . '/common/function.php';

