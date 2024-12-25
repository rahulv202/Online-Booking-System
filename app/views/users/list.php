<div class="container">
    <h1 class="mt-5">Manage Users</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?php echo $user['id']; ?></th>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <a href="/edit-user/<?php echo $user['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/delete-user/<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th colspan="5">
                    <a href="/add" class="btn btn-sm btn-primary">Add New User</a>
                </th>
            </tr>
        </tfoot> -->
    </table>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>