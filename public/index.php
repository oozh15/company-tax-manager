<?php
use App\Core\App;
use App\Helpers\Session;

// Load Config
require_once '../config/config.php';

// Autoloading Classes (Advanced OOP)
spl_autoload_register(function ($className) {
    // Convert namespace to file path (e.g., App\Core\Database -> ../app/Core/Database.php)
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . $path . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// Initialize Session
Session::init();

// Initialize the Core Engine (Routing)
$app = new App();