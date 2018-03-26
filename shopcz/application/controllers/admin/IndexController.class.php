<?php 

	class IndexController extends Controller{
		public function indexAction(){
			//光引入会报错因为index里面少下面4个方法
			include CUR_VIEW_PATH."index.html";
		}

		public function topAction(){
			include CUR_VIEW_PATH."top.html";
		}

		public function mainAction(){
			// include CUR_VIEW_PATH."main.html";
			//实例化admin模型
			$adminModel = new AdminModel("admin");
			$admins = $adminModel->test();
			var_dump($admins);
		}
		public function dragAction(){
			include CUR_VIEW_PATH."drag.html";
		}
		public function menuAction(){
			include CUR_VIEW_PATH."menu.html";
		}
	}

 ?>