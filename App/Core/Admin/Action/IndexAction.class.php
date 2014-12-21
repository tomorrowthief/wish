<?php
class IndexAction extends CommonAction {
    public function index(){
	   $this->display();
    }
	 public function logout(){
	  session(null);
	  $this->redirect('Admin/Index/index');
    }
}
?>