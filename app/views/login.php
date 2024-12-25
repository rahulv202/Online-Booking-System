<div class="container">
    <h1 class="mt-5">Login</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form method="POST" action="/login" class="mt-4">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <!-- <input type="text" class="form-control" id="role" name="role" placeholder="Role" required> -->
            <select class="form-control" id="role" name="role">
                <option value="">select role</option>
                <option value="">select role</option>
                <option value="admin">Admin</option>
                <option value="provider">Service Provider</option>
                <option value="customer">Customer</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <p class="mt-3"><a href="/register">Register</a></p>
    </form>
</div>