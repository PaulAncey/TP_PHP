<?php
class Router {
    private static $routes = [];

    public static function get($url, $action) {
        self::$routes['GET'][$url] = $action;
    }

    public static function post($url, $action) {
        self::$routes['POST'][$url] = $action;
    }

    public static function dispatch($requestUri, $requestMethod) {
        if (isset(self::$routes[$requestMethod][$requestUri])) {
            call_user_func(self::$routes[$requestMethod][$requestUri]);
        } else {
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée";
        }
    }
}
?>
