<?php
require_once '..\framework\BaseMiddleware.php';

class LoginRequiredMiddleware extends BaseMiddleware {
    public function apply(CommonController $controller, array $context) {
			$sql = <<<EOL
SELECT * FROM users
EOL;

        $query = $controller->pdo->prepare($sql);
        $query->execute();

        $data = $query->fetchAll();

				$user = isset($_SERVER['PHP_AUTH_USER']) ?$_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ?$_SERVER['PHP_AUTH_PW'] : '';
				$is_correct=false;

				foreach ($data as $item) {
					$valid_user = $item['username'];
					$valid_password = $item['password'];

					if ($valid_user == $user && $valid_password ==$password) {
					$is_correct=true;
					break;
				}
			}
			if (!$is_correct) {
				header('WWW-Authenticate: Basic realm="Space objects"');
				http_response_code(401); // ну и статус 401 -- Unauthorized, то есть неавторизован
				exit;
			}
    }
}