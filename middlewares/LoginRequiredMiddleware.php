<?php
require_once '..\framework\BaseMiddleware.php';

class LoginRequiredMiddleware extends BaseMiddleware {
    public function apply(CommonController $controller, array $context) {
		$is_logged=isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
		//$url = isset($_SERVER['HTTP_REFERER']) ? substr($_SERVER['HTTP_REFERER'], 19) : '';
		if(!$is_logged){
			header("Location: /login");
			exit;
		}
	}
}