<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('add_success');  ?>
<?php flash('edit_success');  ?>
<h2 class='text-center'>COGIP : List of invoices</h2>
<a href="<?php echo URLROOT; ?>/invoices/create">[+]Add</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Invoice number</th>
            <th scope="col">Dates</th>
            <th scope="col">Companies</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['invoices'] as $row) : ?>
        <tr style="cursor:pointer;" onclick="location.replace('<?php echo URLROOT; ?>/invoices/details/<?php echo $row->id; ?>')">
            <th scope="row">
            <a href="<?php echo URLROOT; ?>/invoices/delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete invoice n°:<?php echo $row->number; ?>?')" class="btn btn-danger">Delete</a>
            <a href="<?php echo URLROOT; ?>/invoices/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
            </th>
            <td><?php echo $row->number; ?></td>
            <td><?php echo $row->date; ?></td>
            <td><?php echo $row->company_name; ?></td>
            <td><?php echo $row->type; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>
