<div class="container">
    <h1 class="mt-5">Dashboard</h1>
    <p>Welcome, <?php echo $user['name']; ?>!</p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Role: <?php echo $user['role']; ?></p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>