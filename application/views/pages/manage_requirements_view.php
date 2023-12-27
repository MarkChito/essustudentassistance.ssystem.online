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
                                <?php $result_requirements = $this->model->MOD_REQUIREMENTS_DATA(); ?>
                                <?php foreach ($result_requirements as $requirements) : ?>
                                    <tr>
                                        <td><?= $requirements->category ?> Assistance</td>
                                        <td><?= $requirements->description ?></td>
                                        <td class="text-center">
                                            <i class="fas fa-pencil-alt text-primary mr-2 edit_requirement" style="cursor: pointer;" data-toggle="modal" data-target="#edit_requirement" primary_key="<?= $requirements->primary_key ?>" category="<?= $requirements->category ?>" description="<?= $requirements->description ?>"></i>
                                            <i class="fas fa-trash-alt text-danger delete_requirement" style="cursor: pointer;" primary_key="<?= $requirements->primary_key ?>"></i>
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