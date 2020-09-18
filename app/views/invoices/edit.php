<?php require APPROOT . '/views/inc/header.php'; ?>
<<<<<<< HEAD

    <a href="<?= URLROOT ?>/admin   " class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Edit Invoice</h2>
        <p>Edit an invoice with this form</p>
        <form action="<?= URLROOT ?>/invoices/edit/<?= $data['id'] ?>" method="post">
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
=======
<form method="post" action="<?php echo URLROOT; ?>/invoices/edit/<?php echo $data['invoice']->id; ?>">
    <div class="form-group">
        
        <input type="hidden" class="form-control" name="invoice_id" aria-describedby="invoice id" value="<?php echo $data['invoice']->id; ?>">
    </div>
    <div class="form-group">
        <label for="invoice_number">Invoice Number</label>
        <input type="txt" class="form-control" name="invoice_number" aria-describedby="invoice number" value="<?php echo $data['invoice']->number; ?>">
        <small id="invoice_numberHelp" class="form-text text-muted">Ex: Fyyyymmdd-000</small>
    </div>
    <div class="form-group">
        <label for="invoice_date">Invoice date</label>
        <input type="date" class="form-control" name="invoice_date" value="<?php echo strftime('%Y-%m-%d',strtotime($data['invoice']->date)); ?>" aria-describedby="invoice date">
    </div>
    <div class="form-group">
        <label for="invoice_company">Company</label>
        <select class="form-control" name="invoice_company" aria-describedby="invoice company">
        <?php foreach($data['company'] as $row) : ?>
        <option <?php echo ($data['invoice']->company_id == $row->id) ? 'selected' : ''; ?>  value="<?php echo $row->id; ?>"><?php echo $row->name ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
>>>>>>> origin/mohamed

<?php require APPROOT . '/views/inc/footer.php'; ?>