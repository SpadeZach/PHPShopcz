<?php 

	//基础控制器
 	class Controller{
 		//定义跳转方法
 		public function jump($url,$message,$wait = 3){
 			if ($wait == 0) {
 				header("Location:$url");
 			}else{
 				include CUR_VIEW_PATH ."message.html";
 			}
 			//要强制退出,防止再跳下去
 			exit();
 		}

 		//定义载入辅助函数方法
 		public function helper(){
 			require LIB_PATH . "$lib.class"
 		}

 		//定义载入类库方法
 		public function library(){

 		}
 	}

 ?>