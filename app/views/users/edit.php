<div class="container">
    <h1 class="mt-5">Edit User</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/update-user" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="customer" <?php echo ($user['role'] === 'customer') ? "selected" : ""; ?>>Customer</option>
                <option value="provider" <?php echo ($user['role'] === 'provider') ? "selected" : ""; ?>>Provider</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="/manage-users" class="btn btn-secondary mt-3">Back to Manage Users</a>
</div>