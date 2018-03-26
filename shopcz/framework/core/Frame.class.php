<?php
	//入口文件
	class Frame{
		public static function main(){
			// echo "启动";
			self::init();
			self::autoload();
			self::router();
		}
		//初始化方法
		public static function init(){
			//定义路径,获取当前路径
			//DIRECTORY_SEPARATOR目录分隔符
			define("DS",DIRECTORY_SEPARATOR);
			define("ROOT",getcwd().DS);
			define("APP_PATH",ROOT."application".DS);
			define("FRAMEWORK_PATH",ROOT."framework".DS);
			define("PUBLIC_PATH",ROOT."public".DS);
			define("VIEW_PATH",APP_PATH."views".DS);
			define("MODEL_PATH",APP_PATH."models".DS);
			define("CONTROLLER_PATH",APP_PATH."controllers".DS);
			define("CONFIG_PATH",APP_PATH."Config".DS);
			define("CORE_PATH",FRAMEWORK_PATH."core".DS);
			define("DB_PATH",FRAMEWORK_PATH."database".DS);
			define("HELPER_PATH",FRAMEWORK_PATH."helpers".DS);
			define("LIBRARIY_PATH",FRAMEWORK_PATH."librariy".DS);
			//前后台控制器和视图目录定义
			//需要解析url参数,可以确定具体的路径
			define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p']:'admin');
			//ucfirst转为大写
			define("CONTROLLER", isset($_REQUEST['c']) ? ucfirst($_REQUEST['c']) :'Index');
			define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a']:'index');

			define("CUR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
			define("CUR_VIEW_PATH",VIEW_PATH . PLATFORM . DS);

			//手动载入核心类
			require CORE_PATH."Controller.php";
			require CORE_PATH."Model.class.php";
			require DB_PATH."Mysql.class.php";
			$GLOBALS['config'] = include CONFIG_PATH ."config.php";
		}
		//加载方法
		public static function autoload(){
			//如果是普通函数，只需要函数名
			//如果是类中，用数组定义
			//__CLASS__当前类
			spl_autoload_register(array(__CLASS__,'load'));
		}

		//自动加载方法
		public static function load($classname){
			//只负责application 下面的控制器类与model类 如goodController，AdminModel
			if (substr($classname,-10) == 'Controller') {
				//是控制器
				require CUR_CONTROLLER_PATH."{$classname}.class.php";
			}else if(substr($classname,-5) == 'Model'){
				// echo "haha";
				require MODEL_PATH . "{$classname}.class.php";
			}else{
				//其他情况 暂无
			}

		}

		//路由方法
		public static function router(){
			//确定类名方法名
			$controller_name = CONTROLLER."Controller"; //如goodController
			//方法名
			$action_name = ACTION."Action";
			//实例化控制器，然后调用相应方法
			$controller = new $controller_name;
			$controller -> $action_name();
		}
	}
	
	

	
?>