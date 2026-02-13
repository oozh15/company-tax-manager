<?php
namespace App\Helpers;

trait FileHandler {
    /**
     * Advanced File Upload Logic (Supports Images & PDFs)
     */
    public function uploadFile($file, $destination) {
        if (empty($file['name'])) return null;

        $targetDir = rtrim($destination, '/') . '/';
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        // Generate a unique hash name for security (prevents overwriting)
        $fileName = bin2hex(random_bytes(10)) . "." . $fileType;
        $targetFile = $targetDir . $fileName;

        // Security: Allowed file types
        $allowed = ['jpg', 'jpeg', 'png', 'pdf'];
        
        if (in_array($fileType, $allowed)) {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $fileName;
            }
        }
        
        return false;
    }
}