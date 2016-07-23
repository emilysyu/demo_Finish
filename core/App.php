<?php
class App {
	
	
	/*
	拿 url[0] 當 controller 名稱
	拿 url[1] 當 方法(Function) 名稱
	
	其餘的都當成參數
	*/
	public function __construct() {
		$url = $this->parseUrl ();
		
		$controllerName = "{$url[0]}Controller";  //homeController
		if (! file_exists ( "controllers/$controllerName.php" ))
			return;
		require_once "controllers/$controllerName.php";
		$controller = new $controllerName ();
		
		
		$methodName = isset ( $url [1] ) ? $url [1] : "index"; //hello
		if (! method_exists ( $controller, $methodName ))
			return;
		unset ( $url [0] ); unset ( $url [1] );
		
		
		
		$params = $url ? array_values ( $url ) : Array ();
		
		//使用 ???Controller 呼叫他的 ???fucntion (方法) 傳入 參數($params)
		/*
			$controller->function(params);
			
			class XXXController {
				login($account){
					
				}
			
			}
			
			$Home = new HomeController();
			$Home->login($account);
		
		*/
		call_user_func_array ( Array($controller,$methodName), $params );
	}
	
	
	/* 這個東西>>.htaccess 會解析URL 
	從 http://google.com/home/hello/emliy/001/002/003
	變成 http://google.com/index.php?url=home/hello/emliy/001/002/003
	>>>>>>>
	
	
	$_GET ["url"] = home/hello/emliy/001/002/003
	*/
	public function parseUrl() {
		if (isset ( $_GET ["url"] )) {
			$url = rtrim ( $_GET ["url"], "/" );
			$url = explode ( "/", $url );
			return $url;
		}
	}
}

?>
