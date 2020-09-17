<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('add_success');  ?>
<?php flash('edit_success');  ?>
    <h2 class='text-center'>COGIP : List of Companies</h2>
    <a href="<?php echo URLROOT; ?>/companies/add">[+]Add</a>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Admin</th>
                        <th scope="col">Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">VAT</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['companies'] as $row) : ?>
                    <tr style="cursor:pointer;" onclick="location.replace('<?php echo URLROOT; ?>/companies/details/<?php echo $row->id; ?>')">
                        <td>
                        <a href="<?php echo URLROOT; ?>/companies/delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete companies :<?php echo $row->name; ?>?')" class="btn btn-danger">Delete</a>
                        <a href="<?php echo URLROOT; ?>/companies/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->country; ?></td>
                        <td><?php echo $row->vat; ?></td>
                        <td><?php echo $row->type_id; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>