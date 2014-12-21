<?php
    // 打印数组
    function p($array){
       dump($array,1,'<pre>',0);
    }
	// 发布内容的表情替换
	function replace_phiz($content){
	$phiz=array (
             'zhuakuang' => '抓狂',
             'baobao' => '抱抱',
             'haixiu' => '害羞',
             'ku' => '酷',
             'xixi' => '嘻嘻',
             'taikaixin' => '太开心',
             'touxiao' => '偷笑',
             'qian' => '钱',
             'huaxin' => '花心',
             'jiyan' => '挤眼',
        );
	   preg_match_all('/\[.*?\]/is',$content,$arr);
	   if($arr[0]){
		 foreach($arr[0] as $v){
		    foreach($phiz as $key=>$value){
			   if($v=='['.$value.']'){
			     $content=str_replace($v,'<img src="'.__ROOT__.'/Public/Images/phiz/'.$key.'.gif"/>',$content);
               break;
			   }
			}
		 }
	   }
	   return $content;
	}
?>
