<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Login Information -->
            <div class="col-lg-3 col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="rounded-circle img-bordered-sm view_image" width="100" height="100" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="dist/img/user_upload/<?= $this->session->userdata("user_image"); ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $this->session->userdata("name"); ?></h3>
                        <p class="text-muted text-center"><?= $this->session->userdata("student_number"); ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>RFID Number</b> <span class="float-right"><?= $this->session->userdata("rfid_number"); ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Username</b> <span class="float-right"><?= $this->session->userdata("username"); ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Password</b> <span class="float-right text-muted">**********</span>
                            </li>
                        </ul>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_login_account" class="btn btn-primary btn-block btn_edit_login_account">
                            <b>Edit Login Account</b>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Student Information -->
            <div class="col-lg-9 col-12">
                <!-- Personal Information -->
                <div class="card">
                    <div class="card-header mt-2 mb-2">
                        <span class="card-title text-muted text-bold"><i class="fas fa-user-alt"></i>&nbsp; Personal Information</span>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_personal_information"><i class="fas fa-pencil-alt float-right"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>First Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("first_name"); ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Student Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("student_number"); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Middle Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("middle_name") ? $this->session->userdata("middle_name") : "Not Yet Available"; ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>RFID Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("rfid_number"); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Last Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("last_name"); ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Sex</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("sex"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header mt-2 mb-2">
                        <span class="card-title text-muted text-bold"><i class="fas fa-id-card-alt"></i>&nbsp; Contact Information</span>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact_information"><i class="fas fa-pencil-alt float-right"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Mobile Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("mobile_number"); ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Address</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("address"); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>School Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("school_name") ? $this->session->userdata("school_name") : "Not Yet Available"; ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>School Address</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("school_address") ? $this->session->userdata("school_address") : "Not Yet Available"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Father's Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("father_name") ? $this->session->userdata("father_name") : "Not Yet Available"; ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Mother's Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("mother_name") ? $this->session->userdata("mother_name") : "Not Yet Available"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Father's Occupation</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("father_occupation") ? $this->session->userdata("father_occupation") : "Not Yet Available"; ?></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Mother's Occupation</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p><?= $this->session->userdata("mother_occupation") ? $this->session->userdata("mother_occupation") : "Not Yet Available"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>