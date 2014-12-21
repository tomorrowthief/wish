<?php
Class RbacAction extends CommonAction{
	
	//user tables
	Public function index(){
		$this->user=D('UserRelation')->field('password',true)->relation(true)->select();
		$this->display();
	}
	
	
	// role tables
	Public function role(){
		$this->role=M('role')->select();
		$this->display();
	}
	
	
	//node tables
	Public function node(){
		$field=array('id','name','title','pid');
		$node=M('node')->field($field)->order('sort')->select();
// 		p($node);die;//
        $this->node=node_merge($node);
//         p($node);die;//
		$this->display();
	}
	
	
	// add user
	Public function addUser(){
		$role=M('role')->select();
	    $this->role=$role;
		$this->display();
	}
	//add user handle
	Public function addUserhandle(){
		$user=array(
// 				'id'=>1,
			   'username'=>I('username'),
			   'password'=>I('password', ' ', 'md5'),
			   'logintime'=>time(),
               'loginip'=>get_client_ip(),
				'lock'=>0
		);
		$role=array();
		if($uid=M('user')->add($user)){
			foreach ($_POST['role_id'] as $v){
				$role[]=array(
					'role_id'=>$v,
					'user_id'=>$uid	
				);
			}
			
			M('role_user')->addAll($role);
			$this->success('添加成功',U('Admin/Rbac/index'));
		}else{
			$this->error('添加失败');
		}
	}
	
	//add role
	Public function addRole(){
		$this->display();
	}
	
	
	//添加角色表单处理
	Public function addrolehandle(){
// 		p($_POST);
		if(M('role')->add($_POST)){
			$this->success('success',U('Admin/Rbac/role'));
		}else{
			$this->error('fail');
		}
	}
	
	
	//add node
	Public function addNode(){
// 		p($_GET);die;
        $this->pid=I('pid',0,'intval');
        $this->level=I('level',1,'intval');
        switch($this->level){
        	case 1;
        		$this->type='应用';
        		break;
        	case 2;
        		$this->type='控制器';
        		break;
        	case 3;
        		$this->type='动作方法';
        		break;
        }
//         p($_GET);die;
		$this->display();
	}
	
	
	Public function addNodehandle(){
// 		p($_POST);
		if(M('node')->add($_POST)){
			$this->success('success',U('Admin/Rbac/node'));
		}else{
			$this->error('fail');
		}
	}
	
	
	Public function access(){
		$rid=I('rid',0,'intval');
		$field=array('id','name','title','pid');
		$node=M('node')->order('sort')->field($field)->select();

        $access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);

        $this->node=node_merge($node,$access);
		$this->rid=$rid;
		$this->display();
	}
	
	
	public function setaccess(){
		$rid=I('rid',0,'intval');
		$db=M('access');
		$db->where(array('role_id'=>$rid))->delete();
		
		$data=array();
		foreach ($_POST['access'] as $v){
			$tmp=explode('_',$v);
			$data[]=array(
				'role_id'=>$rid,
			    'node_id'=>$tmp[0],
				'level'=>$tmp[1]
			);
		}
		if($db->addAll($data)){
			$this->success('修改成功',U('Admin/Rbac/role'));
		}	else{
			$this->error('修改失败');
		}
	}
}
?>
