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
                                    <th>Available Slots</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_slots = $this->model->MOD_SLOTS_DATA(); ?>
                                <?php foreach ($result_slots as $slots) : ?>
                                    <tr>
                                        <td><?= $slots->category ?> Assistance</td>
                                        <td><?= $slots->slot ?> Available</td>
                                        <td class="text-center">
                                            <i class="fas fa-pencil-alt text-primary mr-2 edit_slot" style="cursor: pointer;" data-toggle="modal" data-target="#edit_slot" primary_key="<?= $slots->primary_key ?>" category="<?= $slots->category ?>" slot="<?= $slots->slot ?>"></i>
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