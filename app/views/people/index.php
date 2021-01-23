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
              <td style="cursor:pointer;" >
                <a href="<?= URLROOT ?>/people/details/<?= intval($contact->personId) ?>"  style="color:black; text-decoration:none;">
                  <?= $contact->first_name . ' ' . $contact->last_name ?>
                </a>   
              </td>
              <td><?= $contact->telephone ?></td>
              <td><?= $contact->email ?></td>
              <td><?= $contact->name ?></td>
          </tr>
        <?php endforeach ?>
    </tbody>
  </table>


<?php require APPROOT . '/views/inc/footer.php'; ?>