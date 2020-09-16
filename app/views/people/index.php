<?php require APPROOT . '/views/inc/header.php'; ?>

<h3 class ='text-center'> List of contacts</h3>

<div class="table-responsive">
  <table class='table table-dark'>
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Company</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data['contacts'] as $person ) : ?>
          <tr>
              <td><?php $person->first_name . $person->last_name; ?></td>
              <td><?php $person->telephone; ?></td>
              <td><?php $person->email; ?></td>
              <td><?php $person->company_id; ?></td>
          </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>