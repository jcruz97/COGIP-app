<<<<<<< HEAD
<?php require APPROOT . '/views/inc/header.php'; ?>

<h2 class="text-center">Company : <?php echo $data['details']->name; ?></h2>

<h3>Company details</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">TVA</th>
        <th scope="col">Company type</th>
    </tr>
    <tr>
    <td><?php echo $data['details']->name; ?></td>
    <td><?php echo $data['details']->vat; ?></td>
    <td><?php echo ($data['details']->type_id == 1) ? 'Supplier' : 'Client'; ?></td>
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
    <td><?php echo $data['people']->telephone; ?></td>
    </tr>
</table>
<?php endif; ?>
</table>
<?php if(!empty($data['invoice'])) : ?>
<h3>Factures</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Invoice number</th>
        <th scope="col">Date</th>
    </tr>
    <tr>
    <td><?php echo $data['invoice']->number; ?></td>
    <td><?php echo $data['invoice']->date; ?></td>
    </tr>
</table>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
=======
<?php require APPROOT . '/views/inc/header.php'; ?>

<h2 class="text-center">Company : <?php echo $data['details']->name; ?></h2>

<h3>Company details</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">TVA</th>
        <th scope="col">Company type</th>
    </tr>
    <tr>
    <td><?php echo $data['details']->name; ?></td>
    <td><?php echo $data['details']->vat; ?></td>
    <td><?php echo ($data['details']->type_id == 1) ? 'Supplier' : 'Client'; ?></td>
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
    <td><?php echo $data['people']->telephone; ?></td>
    </tr>
</table>
<?php endif; ?>
</table>
<?php if(!empty($data['invoice'])) : ?>
<h3>Factures</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Invoice number</th>
        <th scope="col">Date</th>
    </tr>
    <tr>
    <td><?php echo $data['invoice']->number; ?></td>
    <td><?php echo $data['invoice']->date; ?></td>
    </tr>
</table>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
>>>>>>> origin/nathan
