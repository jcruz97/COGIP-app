<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?= URLROOT ?>/admin   " class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Person</h2>
        <p>Create a new person with this form</p>
        <form action="<?= URLROOT ?>/people/add" method="post">
            <div class="form-group">
                <label for="first_name">First Name: <sup>*</sup></label>
                <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['first_name'] ?>">
                <span class="invalid-feedback"><?= $data['first_name_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name: <sup>*</sup></label>
                <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['last_name'] ?>">
                <span class="invalid-feedback"><?= $data['last_name_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone: <sup>*</sup></label>
                <input type="text" name="telephone" class="form-control form-control-lg <?php echo (!empty($data['telephone_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['telephone'] ?>">
                <span class="invalid-feedback"><?= $data['telephone_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email'] ?>">
                <span class="invalid-feedback"><?= $data['email_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="company_id">Company: <sup>*</sup></label>
                <select name="company_id" class="form-control">
                    <?php foreach($data['companies'] as $company) : ?>
                        <option value="<?= $company->id ?>" <?php if ($company->id == $data['company_id']) echo 'selected' ?> >
                            <?= $company->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>