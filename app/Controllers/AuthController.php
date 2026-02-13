<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Helpers\Session;

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $user = $this->userModel->findByEmail($email);
            
            if ($user && password_verify($password, $user->password)) {
                Session::set('user_id', $user->id);
                Session::set('user_role', $user->role);
                header('Location: /dashboard');
            } else {
                $data['error'] = "Invalid credentials";
                $this->view('auth/login', $data);
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => 'employee'
            ];
            
            if ($this->userModel->register($data)) {
                header('Location: /login');
            }
        }
        $this->view('auth/signup');
    }

    public function logout() {
        Session::destroy();
        header('Location: /login');
    }
}