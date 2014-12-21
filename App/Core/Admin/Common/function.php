<?php 
/** 
* 递归自己也是明白了个大概，但是想的深入了还是有点晕
* tags 
* @param unknowtype 
* @return return_type 
* @author  Zx_Liu
* @date 2014-11-15下午3:12:36 
* @version v1.0.0 
*/
function node_merge ($node,$access=null,$pid=0){
	$arr=array();
	
	foreach ($node as $v){
		if(is_array($access)){
			$v['access']=in_array($v['id'],$access)?1:0;
		}
		if($v['pid']==$pid){
			$v['child']=node_merge($node,$access,$v['id']);
			$arr[]=$v;
		}
	}
	return $arr;
}
?>