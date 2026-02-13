<?php
namespace App\Core;

class Controller {
    // Load the View file and pass data to it
    public function view($view, $data = []) {
        // Extract data array into variables for the view
        extract($data);

        if (file_exists("../app/Views/{$view}.php")) {
            require_once "../app/Views/{$view}.php";
        } else {
            die("View '{$view}' does not exist.");
        }
    }

    // Secure redirection
    public function redirect($url) {
        header("Location: " . URLROOT . "/" . $url);
        exit();
    }
}