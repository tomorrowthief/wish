<?php
return array(
	//'配置项'=>'配置值'
	'LAYOUT_ON'=>true,
	//分组
	    'APP_GROUP_LIST' => 'Index,Admin', //项目分组设定
        'DEFAULT_GROUP'  => 'Index', //默认分组
    //独立分组
		'APP_GROUP_MODE' => 1,
		'APP_GROUP_PATH' => Core,
	//数据库配置信息
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => 'localhost', // 服务器地址
        'DB_NAME'   => 'think', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '', // 密码
        'DB_PREFIX' => 'hd_', // 数据库表前缀
   //大小写关闭     
		'URL_CASE_INSENSITIVE'  => true,
		
	//点语法配置	
	    'TMPL_VAR_IDENTIFY'=>'array',
	// 模板路径
	    'TMPL_FILE_DEPR'=>'_',
	//session 数据库存储
   // 'SESSION_TYPE'	=>'Db',
// 	    'SESSION_TYPE'	=>'Redis',
	//redis 服务器地址 端口
         'REDIS_HOST'=>'127.0.0.1',
		 'REDIS_PORT'=>6379,	
);
?>