<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Bookings;
use App\Models\Users;
use App\Models\Services;

class BookingController extends Controller
{
    public function manageBookings()
    {
        $bookings = Bookings::getInstance();
        $services_model = Services::getInstance();
        if ($_SESSION['user_role'] == 'admin') {
            $bookings = $bookings->getAllData("status='confirmed'");
            $user_model = Users::getInstance();
            foreach ($bookings as &$booking) {
                $users_data = $user_model->find("id", $booking['customer_id']); //getAllData
                $services_data = $services_model->find("id", $booking['service_id']); //getAllData
                $booking['service_name'] = $services_data['name'];
                $booking['service_description'] = $services_data['description'];
                $booking['service_price'] = $services_data['price'];
                $booking['user_name'] = $users_data['name'];
            }
            $this->view('bookings/list', ['bookings' => $bookings]);
        } else if ($_SESSION['user_role'] == 'provider') {
            $services_data = $services_model->getAllData("provider_id={$_SESSION['user_id']}"); //getAllData
            $services_id = [];
            //print_r($services_data);
            foreach ($services_data as $service) {
                $services_id[] = $service['id'];
            }
            $services_id = array_map('intval', $services_id); // Ensure all values are integers
            $services_id_list = implode(',', $services_id);  // Create a comma-separated list
            $bookings = $bookings->getAllData("status='confirmed' AND service_id IN ($services_id_list)");
            $user_model = Users::getInstance();
            foreach ($bookings as &$booking) {
                $users_data = $user_model->find("id", $booking['customer_id']); //getAllData
                $services_data_new = $services_model->find("id", $booking['service_id']); //getAllData
                $booking['service_name'] = $services_data_new['name'];
                $booking['service_description'] = $services_data_new['description'];
                $booking['service_price'] = $services_data_new['price'];
                $booking['user_name'] = $users_data['name'];
            }
            $this->view('bookings/list', ['bookings' => $bookings]);
        } else {
            $bookings = $bookings->getAllData("status='confirmed' AND user_id={$_SESSION['id']}");
            foreach ($bookings as &$booking) {
                $services_data = $services_model->find("id={$booking['service_id']}"); //getAllData
                $booking['service_name'] = $services_data['name'];
                $booking['service_description'] = $services_data['description'];
                $booking['service_price'] = $services_data['price'];
                $booking['user_name'] = $_SESSION['user_name'];
            }
            $this->view('bookings/list', ['bookings' => $bookings]);
        }
    }

    public function confirmedBooking($booking_id)
    {
        $bookings = Bookings::getInstance();
        if ($bookings->update(['status' => 'confirmed'], $booking_id)) {
            $this->redirect("/{$_SESSION['user_role']}/manage-bookings");
        } else {
            $error = "Failed to confirmed Booking.";
            $this->view('bookings/list', ['error' => $error]);
        }
    }

    public function cancelledBooking($booking_id)
    {
        $bookings = Bookings::getInstance();
        if ($bookings->update(['status' => 'canceled'], $booking_id)) {
            $this->redirect("/{$_SESSION['user_role']}/manage-bookings");
        } else {
            $error = "Failed to cancelled Booking.";
            $this->view('bookings/list', ['error' => $error]);
        }
    }

    public function completedBooking($booking_id)
    {
        $bookings = Bookings::getInstance();
        if ($bookings->update(['status' => 'completed'], $booking_id)) {
            $this->redirect("/{$_SESSION['user_role']}/manage-bookings");
        } else {
            $error = "Failed to completed Booking.";
            $this->view('bookings/list', ['error' => $error]);
        }
    }

    public function bookService($service_id)
    {
        $bookings_model = Bookings::getInstance();
        if ($bookings_model->save(['service_id', 'customer_id', 'booking_date', 'time_slot', 'status'], [$service_id, $_SESSION['user_id'], date('Y-m-d'), date('H:i:s'), 'confirmed'])) {
            $this->redirect("/{$_SESSION['user_role']}/all-available-services");
        } else {
            $error = "Failed to book service.";
            $this->view('services/list', ['error' => $error]);
        }
    }
}
