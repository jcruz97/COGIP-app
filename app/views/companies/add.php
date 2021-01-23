<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?= URLROOT ?>/admin   " class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Company</h2>
        <p>Create a new company with this form</p>
        <form action="<?= URLROOT ?>/companies/add" method="post">
            <div class="form-group">
                <label for="name">Name: <sup>*</sup></label>
                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name'] ?>">
                <span class="invalid-feedback"><?= $data['name_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="country">Country: <sup>*</sup></label>
                <input type="text" name="country" class="form-control form-control-lg <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['country'] ?>">
                <span class="invalid-feedback"><?= $data['country_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="vat">VAT: <sup>*</sup></label>
                <input type="text" name="vat" class="form-control form-control-lg <?php echo (!empty($data['vat_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['vat'] ?>">
                <span class="invalid-feedback"><?= $data['vat_err'] ?></span>
            <div class="form-group">
                <label for="type_id">Type: <sup>*</sup></label>
                <select name="type_id" class="form-control">
                    <?php foreach($data['types'] as $type) : ?>
                        <option value="<?= $type->id ?>" <?php if ($type->id == $data['type_id']) echo 'selected' ?> >
                            <?= $type->type ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>