<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if ($_SESSION['user_type'] != '1') { redirect(''); } ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Add User</h2>
                <p>Create a new user with this form</p>
                <form action="<?= URLROOT ?>/users/register" method="post">
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
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>