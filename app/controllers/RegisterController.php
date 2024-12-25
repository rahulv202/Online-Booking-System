<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;

class RegisterController extends Controller
{
    public function index()
    {
        $this->view('register');
    }

    public function register()
    {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $role = sanitize($_POST['role']);
        $password = sanitize($_POST['password']);

        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $role = htmlspecialchars($role);
        $password = htmlspecialchars($password);

        // Validate required fields
        if (!validateRequired($name) || !validateRequired($email) || !validateRequired($role) || !validateRequired($password)) {
            $error = "All fields are required.";
            $this->view('register', ['error' => $error]);
            return;
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $user_model = Users::getInstance();
        if (!empty($user_model->find('email', $email))) {
            $error = "Email already exists.";
            $this->view('register', ['error' => $error]);
            return;
        }
        // Create user
        if (!empty($user_model->save(['name', 'email', 'password', 'role'], [$name, $email, $hashedPassword, $role]))) {
            // $success = "User registered successfully.";
            // $this->view('/login', ['success' => $success]);
            $this->redirect('/login');
        } else {
            $error = "Failed to register user.";
            $this->view('register', ['error' => $error]);
        }
    }
}
