<?php require APPROOT . '/views/inc/header.php'; ?>

<h3 class='text-center'> List of contacts</h3>


  <table class="table table-dark">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Company</th>
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


<?php require APPROOT . '/views/inc/footer.php'; ?>