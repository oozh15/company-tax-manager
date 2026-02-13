<?php
namespace App\Helpers;

class Validator {
    /**
     * Check if required fields are present
     */
    public static function required($data, $fields) {
        $errors = [];
        foreach ($fields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $errors[$field] = ucfirst($field) . " is required.";
            }
        }
        return $errors;
    }

    /**
     * Sanitize strings to prevent XSS (Cross-Site Scripting)
     */
    public static function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    /**
     * Validate Email format
     */
    public static function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}