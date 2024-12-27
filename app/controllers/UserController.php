<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;

class UserController extends Controller
{
    public function manageUsers()
    {
        $user_model = Users::getInstance();
        $users = $user_model->getAllData("role!='admin'");
        return $this->view('users/list', ['users' => $users]);
    }

    public function editUser($id)
    {
        $user_model = Users::getInstance();
        $user = $user_model->find('id', $id);
        return $this->view('users/edit', ['user' => $user]);
    }

    public function updateUser()
    {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $role = sanitize($_POST['role']);

        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $role = htmlspecialchars($role);
        $id = htmlspecialchars($id);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if (!validateRequired($name) || !validateRequired($email) || !validateRequired($role)) {
            $error = "All fields are required.";
            $this->view('users/edit', ['user' => $_POST, 'error' => $error]);
            return;
        }
        $user_model = Users::getInstance();
        if ($user_model->update(['name' => $name, 'email' => $email, 'role' => $role], $id)) {
            $this->redirect("/{$_SESSION['user_role']}/manage-users");
        } else {
            $error = "Failed to update user.";
            $this->view('users/edit', ['user' => $_POST, 'error' => $error]);
        }
    }

    public function deleteUser($id)
    {
        $user_model = Users::getInstance();
        if ($user_model->delete($id)) {
            $this->redirect("/{$_SESSION['user_role']}/manage-users");
        } else {
            $error = "Failed to delete user.";
            $this->view('users/list', ['error' => $error]);
        }
    }
}
