<section class="content">
    <div class="container-fluid">
        <!-- Table List Students -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="my_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>RFID Number</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_admins = $this->model->MOD_GET_ADMIN_DATA() ?>
                                <?php foreach ($result_admins as $admins) : ?>
                                    <tr>
                                        <td><?= $admins->name ?></td>
                                        <td><?= $admins->rfid_number ?></td>
                                        <td><?= $admins->username ?></td>
                                        <td class="text-muted">***************</td>
                                        <td class="text-center">
                                            <i class="fas fa-pencil-alt text-primary mr-2 edit_admin" style="cursor: pointer;" primary_key="<?= $admins->primary_key ?>" name="<?= $admins->name ?>" rfid_number="<?= $admins->rfid_number ?>" username="<?= $admins->username ?>" password="<?= $admins->password ?>" data-toggle="modal" data-target="#edit_admin"></i>
                                            <!-- <i class="fas fa-trash-alt text-danger delete_admin" style="cursor: pointer;" primary_key="<?= $admins->primary_key ?>"></i> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>