<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php flash('admin_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Welcome to the COGIP</h1>
            <p>Hello <?= $_SESSION['user_name'] ?> !</p>
            <p>What would you like to do today ?</p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2 mx-auto">
            <a href="<?= URLROOT ?>/invoices/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Invoice
            </a>
        </div>
        <div class="col-md-2 mx-auto">
            <a href="<?= URLROOT ?>/people/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Contact
            </a>
        </div>
        <div class="col-md-2 mx-auto">
            <a href="<?= URLROOT ?>/companies/add" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Company
            </a>
        </div>
        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
            <div class="col-md-2 mx-auto"">
                <a href="<?= URLROOT ?>/users/register" class="btn btn-primary">
                    <i class="fas fa-plus"></i> New User
                </a>
            </div>
        <?php endif; ?>
    </div>

    <h2 class="pt-3">Last invoices</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                    <th scope="col"></th>
                    <th scope="col"></th>
                <?php endif; ?>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Comapny</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['invoices'] as $invoice) : ?>
                    <tr>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <td>                          
                            <a href="<?= URLROOT ?>/invoices/edit/<?= intval($invoice->invoiceId) ?>" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>                          
                            <form action="<?= URLROOT ?>/invoices/delete/<?= intval($invoice->invoiceId) ?>" method="post">                       
                                <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                            </form>
                        </td>
                    <?php endif; ?>
                        <td><?= $invoice->number ?></td>
                        <td><?= $invoice->date ?></td>
                        <td><?= $invoice->name ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
      </div>

      <h2>Last contacts</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <th scope="col"></th>
                            <th scope="col"></th>
                    <?php endif; ?>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>   
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['people'] as $person) : ?>
                    <tr>
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
                        <td><?= $person->first_name . ' ' . $person->last_name ?></td>
                        <td><?= $person->telephone ?></td>
                        <td><?= $person->email ?></td>
                        <td><?= $person->name ?></td>
                        
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
      </div>

      <h2>Last companies</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    <?php endif; ?>
                        <th scope="col">Name</th>
                        <th scope="col">VAT</th>
                        <th scope="col">Country</th>
                        <th scope="col">Type</th>  
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['companies'] as $company) : ?>
                    <tr>
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
                        <td><?= $company->name?></td>
                        <td><?= $company->vat ?></td>
                        <td><?= $company->country ?></td>
                        <td><?= $company->type ?></td> 
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
      </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>