<?php require APPROOT . '/views/inc/header.php'; ?>
<h2 class='text-center'>COGIP : List of Companies</h2>
<table class="table table-dark">
    <thead>
        <tr></tr>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">VAT</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['companies'] as $row) : ?>
        <tr style="cursor:pointer;" onclick="location.replace('<?php echo URLROOT; ?>/companies/details/<?php echo $row->id; ?>')">
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->country; ?></td>
            <td><?php echo $row->vat; ?></td>
            <td><?php echo $row->type_id; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>