<div class="container">
    <h1 class="mt-5">Manage Services</h1>
    <a href="/add-service" class="btn btn-primary">Add Service</a>
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
                        <a href="/edit-service/<?php echo $service['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/delete-service/<?php echo $service['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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