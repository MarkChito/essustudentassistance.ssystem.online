<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->userdata("user_type") == "student") : ?>
            <?php
            $id = "";
            $progress = "Step 0";
            $category = "";
            $status = "";

            $result_applications = $this->model->MOD_APPLICATION_DATA($this->session->userdata("primary_key"));

            foreach ($result_applications as $result_applications_row) {
                $status = $result_applications_row->status;

                if ($status != "accepted" && $status != "rejected") {
                    $application_id = $result_applications_row->primary_key;
                    $id = $result_applications_row->primary_key;
                    $progress = $result_applications_row->progress;
                    $category = $result_applications_row->category;
                }
            }
            ?>
            <?php if ($progress != "Completed") : ?>
                <?php if ($progress == "Step 0") : ?>
                    <!-- Step 0 -->
                    <div class="row">
                        <!-- Educational Assistance Tab -->
                        <div class="col-lg-6 col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <ul class="nav nav-pills float-right">
                                        <li class="nav-item"><a class="nav-link active" href="#educational_steps" data-toggle="tab">Procedures</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#educational_requirements" data-toggle="tab">Requirements</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#educational_slots" data-toggle="tab">Slots</a></li>
                                    </ul>
                                </div>
                                <div class="card-body box-profile">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="educational_steps">
                                            <h2 class="steps_h2">Educational Assistance (Procedures)</h2>
                                            <ul class="steps_ul">
                                                <?php
                                                $count_procedures_educational = 0;
                                                $result_procedures_educational = $this->model->MOD_SPECIFIC_PROCEDURES_DATA("Educational");
                                                ?>
                                                <?php foreach ($result_procedures_educational as $result_procedures_educational_row) : ?>
                                                    <li class="steps_li">
                                                        <span class="steps_badge steps_badge_educational">
                                                            <?= intval($count_procedures_educational) + 1 ?>
                                                        </span>
                                                        &nbsp;<?= $result_procedures_educational_row->description ?>
                                                    </li>

                                                    <?php $count_procedures_educational++ ?>
                                                <?php endforeach ?>
                                            </ul>
                                            <?php if ($count_procedures_educational == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="educational_requirements">
                                            <h2 class="steps_h2">Educational Assistance (Requirements)</h2>
                                            <ul class="steps_ul">
                                                <?php
                                                $count_requirements_educational = 0;
                                                $result_requirements_educational = $this->model->MOD_SPECIFIC_REQUIREMENTS_DATA("Educational");
                                                ?>
                                                <?php foreach ($result_requirements_educational as $result_requirements_educational_row) : ?>
                                                    <li class="steps_li">
                                                        <span class="steps_badge steps_badge_educational">
                                                            <?= intval($count_requirements_educational) + 1 ?>
                                                        </span>
                                                        &nbsp;<?= $result_requirements_educational_row->description ?>
                                                    </li>

                                                    <?php $count_requirements_educational++ ?>
                                                <?php endforeach ?>
                                            </ul>
                                            <?php if ($count_requirements_educational == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="educational_slots">
                                            <h2 class="steps_h2">Educational Assistance (Available Slots)</h2>
                                            <?php
                                            $count_slots_educational = 0;
                                            $result_slots_educational = $this->model->MOD_SPECIFIC_SLOTS_DATA("Educational");
                                            ?>
                                            <?php foreach ($result_slots_educational as $result_slots_educational_row) : ?>
                                                <?php
                                                $slot_educational = "Slots";
                                                if (intval($result_slots_educational_row->slot) == 1) {
                                                    $slot_educational = "Slot";
                                                }
                                                ?>
                                                <h1 class="text-center" style="font-size: 60px;"><?= $result_slots_educational_row->slot ?> Available <?= $slot_educational ?></h1>

                                                <?php $count_slots_educational++ ?>
                                            <?php endforeach ?>

                                            <?php if ($count_slots_educational == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php
                                    $btn_educational = "";
                                    $btn_educational_target = "accept_terms_and_conditions";

                                    if ($count_slots_educational == 0 || $result_slots_educational_row->slot == "0") {
                                        $btn_educational = "disabled";
                                        $btn_educational_target = "";
                                    }
                                    ?>

                                    <button type="button" class="btn btn-primary w-100 btn_accept_terms_and_conditions" data-toggle="modal" data-target="#<?= $btn_educational_target ?>" assistance_type="Educational" <?= $btn_educational ?>>Apply for Educational Assistance</button>
                                </div>
                            </div>
                        </div>
                        <!-- Scholarhip Assistance Tab -->
                        <div class="col-lg-6 col-12">
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <ul class="nav nav-pills float-right">
                                        <li class="nav-item"><a class="nav-link active" href="#scholarship_steps" data-toggle="tab">Procedures</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#scholarship_requirements" data-toggle="tab">Requirements</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#scholarship_slots" data-toggle="tab">Slots</a></li>
                                    </ul>
                                </div>
                                <div class="card-body box-profile">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="scholarship_steps">
                                            <h2 class="steps_h2">Scholarship Assistance (Procedures)</h2>
                                            <ul class="steps_ul">
                                                <?php
                                                $count_procedures_scholarship = 0;
                                                $result_procedures_scholarship = $this->model->MOD_SPECIFIC_PROCEDURES_DATA("Scholarship");
                                                ?>
                                                <?php foreach ($result_procedures_scholarship as $result_procedures_scholarship_row) : ?>
                                                    <li class="steps_li">
                                                        <span class="steps_badge steps_badge_scholarship">
                                                            <?= intval($count_procedures_scholarship) + 1 ?>
                                                        </span>
                                                        &nbsp;<?= $result_procedures_scholarship_row->description ?>
                                                    </li>

                                                    <?php $count_procedures_scholarship++ ?>
                                                <?php endforeach ?>
                                            </ul>
                                            <?php if ($count_procedures_scholarship == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="scholarship_requirements">
                                            <h2 class="steps_h2">Scholarship Assistance Assistance (Requirements)</h2>
                                            <ul class="steps_ul">
                                                <?php
                                                $count_requirements_scholarship = 0;
                                                $result_requirements_scholarship = $this->model->MOD_SPECIFIC_REQUIREMENTS_DATA("Scholarship");
                                                ?>
                                                <?php foreach ($result_requirements_scholarship as $result_requirements_scholarship_row) : ?>
                                                    <li class="steps_li">
                                                        <span class="steps_badge steps_badge_scholarship">
                                                            <?= intval($count_requirements_scholarship) + 1 ?>
                                                        </span>
                                                        &nbsp;<?= $result_requirements_scholarship_row->description ?>
                                                    </li>

                                                    <?php $count_requirements_scholarship++ ?>
                                                <?php endforeach ?>
                                            </ul>
                                            <?php if ($count_requirements_scholarship == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                        <div class="tab-pane" id="scholarship_slots">
                                            <h2 class="steps_h2">Scholarship Assistance (Available Slots)</h2>
                                            <?php
                                            $count_slots_scholarship = 0;
                                            $result_slots_scholarship = $this->model->MOD_SPECIFIC_SLOTS_DATA("Scholarship");
                                            ?>
                                            <?php foreach ($result_slots_scholarship as $result_slots_scholarship_row) : ?>
                                                <?php
                                                $slot_scholarship = "Slots";
                                                if (intval($result_slots_scholarship_row->slot) == 1) {
                                                    $slot_scholarship = "Slot";
                                                }
                                                ?>

                                                <h1 class="text-center" style="font-size: 60px;"><?= $result_slots_scholarship_row->slot ?> Available <?= $slot_scholarship ?></h1>

                                                <?php $count_slots_scholarship++ ?>
                                            <?php endforeach ?>

                                            <?php if ($count_slots_scholarship == 0) : ?>
                                                <h1 class="text-center text-muted" style="font-size: 60px;">No Data Available</h1>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php
                                    $btn_scholarship = "";
                                    $btn_scholarship_target = "accept_terms_and_conditions";

                                    if ($count_slots_scholarship == 0 || $result_slots_scholarship_row->slot == "0") {
                                        $btn_scholarship = "disabled";
                                        $btn_scholarship_target = "";
                                    }
                                    ?>
                                    <button type="button" class="btn btn-success w-100 btn_accept_terms_and_conditions" data-toggle="modal" data-target="#<?= $btn_scholarship_target ?>" assistance_type="Scholarship" <?= $btn_scholarship ?>>Apply for Scholarship Assistance</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($progress == "Step 1") : ?>
                    <!-- Step 1 -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="card-title text-bold">Step 1: Verify your Personal and Contact Details</span>
                                    </div>
                                    <form action="javascript:void(0)" id="step_1_form">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Personal Details -->
                                                <div class="col-xl-6 col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <span class="card-title text-muted text-bold">Personal Details</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_student_number">Student Number</label>
                                                                <input type="text" class="form-control" id="step_1_student_number" name="step_1_student_number" placeholder="Enter Student Number" value="<?= $this->session->userdata("student_number") ?>" required>
                                                                <small class="text-danger d-none" id="error_step_1_student_number">Student Number is already in use</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_rfid_number">RFID Number</label>
                                                                <input type="number" class="form-control" id="step_1_rfid_number" name="step_1_rfid_number" placeholder="Enter RFID Number" value="<?= $this->session->userdata("rfid_number") ?>" required>
                                                                <small class="text-danger d-none" id="error_step_1_rfid_number">RFID Number is already in use</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_first_name">First Name</label>
                                                                <input type="text" class="form-control" id="step_1_first_name" name="step_1_first_name" placeholder="Enter First Name" value="<?= $this->session->userdata("first_name") ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_middle_name">Middle Name (Optional)</label>
                                                                <input type="text" class="form-control" id="step_1_middle_name" name="step_1_middle_name" placeholder="Enter Middle Name" value="<?= $this->session->userdata("middle_name") ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_last_name">Last Name</label>
                                                                <input type="text" class="form-control" id="step_1_last_name" name="step_1_last_name" placeholder="Enter Last Name" value="<?= $this->session->userdata("last_name") ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="step_1_sex">Sex</label>
                                                                <select class="custom-select" name="step_1_sex" id="step_1_sex">
                                                                    <option value="" disabled selected>-- Select Sex --</option>
                                                                    <option value="Male" <?= $this->session->userdata("sex") == "Male" ? "selected" : null ?>>Male</option>
                                                                    <option value="Female" <?= $this->session->userdata("sex") == "Female" ? "selected" : null ?>>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Contact Details -->
                                                <div class="col-xl-6 col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <span class="card-title text-muted text-bold">Contact Details</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_mobile_number">Mobile Number</label>
                                                                        <input type="number" class="form-control" id="step_1_mobile_number" name="step_1_mobile_number" placeholder="Enter Mobile Number" value="<?= $this->session->userdata("mobile_number") ?>" required>
                                                                        <small class="d-none" id="error_step_1_mobile_number"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_address">Address</label>
                                                                        <textarea rows="1" class="form-control" id="step_1_address" name="step_1_address" placeholder="Enter Address" required><?= $this->session->userdata("address") ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_school_name">School Name</label>
                                                                        <input type="text" class="form-control" id="step_1_school_name" name="step_1_school_name" placeholder="Enter School Name" value="<?= $this->session->userdata("school_name") ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_school_address">School Address</label>
                                                                        <textarea rows="1" class="form-control" id="step_1_school_address" name="step_1_school_address" placeholder="Enter School Address" required><?= $this->session->userdata("school_address") ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_father_name">Father's Name</label>
                                                                        <input type="text" class="form-control" id="step_1_father_name" name="step_1_father_name" placeholder="Enter Father's Name" value="<?= $this->session->userdata("father_name") ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_father_occupation">Father's Occupation</label>
                                                                        <input type="text" class="form-control" id="step_1_father_occupation" name="step_1_father_occupation" placeholder="Enter Father's Occupation" value="<?= $this->session->userdata("father_occupation") ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_mother_name">Mother's Name</label>
                                                                        <input type="text" class="form-control" id="step_1_mother_name" name="step_1_mother_name" placeholder="Enter Mother's Name" value="<?= $this->session->userdata("mother_name") ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" for="step_1_mother_occupation">Mother's Occupation</label>
                                                                        <input type="text" class="form-control" id="step_1_mother_occupation" name="step_1_mother_occupation" placeholder="Enter Mother's Occupation" value="<?= $this->session->userdata("mother_occupation") ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="hidden" id="step_1_primary_key" name="step_1_primary_key" value="<?= $this->session->userdata("primary_key") ?>">
                                            <input type="hidden" id="step_1_old_student_number" name="step_1_old_student_number" value="<?= $this->session->userdata("student_number") ?>">
                                            <input type="hidden" id="step_1_old_rfid_number" name="step_1_old_rfid_number" value="<?= $this->session->userdata("rfid_number") ?>">

                                            <button class="btn btn-primary float-right" type="submit" id="btn_step_1">Proceed to Step 2&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($progress == "Step 2") : ?>
                    <!-- Step 2 -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="card-title text-bold">Step 2: Upload all the necessary Scanned Documents (<small class="text-danger">*.jpg or *.png format only</small>)</span>
                                    </div>
                                    <form action="server/step_2" method="post" id="step_2_form" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <?php if ($category == "Educational") : ?>
                                                <div class="row">
                                                    <!-- Personal Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Personal Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_user_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("user_image") ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_user_image" name="step_2_user_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_user_image" id="step_2_user_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Indigency Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Certificate of Indigency Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_indigency_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("indigency_image") ? $this->session->userdata("indigency_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_indigency_image" name="step_2_indigency_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_indigency_image" id="step_2_indigency_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- COE Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Certificate of Enrollment with CTC Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_coe_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("coe_image") ? $this->session->userdata("coe_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_coe_image" name="step_2_coe_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_coe_image" id="step_2_coe_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PSA Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">PSA Birth Certificate Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_psa_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("psa_image") ? $this->session->userdata("psa_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_psa_image" name="step_2_psa_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_psa_image" id="step_2_psa_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Valid ID Front Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Valid ID Image (Front)</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_valid_id_image_front_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("valid_id_image_front") ? $this->session->userdata("valid_id_image_front") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_valid_id_image_front" name="step_2_valid_id_image_front" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_valid_id_image_front" id="step_2_valid_id_image_front_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Valid ID Back Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Valid ID Image (Back)</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_valid_id_image_back_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("valid_id_image_back") ? $this->session->userdata("valid_id_image_back") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_valid_id_image_back" name="step_2_valid_id_image_back" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_valid_id_image_back" id="step_2_valid_id_image_back_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <?php if ($category == "Scholarship") : ?>
                                                <!-- Scholarhip -->
                                                <div class="row">
                                                    <!-- Personal Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Personal Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_user_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("user_image") ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_user_image" name="step_2_user_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_user_image" id="step_2_user_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Indigency Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Certificate of Indigency Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_indigency_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("indigency_image") ? $this->session->userdata("indigency_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_indigency_image" name="step_2_indigency_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_indigency_image" id="step_2_indigency_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- COE Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Certificate of Enrollment with CTC Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_coe_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("psa_image") ? $this->session->userdata("coe_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_coe_image" name="step_2_coe_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_coe_image" id="step_2_coe_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PSA Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">PSA Birth Certificate Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_psa_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("psa_image") ? $this->session->userdata("psa_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_psa_image" name="step_2_psa_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_psa_image" id="step_2_psa_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TOR Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Transcript of Records Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_tor_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("tor_image") ? $this->session->userdata("tor_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_tor_image" name="step_2_tor_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_tor_image" id="step_2_tor_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Report Card Image -->
                                                    <div class="col-xl-4 col-lg-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Report Card Image</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_report_card_image_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("report_card_image") ? $this->session->userdata("report_card_image") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_report_card_image" name="step_2_report_card_image" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_report_card_image" id="step_2_report_card_image_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Valid ID Front Image -->
                                                    <div class="col-xl-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Valid ID Image (Front)</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_valid_id_image_front_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("valid_id_image_front") ? $this->session->userdata("valid_id_image_front") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_valid_id_image_front" name="step_2_valid_id_image_front" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_valid_id_image_front" id="step_2_valid_id_image_front_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Valid ID Back Image -->
                                                    <div class="col-xl-6 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <span class="card-title text-bold text-muted">Valid ID Image (Back)</span>
                                                            </div>
                                                            <div class="card-body box-profile">
                                                                <div class="text-center">
                                                                    <img class="img-bordered-sm view_image" id="step_2_valid_id_image_back_display" width="150" height="150" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("valid_id_image_back") ? $this->session->userdata("valid_id_image_back") : "default_user.png" ?>" alt="User profile picture">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="input-group">
                                                                        <div class="custom-file" style="width: 400px;">
                                                                            <input type="file" class="custom-file-input fileficker" id="step_2_valid_id_image_back" name="step_2_valid_id_image_back" accept=".jpg, .png">
                                                                            <label class="custom-file-label" for="step_2_valid_id_image_back" id="step_2_valid_id_image_back_label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="card-footer">
                                            <input type="hidden" id="step_2_primary_key" name="step_2_primary_key" value="<?= $this->session->userdata("primary_key") ?>">

                                            <button class="btn btn-primary float-right" type="submit" id="btn_step_2">Submit and Finish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php else : ?>
                <?php if ($status == "Pending") : ?>
                    <div class="container-fluid">
                        <div class="card bg-info">
                            <div class="card-body">
                                <h1>Application Under Review</h1>
                                <p>Thank you for submitting your application. We would like to inform you that your application is now being reviewed by our administrators.</p>
                                <hr>
                                <p>Please follow the instructions below:</p>
                                <ul>
                                    <li>Check this website regularly for updates on your application status.</li>
                                    <li>Ensure that you have provided accurate contact information.</li>
                                    <li>Feel free to contact our support team if you have any questions or concerns.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php elseif ($status == "Approved") : ?>
                    <div class="container-fluid">
                        <div class="card bg-success">
                            <div class="card-body">
                                <h1><?= $category ?> Assistance Application Accepted</h1>
                                <p>Congratulations! We are pleased to inform you that your application has been accepted.</p>
                                <hr>
                                <p>Please take note of the following:</p>
                                <ul>
                                    <li>Check your email for detailed information regarding the next steps.</li>
                                    <li>Submit any additional required documents within the specified timeline.</li>
                                    <li>Contact our student support team if you have any questions or need further assistance.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-12 bg-light">
                                        <h1 class="text-center">My QR Code</h1>
                                        <div class="centered mb-3">
                                            <div id="qrcode"></div>
                                        </div>
                                        <button id="downloadBtn" class="btn btn-primary w-100">Download QR Code</button>
                                    </div>
                                    <div class="col-xl-8 col-12">
                                        <h1>Instructions for Using the QR Code</h1>
                                        <ol>
                                            <li>Download the QR Code:</li>
                                            <ul>
                                                <li>Right-click on the QR Code image above.</li>
                                                <li>Select "Save Image As" to download the QR Code.</li>
                                                <li>Save it to your phone, tablet, or you can also print it.</li>
                                            </ul>
                                            <li>Visit the Office:</li>
                                            <ul>
                                                <li>Bring the downloaded or printed QR Code with you.</li>
                                                <li>Present it to the administrator at the office.</li>
                                            </ul>
                                            <li>Verification Process:</li>
                                            <ul>
                                                <li>The administrator will use their system to verify your application.</li>
                                                <li>They will scan the QR Code to retrieve the necessary information.</li>
                                            </ul>
                                            <li>Follow Administrator's Instructions:</li>
                                            <ul>
                                                <li>Once your application is verified, the administrator will provide you with additional instructions.</li>
                                                <li>Follow their guidance for further steps or actions.</li>
                                            </ul>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($status == "Rejected") : ?>
                    <div class="container-fluid">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <h1><?= $category ?> Assistance Application Rejected</h1>
                                <p>We regret to inform you that your application has been rejected.</p>
                                <hr>
                                <p>Please take note of the following:</p>
                                <ul>
                                    <li>Review the rejection notice carefully to understand the reasons for the rejection.</li>
                                    <li>Consider reaching out to our student support team for further clarification or guidance.</li>
                                    <li>Explore alternative options or funding opportunities to support your educational needs.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="container-fluid">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h1><?= $category ?> Assistance Application Completed</h1>
                                <p>Your assistance money has been released.</p>
                                <hr>
                                <p>Please take note of the following:</p>
                                <ul>
                                    <li>Confirm the receipt of the released funds in your designated account.</li>
                                    <li>Keep records of the transaction for your financial records.</li>
                                    <li>Reach out to our student support team for any questions or concerns related to the released assistance.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endif ?>
        <?php else : ?>
            <div class="card">
                <div class="card-body">
                    <table id="my_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Student Name</th>
                                <th>Transaction Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $result_transactions = $this->model->MOD_TRANSACTIONS_DATA(); ?>
                            <?php foreach ($result_transactions as $transactions) : ?>
                                <?php $result_useraccounts = $this->model->MOD_GET_USERACCOUNT_DATA($transactions->student_primary_key); ?>
                                <tr>
                                    <td><?= $transactions->date ?></td>
                                    <td><?= $transactions->time ?></td>
                                    <td><?= $result_useraccounts[0]->name ?></td>
                                    <td><?= $transactions->event ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>