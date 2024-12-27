<div class="container">
    <h1 class="mt-5">Dashboard</h1>
    <p>Welcome, <?php echo $user['name']; ?>!</p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Role: <?php echo $user['role']; ?></p>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ($user['role'] == 'admin') : ?>
                    <h3>Admin Actions</h3>
                    <a href="/manage-users" class="btn btn-primary">Manage Users</a>
                    <a href="/manage-services" class="btn btn-primary">Manage Services</a>
                    <a href="/manage-bookings" class="btn btn-primary">Manage Bookings</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>