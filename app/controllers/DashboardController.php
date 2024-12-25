<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;


class DashboardController extends Controller
{
    public function index()
    {
        $user_model = Users::getInstance();
        $user = $user_model->find('email', $_SESSION['user_email']);
        $this->view('dashboard', ['user' => $user]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
