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
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Comapny</th>
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['people'] as $person) : ?>
                    <tr>
                        <td><?= $person->first_name . ' ' . $person->last_name ?></td>
                        <td><?= $person->telephone ?></td>
                        <td><?= $person->email ?></td>
                        <td><?= $person->name ?></td>
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
                    <th>Name</th>
                    <th>VAT</th>
                    <th>Country</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['companies'] as $company) : ?>
                    <tr>
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