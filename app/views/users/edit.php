<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != '1') { redirect(''); } ?>

<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?= URLROOT ?>/users" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Edit User</h2>
                <p>Update a user with this form</p>
                <form action="<?= URLROOT ?>/users/edit/<?= $data['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name'] ?>">
                        <span class="invalid-feedback"><?= $data['name_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password'] ?>">
                        <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password'] ?>">
                        <span class="invalid-feedback"><?= $data['confirm_password_err'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="user_type_id">Type: <sup>*</sup></label>
                        <select name="user_type_id" class="form-control">
                            <?php foreach($data['users_type'] as $type) : ?>
                                <option value="<?= $type->id ?>" <?php if ($type->id == $data['user_type_id']) echo 'selected' ?> >
                                    <?= $type->type ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Update user" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>