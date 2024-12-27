<div class="container">
    <?php if ($_SESSION['user_role'] == 'customer'): ?>
        <h1 class="mt-5">All Available Services</h1>
    <?php else: ?>
        <h1 class="mt-5">Manage Services</h1>
        <a href="/<?php echo $_SESSION['user_role']; ?>/add-service" class="btn btn-primary">Add Service</a>
    <?php endif; ?>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?php echo $service['id']; ?></td>
                    <td><?php echo $service['name']; ?></td>
                    <td><?php echo $service['description']; ?></td>
                    <td><?php echo $service['price']; ?></td>
                    <td>
                        <?php if ($_SESSION['user_role'] == 'customer'): ?>
                            <a href="/<?php echo $_SESSION['user_role']; ?>/book-service/<?php echo $service['id']; ?>" class="btn btn-sm btn-primary">Book</a>
                        <?php else: ?>
                            <a href="/<?php echo $_SESSION['user_role']; ?>/edit-service/<?php echo $service['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/<?php echo $_SESSION['user_role']; ?>/delete-service/<?php echo $service['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Total Services: <?php echo count($services); ?></td>
            </tr>
        </tfoot>
    </table>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>