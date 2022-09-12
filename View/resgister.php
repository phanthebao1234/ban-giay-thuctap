<div class="contianer">
    <form class="row g-3" action="index.php?action=auth&act=resgister_action" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="customer_firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="customer_firstname" name="customer_firstname">
        </div>
        <div class="col-md-6">
            <label for="customer_lastname" class="form-label">Last name</label>
            <input type="customer_lastname" class="form-control" id="customer_lastname" name="customer_lastname">
        </div>
        <div class="col-md-6">
            <label for="customer_email" class="form-label">Email</label>
            <input type="customer_email" class="form-control" id="customer_email" name="customer_email">
        </div>
        <div class="col-md-6">
            <label for="customer_password" class="form-label">Password</label>
            <input type="customer_password" class="form-control" id="customer_password" name="customer_password">
        </div>
        <div class="col-12">
            <label for="customer_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="1234 Main St">
        </div>

        <div class="col-md-6">
            <label for="customer_phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="customer_phone" name="customer_phone">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Render</label>
            <select id="inputState" class="form-select" name="customer_render">
                <option value="0" selected>Choose...</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="customer_birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="customer_birthday" name="customer_birthday">
        </div>
        <div class="col-12">
            <label for="customer_image" class="form-label">Image</label>
            <input type="text" class="form-control" id="customer_image" name="customer_image" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
        </div>
    </form>
</div>