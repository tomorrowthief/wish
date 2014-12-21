<?php
return array (
		'RBAC_SUPERADMIN' => 'admin',
		'ADMIN_AUTH_KEY' => 'superadmin',
		'USER_AUTH_ON' => true,
		'USER_AUTH_TYPE' => 1, // 验证类型（1，登陆验证，2时时验证）
		'USER_AUTH_KEY' => 'uid', // 用户识别号
		'NOT_AUTH_MODULE' => 'index', // 无需验证的控制器
		'NOT_AUTH_ACTION' => 'setaccess,addNodehandle,addrolehandle,addUserhandle', // 无需验证的方法
		'RBAC_ROLE_TABLE' => 'hd_role',
		'RBAC_USER_TABLE' => 'hd_role_user',
		'RBAC_ACCESS_TABLE' => 'hd_access',
		'RBAC_NODE_TABLE' => 'hd_node',
		'RBAC_DB_DSN'=> 'mysql://root@127.0.0.1:3306/think',
		'USER_AUTH_MODUEL'=>'User',
		// '配置项'=>'配置值'
		'TMPL_PARSE_STRING' => array (
				'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Core/Admin/Tpl/Public' 
		),
		'URL_HTML_SUFFIX' => '' 
);
?>