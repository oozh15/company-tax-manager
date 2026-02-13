<?php
namespace App\Core;

class App {
    protected $currentController = 'AuthController'; // Default
    protected $currentMethod = 'login';             // Default
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // 1. Look for Controller in /app/Controllers/
        if (isset($url[0]) && file_exists('../app/Controllers/' . ucwords($url[0]) . 'Controller.php')) {
            $this->currentController = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../app/Controllers/' . $this->currentController . '.php';
        $fullControllerPath = "App\Controllers\\" . $this->currentController;
        $this->currentController = new $fullControllerPath;

        // 2. Look for Method (Action)
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // 3. Get remaining URL parts as Parameters
        $this->params = $url ? array_values($url) : [];

        // 4. Call the method with params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}