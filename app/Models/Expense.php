<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Expense extends Model {

    protected $table = 'expenses';

    /**
     * Save a new expense with tax and receipt details
     */
    public function save($data) {
        $sql = "INSERT INTO {$this->table} 
                (user_id, amount, tax_amount, description, receipt_path, expense_date) 
                VALUES (:user_id, :amount, :tax_amount, :description, :receipt_path, NOW())";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'user_id'      => $data['user_id'],
            'amount'       => $data['amount'],
            'tax_amount'   => $data['tax_amount'],
            'description'  => $data['description'],
            'receipt_path' => $data['receipt_path'] // Stores the filename/path
        ]);
    }

    /**
     * Advanced Query: Get all expenses with Category and User names
     * Used for Admin Reports
     */
    public function getAllWithUsers() {
        $sql = "SELECT e.*, u.name as employee_name, c.name as category_name 
                FROM {$this->table} e
                JOIN users u ON e.user_id = u.id
                LEFT JOIN categories c ON e.category_id = c.id
                ORDER BY e.expense_date DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Logic: Calculate total tax deductible for a specific user
     */
    public function getUserTaxTotal($userId) {
        $stmt = $this->db->prepare("SELECT SUM(tax_amount) as total_tax FROM {$this->table} WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_OBJ)->total_tax ?? 0;
    }
}