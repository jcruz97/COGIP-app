<?php require APPROOT . '/views/inc/header.php'; ?>

<h2 class="text-center">Invoice : <?php echo $data['details']->number; ?></h2>

<h3>Company linked to this invoice</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">VAT</th>
        <th scope="col">Company type</th>
    </tr>
    <tr>
    <td><?php echo $data['company']->name; ?></td>
    <td><?php echo $data['company']->vat; ?></td>
    <td><?php echo ($data['company']->type_id == 1) ? 'Supplier' : 'Client'; ?></td>
    </tr>
</table>
<?php if(!empty($data['people'])) : ?>
<h3>Contact person</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
    </tr>
    <tr>
    <td><?php echo $data['people']->first_name . ' ' . $data['people']->last_name ; ?></td>
    <td><?php echo $data['people']->email; ?></td>
    <td><?php echo $data['people']->Telephone; ?></td>
    </tr>
</table>
>>>>>>> origin/mohamed
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>