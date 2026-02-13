<?php
namespace App\Helpers;

class Session {
    // Start session if not started
    public static function init() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        session_unset();
        session_destroy();
    }

    /**
     * Flash Message Logic
     */
    public static function setFlash($name, $message) {
        $_SESSION['flash'][$name] = $message;
    }

    public static function getFlash($name) {
        if (isset($_SESSION['flash'][$name])) {
            $msg = $_SESSION['flash'][$name];
            unset($_SESSION['flash'][$name]);
            return $msg;
        }
        return null;
    }
}