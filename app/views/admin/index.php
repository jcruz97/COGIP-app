<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php flash('admin_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Welcome to the COGIP</h1>
            <p>Bonjour <?= $_SESSION['user_name'] ?> !</p>
            <p>Que souhaitez-vous faire aujourd'hui ?</p>
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
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Comapny</th>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['invoices'] as $invoice) : ?>
                    <tr>
                        <td><?= $invoice->number ?></td>
                        <td><?= $invoice->date ?></td>
                        <td><?= $invoice->name ?></td>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                                <form class="pull-right" action="<?= URLROOT ?>/invoices/delete/<?= intval($invoice->invoiceId) ?>" method="post">                       
                                    <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                                </form>
                            </td>
                        <?php endif; ?>
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['people'] as $person) : ?>
                    <tr>
                        <td><?= $person->first_name . ' ' . $person->last_name ?></td>
                        <td><?= $person->telephone ?></td>
                        <td><?= $person->email ?></td>
                        <td><?= $person->name ?></td>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                                <form class="pull-right" action="<?= URLROOT ?>/people/delete/<?= intval($person->personId) ?>" method="post">                       
                                    <input type="submit" class="btn btn-danger" style="font-family: FontAwesome" value="&#xf2ed">
                                </form>
                            </td>
                        <?php endif; ?>
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
                    <th>Name</th>
                    <th>VAT</th>
                    <th>Country</th>
                    <th>Type</th>
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['companies'] as $company) : ?>
                    <tr>
                        <td><?= $company->name?></td>
                        <td><?= $company->vat ?></td>
                        <td><?= $company->country ?></td>
                        <td><?= $company->type ?></td>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
                            <td>                          
                                <form class="pull-right" action="<?= URLROOT ?>/companies/delete/<?= intval($company->companyId) ?>" method="post">                       
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