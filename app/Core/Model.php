<?php
namespace App\Core;

abstract class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Advanced: A generic method to find a single record by ID
    public function findById($table, $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}