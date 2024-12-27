<div class="container">
    <h1 class="mt-5">Add Service</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/add-service" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>
    <br>
    <a href="/manage-services" class="btn btn-primary">Back to Manage Services</a>
</div>