<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Services;

class ServiceController extends Controller
{
    public function  manageServices()
    {
        $service_model = Services::getInstance();
        $services = $service_model->getAllData();
        $this->view('services/list', ['services' => $services]);
    }

    public function addService()
    {
        $this->view('services/add');
    }

    public function saveService()
    {
        $name = sanitize($_POST['name']);
        $description = sanitize($_POST['description']);
        $price = sanitize($_POST['price']);

        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $price = htmlspecialchars($price);

        // Validate required fields
        if (!validateRequired($name) || !validateRequired($description) || !validateRequired($price)) {
            $error = "All fields are required.";
            $this->view('services/add', ['error' => $error]);
            return;
        }

        $service_model = Services::getInstance();
        if ($service_model->save(['provider_id', 'name', 'description', 'price'], [$_SESSION['user_id'],  $name,  $description, $price])) {
            $this->redirect('/manage-services');
        } else {
            $error = "Failed to save service.";
            $this->view('services/add', ['error' => $error]);
        }
    }

    public function editService($id)
    {
        $id = sanitize($id);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $service_model = Services::getInstance();
        $service = $service_model->find('id', $id);
        $this->view('services/edit', ['service' => $service]);
    }

    public function updateService()
    {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $description = sanitize($_POST['description']);
        $price = sanitize($_POST['price']);

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $price = htmlspecialchars($price);

        // Validate required fields
        if (!validateRequired($name) || !validateRequired($description) || !validateRequired($price)) {
            $error = "All fields are required.";
            $this->view('services/edit', ['error' => $error]);
            return;
        }

        $service_model = Services::getInstance();
        if ($service_model->update(['name' => $name, 'description' => $description, 'price' => $price], $id)) {
            $this->redirect('/manage-services');
        } else {
            $error = "Failed to update service.";
            $this->view('services/edit', ['error' => $error]);
        }
    }

    public function deleteService($id)
    {
        $id = sanitize($id);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $service_model = Services::getInstance();
        if ($service_model->delete($id)) {
            $this->redirect('/manage-services');
        } else {
            $error = "Failed to delete service.";
            $this->view('services/list', ['error' => $error]);
        }
    }
}
