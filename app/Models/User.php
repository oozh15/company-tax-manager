<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model {
    
    protected $table = 'users';

    /**
     * Find user by email for login
     */
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_OBJ); // Returns as Object for OOP access
    }

    /**
     * Register a new user (Company level logic)
     */
    public function register($data) {
        $sql = "INSERT INTO {$this->table} (name, email, password, role) 
                VALUES (:name, :email, :password, :role)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'], // Already hashed in Controller
            'role'     => $data['role']
        ]);
    }

    /**
     * Get user profile with total expenses
     */
    public function getUserStats($userId) {
        $sql = "SELECT u.*, COUNT(e.id) as total_submissions 
                FROM users u 
                LEFT JOIN expenses e ON u.id = e.user_id 
                WHERE u.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}