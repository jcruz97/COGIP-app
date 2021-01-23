<?php require APPROOT . '/views/inc/header.php'; ?>

<h2 class='text-center'> List of contacts</h3>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Company</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data['contacts'] as $contact ) : ?>
          <tr>
              <td><?php $contact->first_name . $person->last_name; ?></td>
              <td><?php $contact->telephone; ?></td>
              <td><?php $contact->email; ?></td>
              <td><?php $contact->company_id; ?></td>
          </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>