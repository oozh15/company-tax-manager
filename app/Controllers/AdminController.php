<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Expense; // To view all company expenses

class AdminController extends Controller {
    
    public function __construct() {
        // Middleware: Only Admin can access
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: /dashboard');
            exit();
        }
    }

    public function settings() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newRate = $_POST['tax_rate'];
            // Logic to update tax_settings table via Model
        }
        $this->view('admin/settings');
    }

    public function reports() {
        $expenseModel = new Expense();
        $data['all_expenses'] = $expenseModel->getAllWithUsers();
        $this->view('admin/reports', $data);
    }
}