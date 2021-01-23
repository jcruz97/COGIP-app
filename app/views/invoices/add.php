<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?= URLROOT ?>/admin   " class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Invoice</h2>
        <p>Create a new invoice with this form</p>
        <form action="<?= URLROOT ?>/invoices/add" method="post">
            <div class="form-group">
                <label for="number">Invoice Number: <sup>*</sup></label>
                <input type="text" name="number" class="form-control form-control-lg <?php echo (!empty($data['number_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['number'] ?>">
                <span class="invalid-feedback"><?= $data['number_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="date">Invoice Date (yyyy-mm-dd): <sup>*</sup></label>
                <input type="text" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['date'] ?>">
                <span class="invalid-feedback"><?= $data['date_err'] ?></span>
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
            <div class="form-group">
                <label for="people_id">Contact person regarding the invoice: <sup>*</sup></label>
                <select name="people_id" class="form-control">
                    <?php foreach($data['people'] as $person) : ?>
                        <option value="<?= $person->id ?>" <?php if ($person->id == $data['people_id']) echo 'selected' ?> >
                            <?= $person->first_name . ' ' . $person->last_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>