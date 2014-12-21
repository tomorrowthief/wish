<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
	public function index() {
		session ( 'username', 'admin' );
		// $_SESSION['username']='admin';
		// var_dump(C('SESSION_AUTO_START'));
		// echo $_SESSION['username'];
		// die;
		$this->display ();
	}
	Public function login() {
		if (! IS_POST)
			halt ( 'bucunzai' );
		if (I ( 'code', '', 'md5' ) != session ( 'verify' )) {
			$this->error ( 'verify error' );
		}
		$username = I ( 'username' );
		$pwd = I ( 'password', '', 'md5' );
		$user = M ( 'user' )->where ( array (
				'username' => $username 
		) )->find ();
		if (! $user || $user ['password'] != $pwd) {
			$this->error ( 'password or testname error' );
		}
		if ($user ['lock'])
			$this->error ( 'test locked' );
		$data = array (
				'id' => $user ['uid'],
				'logintime' => time (),
				'loginip' => get_client_ip () 
		);
		M ( 'user' )->save ( $data );
		session ( C ( 'USER_AUTH_KEY' ), $user ['id'] );
		session ( 'username', $user ['username'] );
		session ( 'logintime', date ( 'Y-m-d H:i:s', $user ['logintime'] ) );
		session ( 'loginip', $user ['loginip'] );
		// 超级管理员识别 读取权限
		if ($user ['username'] == C ( 'RBAC_SUPERADMIN' )) {
			session ( C ( 'ADMIN_AUTH_KEY' ), true );
		}
		import ( 'ORG.Util.RBAC' );
		RBAC::saveAccessList ();
		$this->redirect ( 'Admin/Index/index' );
	}
	Public function verify() {
		import ( 'ORG.Util.Image' );
		Image::buildImageVerify ( 1, 1, 'png', 80, 25, 'verify' );
	}
}