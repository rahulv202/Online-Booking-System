<div class="container">
    <h1 class="mt-5">Manage Bookings</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Service</th>
                <th scope="col">User</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?php echo $booking['id']; ?></td>
                    <td><?php echo $booking['service_name']; ?></td>
                    <td><?php echo $booking['user_name']; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($booking['booking_date'])); ?></td>
                    <td><?php echo $booking['time_slot']; ?></td>
                    <td><?php echo $booking['status']; ?></td>
                    <td>
                        <a href="/<?php echo $_SESSION['user_role']; ?>/confirmed-booking/<?php echo $booking['id']; ?>" class="btn btn-sm btn-primary">Confirmed Booking</a>
                        <a href="/<?php echo $_SESSION['user_role']; ?>/cancelled-booking/<?php echo $booking['id']; ?>" class="btn btn-sm btn-danger">Cancelled Booking</a>
                        <a href="/<?php echo $_SESSION['user_role']; ?>/completed-booking/<?php echo $booking['id']; ?>" class="btn btn-sm btn-success">Completed Booking</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>