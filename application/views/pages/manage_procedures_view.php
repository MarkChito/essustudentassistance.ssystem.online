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
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_procedures = $this->model->MOD_PROCEDURES_DATA() ?>
                                <?php foreach ($result_procedures as $procedures) : ?>
                                    <tr>
                                        <td><?= $procedures->category ?> Assistance</td>
                                        <td><?= $procedures->description ?></td>
                                        <td class="text-center">
                                            <i class="fas fa-pencil-alt text-primary mr-2 edit_procedure" style="cursor: pointer;" data-toggle="modal" data-target="#edit_procedure" primary_key="<?= $procedures->primary_key ?>" category="<?= $procedures->category ?>" description="<?= $procedures->description ?>"></i>
                                            <i class="fas fa-trash-alt text-danger delete_procedure" style="cursor: pointer;" primary_key="<?= $procedures->primary_key ?>"></i>
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