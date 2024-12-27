<div class="container">
    <h1 class="mt-5">Dashboard</h1>
    <p>Welcome, <?php echo $user['name']; ?>!</p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Role: <?php echo $user['role']; ?></p>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ($user['role'] == 'admin' || $user['role'] == 'provider') : ?>
                    <h3><?php echo $_SESSION['user_role']; ?> Actions</h3>
                    <?php if ($user['role'] == 'admin') : ?>
                        <a href="/manage-users" class="btn btn-primary">Manage Users</a>
                    <?php endif; ?>
                    <a href="/<?php echo $_SESSION['user_role']; ?>/manage-services" class="btn btn-primary">Manage Services</a>
                    <a href="/<?php echo $_SESSION['user_role']; ?>/manage-bookings" class="btn btn-primary">Manage Bookings</a>
                <?php endif; ?>
                <?php if ($user['role'] == 'customer') : ?>
                    <h3>Customer Actions</h3>
                    <a href="/my-services" class="btn btn-primary">My Services</a>
                    <a href="/my-bookings" class="btn btn-primary">My Bookings</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>