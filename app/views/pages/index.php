<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?= $data['title'] ?></h1>
            <p class="lead"><?= $data['description'] ?></p>
        </div>
    </div>

    <h3 class="pt-3">Last invoices</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
<<<<<<< HEAD
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    <?php endif; ?>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Comapny</th>
                    
=======
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Comapny</th>
>>>>>>> origin/john
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['invoices'] as $invoice) : ?>
                    <tr>
                        <td><?= $invoice->number ?></td>
                        <td><?= $invoice->date ?></td>
                        <td><?= $invoice->name ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>

        <h3>Last contacts</h3>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
<<<<<<< HEAD
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    <?php endif; ?>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                   
=======
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
>>>>>>> origin/john
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['people'] as $person) : ?>
                    <tr>
<<<<<<< HEAD
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                            <a href="<?= URLROOT ?>/people/edit/<?= intval($person->personId) ?>" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>                        
                                <form class="pull-right" action="<?= URLROOT ?>/people/delete/<?= intval($person->personId) ?>" method="post">                       
                                    <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                                </form>
                            </td>
                        <?php endif; ?>
=======
>>>>>>> origin/john
                        <td><?= $person->first_name . ' ' . $person->last_name ?></td>
                        <td><?= $person->telephone ?></td>
                        <td><?= $person->email ?></td>
                        <td><?= $person->name ?></td>
<<<<<<< HEAD
                        
=======
>>>>>>> origin/john
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>

        <h3>Last companies</h3>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
<<<<<<< HEAD
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    <?php endif; ?>
                    <th scope="col">Name</th>
                    <th scope="col">VAT</th>
                    <th scope="col">Country</th>
                    <th scope="col">Type</th>
                    
=======
                    <th>Name</th>
                    <th>VAT</th>
                    <th>Country</th>
                    <th>Type</th>
>>>>>>> origin/john
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['companies'] as $company) : ?>
                    <tr>
<<<<<<< HEAD
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                                <a href="<?= URLROOT ?>/companies/edit/<?= intval($company->companyId) ?>" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>                          
                                <form class="pull-right" action="<?= URLROOT ?>/companies/delete/<?= intval($company->companyId) ?>" method="post">                       
                                    <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                                </form>
                            </td>
                        <?php endif; ?>
=======
>>>>>>> origin/john
                        <td><?= $company->name?></td>
                        <td><?= $company->vat ?></td>
                        <td><?= $company->country ?></td>
                        <td><?= $company->type ?></td>
<<<<<<< HEAD
                        
=======
>>>>>>> origin/john
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>