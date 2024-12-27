<div class="container">
    <h1 class="mt-5">Edit Service</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/update-service" method="post">
        <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $service['name']; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $service['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $service['price']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
    <br>
    <a href="/manage-services" class="btn btn-primary">Back to Manage Services</a>
</div>