<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $role = sanitize($_POST['role']);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $role = htmlspecialchars($role);

        // Validate required fields
        if (!validateRequired($email) || !validateRequired($password) || !validateRequired($role)) {
            $error = "All fields are required.";
            $this->view('login', ['error' => $error]);
            return;
        }
        // Validate email format
        if (!validateEmail($email)) {
            $error = "Invalid email format.";
            $this->view('login', ['error' => $error]);
            return;
        }
        // Check if user exists
        $user_model = Users::getInstance();
        $user = $user_model->find('email', $email);
        if (!$user) {
            $error = "Invalid email or password.";
            $this->view('login', ['error' => $error]);
            return;
        }
        // Check password
        $hashedPassword = $user['password'];
        if (!password_verify($password, $hashedPassword)) {
            $this->view('login', ['error' => 'Invalid email or password.']);
            return;
        }
        // check role
        if ($user['role'] != $role) {
            $this->view('login', ['error' => 'Invalid email or password or role.']);;
            return;
        }
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_login'] = true;
        // Redirect to dashboard
        $this->redirect('/dashboard');
    }
}
