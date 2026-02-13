<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Expense;
use App\Helpers\FileHandler; // Advanced OOP Trait

class ExpenseController extends Controller {
    use FileHandler; // Reusable logic for PDF/Images

    private $expenseModel;

    public function __construct() {
        $this->expenseModel = new Expense();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // 1. Logic: Auto-calculate Tax (e.g., 15%)
            $amount = $_POST['amount'];
            $taxRate = 0.15; 
            $taxAmount = $amount * $taxRate;

            // 2. Handle Image/PDF Upload
            $fileName = $this->uploadFile($_FILES['receipt'], 'public/uploads/');

            $data = [
                'user_id' => $_SESSION['user_id'],
                'amount' => $amount,
                'tax_amount' => $taxAmount,
                'receipt_path' => $fileName,
                'description' => $_POST['description']
            ];

            if ($this->expenseModel->save($data)) {
                header('Location: /expenses');
            }
        }
        $this->view('expenses/create');
    }
}