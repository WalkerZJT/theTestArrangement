<?php
	//1.确定应用名称 Home
	define("APP_NAME","Home");
	//2。确定应用路径,所有的应用的首字母名称都是大写
	define("APP_PATH","./Home/");
	//3.引入核心文件
	require"./ThinkPHP/ThinkPHP.php";
	//include的作用和require的作用都是一样的，但是require得要求更加严谨
	//开启调试模式
	define('APP_DEBUG',true);
?>