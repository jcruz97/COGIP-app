<?php require APPROOT . '/views/inc/header.php'; ?>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>