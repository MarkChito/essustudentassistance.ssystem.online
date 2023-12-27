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
                                    <th>Student Name</th>
                                    <th>Date Completed</th>
                                    <th>Time Completed</th>
                                    <th>Administrator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $result_applications = $this->model->MOD_APPLICATION_DATA_STATUS("Approved"); ?>
                                <?php foreach ($result_applications as $applications) : ?>
                                    <?php if ($applications->category == $category) : ?>
                                        <?php
                                        $student_primary_key = $applications->student_primary_key;
                                        $admin_primary_key = $applications->admin_primary_key;

                                        $result_useraccounts_1 = $this->model->MOD_GET_USERACCOUNT_DATA($student_primary_key);
                                        $result_useraccounts_2 = $this->model->MOD_GET_USERACCOUNT_DATA($admin_primary_key);
                                        $result_students = $this->model->MOD_GET_STUDENT_DATA($student_primary_key);

                                        if ($result_useraccounts_1) {
                                            foreach ($result_useraccounts_1 as $useraccounts_1) {
                                                $student_name = $useraccounts_1->name;
                                                $student_rfid_number = $useraccounts_1->rfid_number;
                                            }
                                        }
                                        
                                        if ($result_useraccounts_2) {
                                            foreach ($result_useraccounts_2 as $useraccounts_2) {
                                                $admin_name = $useraccounts_2->name;
                                            }
                                        }

                                        if ($result_students) {
                                            foreach ($result_students as $students) {
                                                // Student Information
                                                $student_id = $students->login_primary_key;
                                                $student_student_number = $students->student_number;
                                                $student_first_name = $students->first_name;
                                                $student_middle_name = $students->middle_name;
                                                $student_last_name = $students->last_name;
                                                $student_sex = $students->sex;
                                                $student_mobile_number = $students->mobile_number;
                                                $student_address = $students->address;
                                                $student_school_name = $students->school_name;
                                                $student_school_address = $students->school_address;
                                                $student_father_name = $students->father_name;
                                                $student_father_occupation = $students->father_occupation;
                                                $student_mother_name = $students->mother_name;
                                                $student_mother_occupation = $students->mother_occupation;
                                                $student_user_image = $students->user_image;
                                                $student_indigency_image = $students->indigency_image;
                                                $student_coe_image = $students->coe_image;
                                                $student_psa_image = $students->psa_image;
                                                $student_tor_image = $students->tor_image;
                                                $student_report_card_image = $students->report_card_image;
                                                $student_valid_id_image_front = $students->valid_id_image_front;
                                                $student_valid_id_image_back = $students->valid_id_image_back;
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <img img_src="dist/img/user_upload/<?= $student_user_image ?>" style="cursor: pointer;" class="rounded-circle img-bordered-sm view_image" width="35" height="35" src="dist/img/user_upload/<?= $student_user_image ?>" data-toggle="modal" data-target="#view_profile_picture">
                                                <a class="pending_application" href="javascript:void(0)" data-toggle="modal" data-target="#application_details" student_id="<?= $student_id ?>" student_number="<?= $student_student_number ?>" rfid_number="<?= $student_rfid_number ?>" first_name="<?= $student_first_name ?>" middle_name="<?= $student_middle_name ?>" last_name="<?= $student_last_name ?>" sex="<?= $student_sex ?>" mobile_number="<?= $student_mobile_number ?>" address="<?= $student_address ?>" school_name="<?= $student_school_name ?>" school_address="<?= $student_school_address ?>" father_name="<?= $student_father_name ?>" father_occupation="<?= $student_father_occupation ?>" mother_name="<?= $student_mother_name ?>" mother_occupation="<?= $student_mother_occupation ?>" user_image="<?= $student_user_image ?>" indigency_image="<?= $student_indigency_image ?>" coe_image="<?= $student_coe_image ?>" psa_image="<?= $student_psa_image ?>" tor_image="<?= $student_tor_image ?>" report_card_image="<?= $student_report_card_image ?>" valid_id_image_front="<?= $student_valid_id_image_front ?>" valid_id_image_back="<?= $student_valid_id_image_back ?>">
                                                    <?= $student_name ?>
                                                </a>
                                            </td>
                                            <td><?= $applications->date ?></td>
                                            <td><?= $applications->time ?></td>
                                            <td><?= $admin_name ?></td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>