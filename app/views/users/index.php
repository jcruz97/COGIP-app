<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != '1') { redirect(''); } ?>

<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php flash('user_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Welcome to the COGIP</h1>
            <h2>Users Dashboard</h2>
            <p>Hello <strong><?= $_SESSION['user_name'] ?></strong> !</p>
            <p>What would you like to do today ?</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3 mx-auto">
            <a href="<?= URLROOT ?>/users/add" class="btn btn-primary btn-block">
                <i class="fas fa-plus"></i> New User
            </a>
        </div>
    </div>

    <h3 class="pt-3">List of Users</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <td><?= $user->name ?></td>
                        <td><?= $user->type ?></td>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                                <a href="<?= URLROOT ?>/users/edit/<?= intval($user->userId) ?>" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>                          
                                <form action="<?= URLROOT ?>/users/delete/<?= intval($user->userId) ?>" method="post">                       
                                    <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>