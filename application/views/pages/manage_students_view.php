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
                                    <th>Student Number</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_students = $this->model->MOD_GET_STUDENTS_DATA() ?>
                                <?php foreach ($result_students as $students) : ?>
                                    <?php
                                    $first_name = $students->first_name;
                                    $middle_name = $students->middle_name;
                                    $last_name = $students->last_name;
                                    $full_name = $first_name;

                                    if (!empty($middle_name)) {
                                        $full_name .= ' ' . substr($middle_name, 0, 1) . '.';
                                    }

                                    $full_name .= ' ' . $last_name;
                                    ?>
                                    <tr>
                                        <td><?= $students->student_number ?></td>
                                        <td><?= $full_name ?></td>
                                        <td><?= $students->mobile_number ?></td>
                                        <td><?= $students->address ?></td>
                                        <td class="text-center">
                                            <?php $result_application = $this->model->MOD_APPLICATION_DATA($students->login_primary_key) ?>
                                            <?php if ($result_application && $result_application[0]->status == "Received") : ?>
                                                <i class="fas fa-pencil-alt text-primary mr-2 edit_student_status" style="cursor: pointer;" login_primary_key="<?= $students->login_primary_key ?>" data-toggle="modal" data-target="#edit_student_status"></i>
                                            <?php else : ?>
                                                <i class="fas fa-pencil-alt text-muted mr-2" style="pointer-events: none;"></i>
                                            <?php endif ?>
                                            <!-- <i class="fas fa-trash-alt text-danger delete_student" style="cursor: pointer;" primary_key="<?= $students->login_primary_key ?>"></i> -->
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