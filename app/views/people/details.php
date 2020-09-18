<?php require APPROOT . '/views/inc/header.php'; ?>

<h2 class="text-center">Contact : <?php echo $data['details']->number; ?></h2>

<h3>Company linked to this invoice</h3>
<table class="table table-dark">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Company</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
    </tr>
    <tr>
    <td><?=  $data['contacts']->last_name .' '.$data['contacts']->first_name ?></td>
    <td><?=  $data['contacts']->name; ?></td>
    <td><?=  $data['contacts']->email; ?></td>
    <td><?=  $data['contacts']->telephone; ?></td>
    <td><?php  ($data['company']->type_id == 1) ? 'Supplier' : 'Client'; ?></td>
    </tr>
</table>

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
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>