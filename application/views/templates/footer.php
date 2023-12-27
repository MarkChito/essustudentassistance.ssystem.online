</div>

<!-- Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url() ?>"><?= project_name() ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- View Profile Picture Modal-->
<div class="modal fade" id="view_profile_picture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: transparent !important;">
            <img src="" id="proof_img_container" alt="" style="text-align: center; width: 100%">
        </div>
    </div>
</div>

<!-- About the Developers Modal-->
<div class="modal fade" id="about_the_developers_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle"><?= project_name() ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title text-muted text-bold"><i class="fas fa-bookmark"></i>&nbsp; System Developers</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <p><b>Mugar, Jose Amaro</b> - Leader</p>
                                <p><b>Abaratigue, Jericho</b> - Member</p>
                                <p><b>Capacite, Sheila Mae</b> - Member</p>
                                <p><b>Balibalos, Joana Rose</b> - Member</p>
                            </div>
                            <div class="col-3">
                                <img data-placement="right" class="img-fluid" src="dist/img/logo_alt.png" alt="Logo">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-sm">
                        <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url() ?>">Student Assistance Beneficiaries System</a>.</strong>
                        All rights reserved.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Accept Terms and Conditions Modal-->
<div class="modal fade" id="accept_terms_and_conditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Terms and Conditions (<span id="assistance_type_head"></span>)</h3>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li class="text-justify">
                                <h5>Acceptance of Terms</h5>
                                By using our Services, you acknowledge that you have read, understood, and agreed to these Terms, and you agree to comply with all applicable laws and regulations. If you are using our Services on behalf of an organization, you represent and warrant that you have the authority to bind that organization to these Terms.
                            </li>
                            <div class="mb-3"></div>
                            <li class="text-justify">
                                <h5>User Accounts</h5>
                                To access certain features of our Services, you may need to create a user account. You agree to provide accurate, current, and complete information during the registration process and to keep your account information updated. You are solely responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account or any other breach of security.
                            </li>
                            <div class="mb-3"></div>
                            <li class="text-justify">
                                <h5>Intellectual Property Rights</h5>
                                The content, features, and functionality of our Services, including but not limited to text, graphics, logos, images, software, and audio, are owned by or licensed to the Company and are protected by copyright, trademark, and other intellectual property laws. You may not reproduce, distribute, modify, transmit, or otherwise use any part of our Services without the prior written consent of the Company.
                            </li>
                            <div class="mb-3"></div>
                            <li class="text-justify">
                                <h5>User Responsibilities and Prohibited Activities</h5>
                                You agree to use our Services in compliance with all applicable laws and regulations. You further agree not to engage in any of the following prohibited activities:
                                <ul>
                                    <li>Violating any applicable laws, regulations, or third-party rights.</li>
                                    <li>Impersonating any person or entity or providing false information.</li>
                                    <li>Interfering with or disrupting the integrity or performance of our Services.</li>
                                    <li>Attempting to gain unauthorized access to any part of our Services or to other user accounts.</li>
                                    <li>Uploading or transmitting any viruses, malware, or other harmful code.</li>
                                    <li>Engaging in any activity that could harm, disable, overburden, or impair our Services or servers.</li>
                                    <li>Collecting or harvesting any personally identifiable information from other users without their consent.</li>
                                </ul>
                            </li>
                            <div class="mb-3"></div>
                            <li class="text-justify">
                                <h5>Privacy Policy</h5>
                                We respect your privacy and handle your personal information in accordance with our Privacy Policy. By using our Services, you consent to the collection, use, and sharing of your information as described in our Privacy Policy.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <form action="server/accept_terms_and_conditions" method="post" id="accept_terms_and_conditions_form">
                    <input type="hidden" id="assistance_type" name="assistance_type">
                    <input type="hidden" id="accept_user_id" name="accept_user_id" value="<?= $this->session->userdata("primary_key") ?>">

                    <button type="submit" class="btn btn-primary" id="btn_accept_terms_and_conditions">Accept</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Notification Modal-->
<div class="modal fade" id="view_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Message Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="notification_message-details">
                    <p class="notification_sender"><strong>Sender:</strong> <span id="view_notification_admin"></span></p>
                    <p class="notification_datetime"><strong>Date and Time:</strong> <span id="view_notification_date_and_time"></span></p>
                    <p class="notification_message"><strong>Message:</strong></p>
                    <p class="notification_message-content"><span id="view_notification_message"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Login Account Modal-->
<div class="modal fade" id="edit_login_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Login Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit_login_account_form">
                <div class="modal-body">
                    <div class="form-group mb-3 <?= $this->session->userdata("user_type") == "student" ? "d-none" : null ?>">
                        <label class="col-form-label" for="edit_login_account_name">Name</label>
                        <input type="text" class="form-control" id="edit_login_account_name" name="edit_login_account_name" value="<?= $this->session->userdata("name") ?>" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_login_account_rfid_number">RFID Number</label>
                        <input type="number" class="form-control" id="edit_login_account_rfid_number" name="edit_login_account_rfid_number" value="<?= $this->session->userdata("rfid_number") ?>" placeholder="Enter RFID Number" required>
                        <small class="text-danger d-none" id="error_edit_login_account_rfid_number">RFID Number is already in use</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_login_account_username">Username</label>
                        <input type="text" class="form-control" id="edit_login_account_username" name="edit_login_account_username" value="<?= $this->session->userdata("username") ?>" placeholder="Enter Username" required>
                        <small class="text-danger d-none" id="error_edit_login_account_username">Username already exists</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_login_account_password">Password</label>
                        <input type="password" class="form-control" id="edit_login_account_password" name="edit_login_account_password" placeholder="Password hidden for security">
                        <small class="text-danger" id="error_edit_login_account_password"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_login_account_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="edit_login_account_confirm_password" name="edit_login_account_confirm_password" placeholder="Password hidden for security">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_login_account_primary_key" name="edit_login_account_primary_key" value="<?= $this->session->userdata("primary_key") ?>">
                    <input type="hidden" id="edit_login_account_old_rfid_number" name="edit_login_account_old_rfid_number" value="<?= $this->session->userdata("rfid_number") ?>">
                    <input type="hidden" id="edit_login_account_old_username" name="edit_login_account_old_username" value="<?= $this->session->userdata("username") ?>">
                    <input type="hidden" id="edit_login_account_old_password" name="edit_login_account_old_password" value="<?= $this->session->userdata("password") ?>">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_login_account">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Personal Information Modal-->
<div class="modal fade" id="edit_personal_information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Personal Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit_personal_information_form">
                <div class="modal-body">
                    <div class="text-center">
                        <img id="edit_personal_information_user_image_display" class="rounded-circle img-bordered-sm" width="200" height="200" src="dist/img/user_upload/<?= $this->session->userdata("user_image"); ?>">
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <div class="custom-file" style="width: 400px;">
                                <input type="file" class="custom-file-input fileficker" id="edit_personal_information_user_image" name="edit_personal_information_user_image" accept=".jpg, .jpeg, .png">
                                <label class="custom-file-label" for="edit_personal_information_user_image" id="edit_personal_information_user_image_label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_first_name">First Name</label>
                                <input type="text" class="form-control" id="edit_personal_information_first_name" name="edit_personal_information_first_name" placeholder="Enter First Name" value="<?= $this->session->userdata("first_name"); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_middle_name">Middle Name (Optional)</label>
                                <input type="text" class="form-control" id="edit_personal_information_middle_name" name="edit_personal_information_middle_name" value="<?= $this->session->userdata("middle_name"); ?>" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_last_name">Last Name</label>
                                <input type="text" class="form-control" id="edit_personal_information_last_name" name="edit_personal_information_last_name" placeholder="Enter Last Name" value="<?= $this->session->userdata("last_name"); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_student_number">Student Number</label>
                                <input type="text" class="form-control" id="edit_personal_information_student_number" name="edit_personal_information_student_number" placeholder="Enter Student Number" value="<?= $this->session->userdata("student_number"); ?>" required>
                                <small class="text-danger d-none" id="error_edit_personal_information_student_number">Student Number is already in use</small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_rfid_number">RFID Number</label>
                                <input type="text" class="form-control" id="edit_personal_information_rfid_number" name="edit_personal_information_rfid_number" placeholder="Enter RFID Number" value="<?= $this->session->userdata("rfid_number"); ?>" required>
                                <small class="text-danger d-none" id="error_edit_personal_information_rfid_number">RFID Number is already in use</small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_personal_information_sex">Sex</label>
                                <select name="edit_personal_information_sex" id="edit_personal_information_sex" class="custom-select" required>
                                    <option value="" selected disabled>-- Select Sex --</option>
                                    <option value="Male" <?= $this->session->userdata("sex") == "Male" ? "selected" : null; ?>>Male</option>
                                    <option value="Female" <?= $this->session->userdata("sex") == "Female" ? "selected" : null; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_personal_information_login_primary_key" name="edit_personal_information_login_primary_key" value="<?= $this->session->userdata("primary_key"); ?>">
                    <input type="hidden" id="edit_personal_information_student_primary_key" name="edit_personal_information_student_primary_key" value="<?= $this->session->userdata("student_primary_key"); ?>">
                    <input type="hidden" id="edit_personal_information_old_rfid_number" name="edit_personal_information_old_rfid_number" value="<?= $this->session->userdata("rfid_number"); ?>">
                    <input type="hidden" id="edit_personal_information_old_student_number" name="edit_personal_information_old_student_number" value="<?= $this->session->userdata("student_number"); ?>">
                    <input type="hidden" id="edit_personal_information_old_user_image" name="edit_personal_information_old_user_image" value="<?= $this->session->userdata("user_image"); ?>">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_personal_information">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Contact Information Modal-->
<div class="modal fade" id="edit_contact_information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Contact Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit_contact_information_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_mobile_number">Mobile Number</label>
                                <input type="text" class="form-control" id="edit_contact_information_mobile_number" name="edit_contact_information_mobile_number" placeholder="Enter Mobile Number" value="<?= $this->session->userdata("mobile_number") ?>" required>
                                <small class="d-none" id="error_edit_contact_information_mobile_number"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_address">Address</label>
                                <input type="text" class="form-control" id="edit_contact_information_address" name="edit_contact_information_address" value="<?= $this->session->userdata("address") ?>" placeholder="Enter Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_school_name">School Name</label>
                                <input type="text" class="form-control" id="edit_contact_information_school_name" name="edit_contact_information_school_name" placeholder="Enter School Name" value="<?= $this->session->userdata("school_name") ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_school_address">School Address</label>
                                <input type="text" class="form-control" id="edit_contact_information_school_address" name="edit_contact_information_school_address" value="<?= $this->session->userdata("school_address") ?>" placeholder="Enter School Address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_father_name">Father's Name</label>
                                <input type="text" class="form-control" id="edit_contact_information_father_name" name="edit_contact_information_father_name" placeholder="Enter Father's Name" value="<?= $this->session->userdata("father_name") ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_father_occupation">Father's Occupation</label>
                                <input type="text" class="form-control" id="edit_contact_information_father_occupation" name="edit_contact_information_father_occupation" value="<?= $this->session->userdata("father_occupation") ?>" placeholder="Enter Father's Occupation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_mother_name">Mother's Name</label>
                                <input type="text" class="form-control" id="edit_contact_information_mother_name" name="edit_contact_information_mother_name" placeholder="Enter Mother's Name" value="<?= $this->session->userdata("mother_name") ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="edit_contact_information_mother_occupation">Mother's Occupation</label>
                                <input type="text" class="form-control" id="edit_contact_information_mother_occupation" name="edit_contact_information_mother_occupation" value="<?= $this->session->userdata("mother_occupation") ?>" placeholder="Enter Mother's Occupation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_contact_information_student_primary_key" name="edit_contact_information_student_primary_key" value="<?= $this->session->userdata("student_primary_key") ?>">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_contact_information">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Admin Modal-->
<div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Administrator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="add_admin_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="add_admin_name">Name</label>
                                <input type="text" class="form-control" id="add_admin_name" name="add_admin_name" placeholder="Enter Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="add_admin_rfid_number">RFID Number</label>
                                <input type="number" class="form-control" id="add_admin_rfid_number" name="add_admin_rfid_number" placeholder="Enter RFID Number" required>
                                <small class="text-danger d-none" id="error_add_admin_rfid_number">RFID Number is already in use</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="add_admin_username">Username</label>
                                <input type="text" class="form-control" id="add_admin_username" name="add_admin_username" placeholder="Enter Username" required>
                                <small class="text-danger d-none" id="error_add_admin_username">Username is already in use</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="add_admin_password">Password</label>
                                <input type="password" class="form-control" id="add_admin_password" name="add_admin_password" placeholder="Enter Password" required>
                                <small class="text-danger" id="error_add_admin_password"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="add_admin_confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="add_admin_confirm_password" name="add_admin_confirm_password" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_add_admin">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Admin Modal-->
<div class="modal fade" id="edit_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Administrator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" id="edit_admin_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_admin_name">Name</label>
                        <input type="text" class="form-control" id="edit_admin_name" name="edit_admin_name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_admin_rfid_number">RFID Number</label>
                        <input type="text" class="form-control" id="edit_admin_rfid_number" name="edit_admin_rfid_number" placeholder="Enter RFID Number" required>
                        <small class="text-danger d-none" id="error_edit_admin_rfid_number">RFID Number is already in use</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_admin_username">Username</label>
                        <input type="text" class="form-control" id="edit_admin_username" name="edit_admin_username" placeholder="Enter Username" required>
                        <small class="text-danger d-none" id="error_edit_admin_username">Username is already in use</small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_admin_password">Password</label>
                        <input type="password" class="form-control" id="edit_admin_password" name="edit_admin_password" placeholder="Password hidden for security">
                        <small class="text-danger" id="error_edit_admin_password"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_admin_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="edit_admin_confirm_password" name="edit_admin_confirm_password" placeholder="Password hidden for security">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_admin_primary_key" name="edit_admin_primary_key">
                    <input type="hidden" id="edit_admin_old_rfid_number" name="edit_admin_old_rfid_number">
                    <input type="hidden" id="edit_admin_old_username" name="edit_admin_old_username">
                    <input type="hidden" id="edit_admin_old_password" name="edit_admin_old_password">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_admin">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Procedure Modal-->
<div class="modal fade" id="add_procedure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Procedure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/add_procedure" method="post" id="add_procedure_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="add_procedure_category">Category</label>
                        <select class="custom-select" name="add_procedure_category" id="add_procedure_category" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="Educational">Educational Assistance</option>
                            <option value="Scholarship">Scholarship Assistance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="add_procedure_description">Description</label>
                        <textarea class="form-control" rows="5" name="add_procedure_description" id="add_procedure_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_add_procedure">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Procedure Modal-->
<div class="modal fade" id="edit_procedure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Procedure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/edit_procedure" method="post" id="edit_procedure_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_procedure_category">Category</label>
                        <select class="custom-select" name="edit_procedure_category" id="edit_procedure_category" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="Educational">Educational Assistance</option>
                            <option value="Scholarship">Scholarship Assistance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_procedure_description">Description</label>
                        <textarea class="form-control" rows="5" name="edit_procedure_description" id="edit_procedure_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_procedure_primary_key" name="edit_procedure_primary_key">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_procedure">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Requirement Modal-->
<div class="modal fade" id="add_requirement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/add_requirement" method="post" id="add_requirement_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="add_requirement_category">Category</label>
                        <select class="custom-select" name="add_requirement_category" id="add_requirement_category" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="Educational">Educational Assistance</option>
                            <option value="Scholarship">Scholarship Assistance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="add_requirement_description">Description</label>
                        <textarea class="form-control" rows="5" name="add_requirement_description" id="add_requirement_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_add_requirement">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Requirement Modal-->
<div class="modal fade" id="edit_requirement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/edit_requirement" method="post" id="edit_requirement_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_requirement_category">Category</label>
                        <select class="custom-select" name="edit_requirement_category" id="edit_requirement_category" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="Educational">Educational Assistance</option>
                            <option value="Scholarship">Scholarship Assistance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_requirement_description">Description</label>
                        <textarea class="form-control" rows="5" name="edit_requirement_description" id="edit_requirement_description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_requirement_primary_key" name="edit_requirement_primary_key">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_requirement">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Slot Modal-->
<div class="modal fade" id="edit_slot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/edit_slot" method="post" id="edit_slot_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_slot_category">Category</label>
                        <select class="custom-select" name="edit_slot_category" id="edit_slot_category" disabled required>
                            <option value="" disabled selected>-- Select Category --</option>
                            <option value="Educational">Educational Assistance</option>
                            <option value="Scholarship">Scholarship Assistance</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="edit_slot_slot">Description</label>
                        <input type="number" class="form-control" id="edit_slot_slot" name="edit_slot_slot" placeholder="Enter Number of Slots Available" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_slot_primary_key" name="edit_slot_primary_key">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit_slot">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Application Details Modal -->
<div class="modal fade" id="application_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Application Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Personal Information -->
                <div class="card">
                    <div class="card-header mt-2 mb-2">
                        <span class="card-title text-muted text-bold"><i class="fas fa-user-alt"></i>&nbsp; Personal Information</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>First Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_first_name"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Student Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_student_number"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Middle Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_middle_name"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>RFID Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_rfid_number"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Last Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_last_name"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Sex</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_sex"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header mt-2 mb-2">
                        <span class="card-title text-muted text-bold"><i class="fas fa-id-card-alt"></i>&nbsp; Contact Information</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Mobile Number</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_mobile_number"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Address</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_address"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>School Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_school_name"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>School Address</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_school_address"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Father's Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_father_name"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Mother's Name</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_mother_name"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-4">
                                <b>Father's Occupation</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_father_occupation"></p>
                            </div>
                            <div class="col-md-2 col-4">
                                <b>Mother's Occupation</b>
                            </div>
                            <div class="col-md-4 col-8">
                                <p id="application_details_mother_occupation"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Uploaded Documents -->
                <div class="card">
                    <div class="card-header mt-2 mb-2">
                        <span class="card-title text-muted text-bold"><i class="fas fa-cloud-upload-alt"></i>&nbsp; Uploaded Documents</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <b>User Image</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_user_image">Download Image</a>
                            </div>
                            <div class="col-md-3 col-6">
                                <b>Certificate of Indigency</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_indigency_image">Download Image</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <b>Certificate of Enrollment</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_coe_image">Download Image</a>
                            </div>
                            <div class="col-md-3 col-6">
                                <b>PSA Birth Certificate</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_psa_image">Download Image</a>
                            </div>
                        </div>
                        <?php if ($category == "Scholarship") : ?>
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <b>Transcript of Records</b>
                                </div>
                                <div class="col-md-3 col-6">
                                    <a href="" download="" id="application_details_tor_image">Download Image</a>
                                </div>
                                <div class="col-md-3 col-6">
                                    <b>Report Card</b>
                                </div>
                                <div class="col-md-3 col-6">
                                    <a href="" download="" id="application_details_report_card_image">Download Image</a>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <b>Valid ID (Front)</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_valid_id_image_front">Download Image</a>
                            </div>
                            <div class="col-md-3 col-6">
                                <b>Valid ID (Back)</b>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="" download="" id="application_details_valid_id_image_back">Download Image</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Set Status Modal-->
<div class="modal fade" id="set_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Set Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/set_status" method="post" id="set_status_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="set_status_status">Status</label>
                        <select class="custom-select" name="set_status_status" id="set_status_status" required>
                            <option value="" disabled selected>-- Select Status --</option>
                            <option value="Approved">Approve Application</option>
                            <option value="Rejected">Reject Application</option>
                            <option value="Step 1">Revert to Step 1</option>
                            <option value="Step 2">Revert to Step 2</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="set_status_message">Massage</label>
                        <textarea class="form-control" name="set_status_message" id="set_status_message" placeholder="Enter Message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="set_status_student_id" name="set_status_student_id">
                    <input type="hidden" id="set_status_category" name="set_status_category" value="<?= $this->input->get("category"); ?>">
                    <input type="hidden" id="set_status_admin_name" name="set_status_admin_name" value="<?= $this->session->userdata("name") ?>">
                    <input type="hidden" id="set_status_admin_id" name="set_status_admin_id" value="<?= $this->session->userdata("primary_key") ?>">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_set_status">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Student Status Modal-->
<div class="modal fade" id="edit_student_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Reset Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="server/reset_status" method="post" id="reset_status_form">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="reset_status_message">Massage</label>
                        <textarea class="form-control" name="reset_status_message" id="reset_status_message" placeholder="Enter Message" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="reset_status_student_id" name="reset_status_student_id">
                    <input type="hidden" id="reset_status_admin_name" name="reset_status_admin_name" value="<?= $this->session->userdata("name") ?>">
                    <input type="hidden" id="reset_status_admin_id" name="reset_status_admin_id" value="<?= $this->session->userdata("primary_key") ?>">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_reset_status">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scan QR COde Modal -->
<div class="modal fade" id="scan_qr_code">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan QR Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="scan_qr_code_form">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div id="scan_qr_code_gif">
                                <img src="dist/img/scan_qr_code_gif.gif" alt="RFID Logo" class="w-100">
                            </div>
                            <div id="loading" class="d-none">
                                <img src="dist/img/loading.gif" alt="RFID Logo" class="w-100">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group" id="qr_code_input">
                                <label for="register_rfid_number">Scan QR Code</label>
                                <input type="text" class="form-control" name="qr_code_data" id="qr_code_data" placeholder="QR Code Data" required>
                            </div>
                            <div class="text-center d-none" id="qr_code_verify">
                                <h5 class="text-muted">Verifying QR Code . . .</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Sweetalert -->
<script src="plugins/sweetalert2/sweetalert2@11.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- QR Code -->
<script src="plugins/qrcode/qrcode.min.js"></script>

<!-- Custom JavaScript -->
<script>
    $(document).ready(function() {
        var alert_message = <?= $this->session->userdata("alert") ? json_encode($this->session->userdata("alert")) : json_encode(array()) ?>;
        var base_url = "<?= base_url() ?>";
        var current_tab = "<?= $this->session->userdata("current_tab") ?>";
        var is_opened = true;
        var application_id = "<?= $this->session->userdata("application_id") ? $this->session->userdata("application_id") : null ?>";
        var progress = "<?= $this->session->userdata("progress") ? $this->session->userdata("progress") : null ?>";
        var status = "<?= $this->session->userdata("status") ? $this->session->userdata("status") : null ?>";

        disable_developer_functions(false);

        check_alert_message(alert_message);

        if (current_tab == "dashboard") {
            generateQRCode(application_id, progress, status);
        }

        $(".getFullYear").html(new Date().getFullYear());

        $("#btn_release_money").click(function() {
            var primary_key = $(this).attr("primary_key");

            $("#btn_release_money").text("Processing Request...");
            $("#btn_release_money").attr("disabled", true);

            var formData = new FormData();

            formData.append("primary_key", primary_key);

            $.ajax({
                url: 'server/update_application_status',
                data: formData,
                type: 'POST',
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == "OK") {
                        location.href = base_url + "scan_qr_code";
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

        $("#qr_code_data").on("keydown", function(e) {
            if (event.which === 13) {
                var error = 0;

                $("#scan_qr_code_gif").addClass("d-none");
                $("#qr_code_input").addClass("d-none");

                $("#loading").removeClass("d-none");
                $("#qr_code_verify").removeClass("d-none");

                var formData = new FormData();

                formData.append("application_id", $("#qr_code_data").val());

                $.ajax({
                    url: 'server/check_application_id',
                    data: formData,
                    type: 'POST',
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#loading").addClass("d-none");
                        $("#qr_code_verify").addClass("d-none");
                        $("#scan_qr_code_gif").removeClass("d-none");
                        $("#qr_code_input").removeClass("d-none");

                        $("[data-dismiss='modal']").trigger("click");

                        if (response["status"] != "OK") {
                            $("#error_message").attr("class", "text-danger");
                            $("#error_message").html(response["content"]);

                            error++;
                        }

                        if (error == 0) {
                            $("#btn_scan_qr_code").addClass("d-none");
                            $("#no_data").addClass("d-none");
                            $("#data").removeClass("d-none");

                            response["content"].forEach((record) => {
                                var user_image = record.user_image;
                                var indigency_image = record.indigency_image;
                                var psa_image = record.psa_image;
                                var coe_image = record.coe_image;
                                var tor_image = record.tor_image;
                                var report_card_image = record.report_card_image;
                                var valid_id_image_front = record.valid_id_image_front;
                                var valid_id_image_back = record.valid_id_image_back;
                                var last_name = record.last_name;

                                $("#scan_qr_code_first_name").text(record.first_name);
                                $("#scan_qr_code_middle_name").text(record.middle_name);
                                $("#scan_qr_code_last_name").text(record.last_name);
                                $("#scan_qr_code_student_number").text(record.student_number);
                                $("#scan_qr_code_rfid_number").text(response["rfid_number"]);
                                $("#scan_qr_code_sex").text(record.sex);
                                $("#scan_qr_code_mobile_number").text(record.mobile_number);
                                $("#scan_qr_code_address").text(record.address);
                                $("#scan_qr_code_school_name").text(record.school_name);
                                $("#scan_qr_code_school_address").text(record.school_address);
                                $("#scan_qr_code_father_name").text(record.father_name);
                                $("#scan_qr_code_father_occupation").text(record.father_occupation);
                                $("#scan_qr_code_mother_name").text(record.mother_name);
                                $("#scan_qr_code_mother_occupation").text(record.mother_occupation);

                                $("#btn_release_money").attr("primary_key", record.primary_key);

                                $("#scan_qr_code_user_image").removeAttr("href");
                                $("#scan_qr_code_user_image").removeAttr("download");
                                $("#scan_qr_code_user_image").html("No Image Uploaded");

                                $("#scan_qr_code_indigency_image").removeAttr("href");
                                $("#scan_qr_code_indigency_image").removeAttr("download");
                                $("#scan_qr_code_indigency_image").html("No Image Uploaded");

                                $("#scan_qr_code_coe_image").removeAttr("href");
                                $("#scan_qr_code_coe_image").removeAttr("download");
                                $("#scan_qr_code_coe_image").html("No Image Uploaded");

                                $("#scan_qr_code_psa_image").removeAttr("href");
                                $("#scan_qr_code_psa_image").removeAttr("download");
                                $("#scan_qr_code_psa_image").html("No Image Uploaded");

                                $("#scan_qr_code_tor_image").removeAttr("href");
                                $("#scan_qr_code_tor_image").removeAttr("download");
                                $("#scan_qr_code_tor_image").html("No Image Uploaded");

                                $("#scan_qr_code_report_card_image").removeAttr("href");
                                $("#scan_qr_code_report_card_image").removeAttr("download");
                                $("#scan_qr_code_report_card_image").html("No Image Uploaded");

                                $("#scan_qr_code_valid_id_image_front").removeAttr("href");
                                $("#scan_qr_code_valid_id_image_front").removeAttr("download");
                                $("#scan_qr_code_valid_id_image_front").html("No Image Uploaded");

                                $("#scan_qr_code_valid_id_image_back").removeAttr("href");
                                $("#scan_qr_code_valid_id_image_back").removeAttr("download");
                                $("#scan_qr_code_valid_id_image_back").html("No Image Uploaded");

                                if (user_image) {
                                    $("#scan_qr_code_user_image").attr("href", "dist/img/user_upload/" + user_image);
                                    $("#scan_qr_code_user_image").attr("download", last_name + "_user_image");
                                    $("#scan_qr_code_user_image").html("Download Image");
                                }

                                if (indigency_image) {
                                    $("#scan_qr_code_indigency_image").attr("href", "dist/img/user_upload/" + indigency_image);
                                    $("#scan_qr_code_indigency_image").attr("download", last_name + "_indigency_image");
                                    $("#scan_qr_code_indigency_image").html("Download Image");
                                }

                                if (coe_image) {
                                    $("#scan_qr_code_coe_image").attr("href", "dist/img/user_upload/" + coe_image);
                                    $("#scan_qr_code_coe_image").attr("download", last_name + "_coe_image");
                                    $("#scan_qr_code_coe_image").html("Download Image");
                                }

                                if (psa_image) {
                                    $("#scan_qr_code_psa_image").attr("href", "dist/img/user_upload/" + psa_image);
                                    $("#scan_qr_code_psa_image").attr("download", last_name + "_psa_image");
                                    $("#scan_qr_code_psa_image").html("Download Image");
                                }

                                if (tor_image) {
                                    $("#scan_qr_code_tor_image").attr("href", "dist/img/user_upload/" + tor_image);
                                    $("#scan_qr_code_tor_image").attr("download", last_name + "_tor_image");
                                    $("#scan_qr_code_tor_image").html("Download Image");
                                }

                                if (report_card_image) {
                                    $("#scan_qr_code_report_card_image").attr("href", "dist/img/user_upload/" + report_card_image);
                                    $("#scan_qr_code_report_card_image").attr("download", last_name + "_report_card_image");
                                    $("#scan_qr_code_report_card_image").html("Download Image");
                                }

                                if (valid_id_image_front) {
                                    $("#scan_qr_code_valid_id_image_front").attr("href", "dist/img/user_upload/" + valid_id_image_front);
                                    $("#scan_qr_code_valid_id_image_front").attr("download", last_name + "_valid_id_image_front");
                                    $("#scan_qr_code_valid_id_image_front").html("Download Image");
                                }

                                if (valid_id_image_back) {
                                    $("#scan_qr_code_valid_id_image_back").attr("href", "dist/img/user_upload/" + valid_id_image_back);
                                    $("#scan_qr_code_valid_id_image_back").attr("download", last_name + "_valid_id_image_back");
                                    $("#scan_qr_code_valid_id_image_back").html("Download Image");
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                e.preventDefault();
            }
        })

        $('#scan_qr_code').on('shown.bs.modal', function() {
            $('#qr_code_data').val(null);
            $('#qr_code_data').focus();
        })

        $("#set_status_form").submit(function(e) {
            $("#btn_set_status").html("Processing Request...");
            $("#btn_set_status").attr("disabled", true);
        })

        $("#reset_status_form").submit(function(e) {
            $("#btn_reset_status").html("Processing Request...");
            $("#btn_reset_status").attr("disabled", true);
        })

        $(".btn_logout").click(function() {
            location.href = "server/logout";
        })

        $(".nav-link").click(function() {
            $(this).children(".tab_spinner").attr("class", "spinner-border spinner-border-sm text-success float-right tab_spinner");
        })

        $("#btn_pushmenu").click(function() {
            if (!isMobileDevice()) {
                if (is_opened) {
                    is_opened = false;

                    $("#favicon").attr("style", "height: auto; width: 50px !important; padding-top: 10px");
                } else {
                    is_opened = true;

                    $("#favicon").attr("style", "height: auto; width: 200px !important; padding-top: 10px");
                }
            }
        })

        $("#my_table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "targets": 'no-sort',
            "bSort": false,
            "order": []
        })

        $(".edit_admin").click(function() {
            var primary_key = $(this).attr("primary_key");
            var name = $(this).attr("name");
            var rfid_number = $(this).attr("rfid_number");
            var username = $(this).attr("username");
            var password = $(this).attr("password");

            $("#edit_admin_name").val(name);
            $("#edit_admin_username").val(username);
            $("#edit_admin_rfid_number").val(rfid_number);

            $("#edit_admin_primary_key").val(primary_key);
            $("#edit_admin_old_username").val(username);
            $("#edit_admin_old_rfid_number").val(rfid_number);
            $("#edit_admin_old_password").val(password);
        })

        $(".edit_student_status").click(function() {
            var login_primary_key = $(this).attr("login_primary_key");

            $("#reset_status_student_id").val(login_primary_key);
        })

        $(".delete_admin").click(function() {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You are going to DELETE this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_admin?primary_key=" + primary_key;
                }
            })
        })

        $(".delete_student").click(function() {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You are going to DELETE this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_student?primary_key=" + primary_key;
                }
            })
        })

        $(".edit_procedure").click(function() {
            var primary_key = $(this).attr("primary_key");
            var category = $(this).attr("category");
            var description = $(this).attr("description");

            $("#edit_procedure_category").val(category);
            $("#edit_procedure_description").val(description);

            $("#edit_procedure_primary_key").val(primary_key);
        })

        $(".delete_procedure").click(function() {
            var primary_key = $(this).attr("primary_key");
            var category = $(this).attr("category");

            Swal.fire({
                title: 'Are you sure?',
                text: "You are going to DELETE this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_procedure?primary_key=" + primary_key;
                }
            })
        })

        $(".edit_requirement").click(function() {
            var primary_key = $(this).attr("primary_key");
            var category = $(this).attr("category");
            var description = $(this).attr("description");

            $("#edit_requirement_category").val(category);
            $("#edit_requirement_description").val(description);

            $("#edit_requirement_primary_key").val(primary_key);
        })

        $(".delete_requirement").click(function() {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You are going to DELETE this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_requirement?primary_key=" + primary_key;
                }
            })
        })

        $(".edit_slot").click(function() {
            var primary_key = $(this).attr("primary_key");
            var category = $(this).attr("category");
            var slot = $(this).attr("slot");

            $("#edit_slot_category").val(category);
            $("#edit_slot_slot").val(slot);

            $("#edit_slot_primary_key").val(primary_key);
        })

        $("#add_admin_form").submit(function(e) {
            $("#btn_add_admin").html("Processing Request...");
            $("#btn_add_admin").attr("disabled", true);

            var password = $("#add_admin_password").val();
            var confirm_password = $("#add_admin_confirm_password").val();

            var error = 0;

            if (add_admin_verify_password(password, confirm_password)) {
                var formData = new FormData();

                formData.append("name", $("#add_admin_name").val());
                formData.append("rfid_number", $("#add_admin_rfid_number").val());
                formData.append("username", $("#add_admin_username").val());
                formData.append("password", $("#add_admin_password").val());

                $.ajax({
                    url: 'server/add_admin',
                    data: formData,
                    type: 'POST',
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response[0] != "OK") {
                            $("#add_admin_rfid_number").addClass("is-invalid");
                            $("#error_add_admin_rfid_number").removeClass("d-none");
                            $("#error_add_admin_rfid_number").addClass("text-danger");

                            error++;
                        }

                        if (response[1] != "OK") {
                            $("#add_admin_username").addClass("is-invalid");
                            $("#error_add_admin_username").removeClass("d-none");
                            $("#error_add_admin_username").addClass("text-danger");

                            error++;
                        }

                        if (error == 0) {
                            location.href = base_url + current_tab;
                        } else {
                            $("#btn_add_admin").html("Submit");
                            $("#btn_add_admin").removeAttr("disabled");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $("#btn_add_admin").html("Submit");
                $("#btn_add_admin").removeAttr("disabled");
            }
        })

        $("#edit_personal_information_form").submit(function(e) {
            $("#btn_edit_personal_information").html("Processing Request...");
            $("#btn_edit_personal_information").attr("disabled", true);

            var error = 0;

            var formData = new FormData();

            formData.append("first_name", $("#edit_personal_information_first_name").val());
            formData.append("middle_name", $("#edit_personal_information_middle_name").val());
            formData.append("last_name", $("#edit_personal_information_last_name").val());
            formData.append("student_number", $("#edit_personal_information_student_number").val());
            formData.append("rfid_number", $("#edit_personal_information_rfid_number").val());
            formData.append("sex", $("#edit_personal_information_sex").val());
            formData.append("user_image", $("#edit_personal_information_user_image")[0].files[0]);
            formData.append("login_primary_key", $("#edit_personal_information_login_primary_key").val());
            formData.append("student_primary_key", $("#edit_personal_information_student_primary_key").val());
            formData.append("old_student_number", $("#edit_personal_information_old_student_number").val());
            formData.append("old_rfid_number", $("#edit_personal_information_old_rfid_number").val());
            formData.append("old_user_image", $("#edit_personal_information_old_user_image").val());

            $.ajax({
                url: 'server/edit_personal_information',
                data: formData,
                type: 'POST',
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response[0] != "OK") {
                        $("#edit_personal_information_rfid_number").addClass("is-invalid");
                        $("#error_edit_personal_information_rfid_number").removeClass("d-none");
                        $("#error_edit_personal_information_rfid_number").addClass("text-danger");

                        error++;
                    }

                    if (response[1] != "OK") {
                        $("#edit_personal_information_student_number").addClass("is-invalid");
                        $("#error_edit_personal_information_student_number").removeClass("d-none");
                        $("#error_edit_personal_information_student_number").addClass("text-danger");

                        error++;
                    }

                    if (error == 0) {
                        location.href = base_url + current_tab;
                    } else {
                        $("#btn_edit_personal_information").html("Update");
                        $("#btn_edit_personal_information").removeAttr("disabled");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

        $("#add_admin_password").on("keydown", function() {
            $("#add_admin_password").attr("class", "form-control");
            $("#add_admin_confirm_password").attr("class", "form-control");
            $("#error_add_admin_password").attr("class", "d-none");
        })

        $("#add_admin_confirm_password").on("keydown", function() {
            $("#add_admin_password").attr("class", "form-control");
            $("#add_admin_confirm_password").attr("class", "form-control");
            $("#error_add_admin_password").attr("class", "d-none");
        })

        $("#add_admin_rfid_number").on("keydown", function() {
            $("#add_admin_rfid_number").attr("class", "form-control");
            $("#error_add_admin_rfid_number").attr("class", "d-none");

            if (event.which === 13) {
                event.preventDefault();
            }
        })

        $("#add_admin_username").on("keydown", function() {
            $("#add_admin_username").attr("class", "form-control");
            $("#error_add_admin_username").attr("class", "d-none");
        })

        $("#edit_admin_form").submit(function(e) {
            $("#btn_edit_admin").html("Processing Request...");
            $("#btn_edit_admin").attr("disabled", true);

            var name = $("#edit_admin_name").val();
            var rfid_number = $("#edit_admin_rfid_number").val();
            var username = $("#edit_admin_username").val();
            var password = $("#edit_admin_password").val();
            var confirm_password = $("#edit_admin_confirm_password").val();
            var primary_key = $("#edit_admin_primary_key").val();
            var old_rfid_number = $("#edit_admin_old_rfid_number").val();
            var old_username = $("#edit_admin_old_username").val();
            var old_password = $("#edit_admin_old_password").val();

            var error = 0;

            if (edit_admin_verify_password(password, confirm_password)) {
                var formData = new FormData();

                formData.append('name', name);
                formData.append('rfid_number', rfid_number);
                formData.append('username', username);
                formData.append('password', password);
                formData.append('primary_key', primary_key);
                formData.append('old_rfid_number', old_rfid_number);
                formData.append('old_username', old_username);
                formData.append('old_password', old_password);

                $.ajax({
                    url: 'server/edit_admin',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response[0] != "OK") {
                            $("#edit_admin_rfid_number").addClass("is-invalid");
                            $("#error_edit_admin_rfid_number").removeClass("d-none");
                            $("#error_edit_admin_rfid_number").addClass("text-danger");

                            error++;
                        }

                        if (response[1] != "OK") {
                            $("#edit_admin_username").addClass("is-invalid");
                            $("#error_edit_admin_username").removeClass("d-none");
                            $("#error_edit_admin_username").addClass("text-danger");

                            error++;
                        }

                        if (error == 0) {
                            location.href = base_url + current_tab;
                        } else {
                            $("#btn_edit_admin").html("Update");
                            $("#btn_edit_admin").removeAttr("disabled");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        })

        $("#edit_admin_password").on("keydown", function() {
            $("#edit_admin_password").attr("class", "form-control");
            $("#edit_admin_confirm_password").attr("class", "form-control");
            $("#error_edit_admin_password").attr("class", "d-none");
        })

        $("#edit_admin_confirm_password").on("keydown", function() {
            $("#edit_admin_password").attr("class", "form-control");
            $("#edit_admin_confirm_password").attr("class", "form-control");
            $("#error_edit_admin_password").attr("class", "d-none");
        })

        $("#edit_admin_rfid_number").on("keydown", function() {
            $("#edit_admin_rfid_number").attr("class", "form-control");
            $("#error_edit_admin_rfid_number").attr("class", "d-none");

            if (event.which === 13) {
                event.preventDefault();
            }
        })

        $("#edit_admin_username").on("keydown", function() {
            $("#edit_admin_username").attr("class", "form-control");
            $("#error_edit_admin_username").attr("class", "d-none");
        })

        $("#edit_login_account_form").submit(function(e) {
            var name = $("#edit_login_account_name").val();
            var rfid_number = $("#edit_login_account_rfid_number").val();
            var username = $("#edit_login_account_username").val();
            var password = $("#edit_login_account_password").val();
            var confirm_password = $("#edit_login_account_confirm_password").val();

            var primary_key = $("#edit_login_account_primary_key").val();
            var old_rfid_number = $("#edit_login_account_old_rfid_number").val();
            var old_username = $("#edit_login_account_old_username").val();
            var old_password = $("#edit_login_account_old_password").val();

            var error = 0;

            if (edit_login_account_verify_password(password, confirm_password)) {
                $("#btn_edit_login_account").html("Processing Request...");
                $("#btn_edit_login_account").attr("disabled", true);

                $.ajax({
                    url: "server/edit_login_account",
                    data: {
                        name: name,
                        rfid_number: rfid_number,
                        username: username,
                        password: password,
                        primary_key: primary_key,
                        old_rfid_number: old_rfid_number,
                        old_username: old_username,
                        old_password: old_password
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(response) {
                        if (response[0] != "OK") {
                            $("#edit_login_account_rfid_number").addClass("is-invalid");
                            $("#error_edit_login_account_rfid_number").removeClass("d-none");

                            error++;
                        }

                        if (response[1] != "OK") {
                            $("#edit_login_account_username").addClass("is-invalid");
                            $("#error_edit_login_account_username").removeClass("d-none");

                            error++;
                        }

                        if (error == 0) {
                            location.href = base_url + current_tab;
                        } else {
                            $("#btn_edit_login_account").html("Update");
                            $("#btn_edit_login_account").removeAttr("disabled");
                        }
                    }
                });
            }
        })

        $("#add_procedure_form").submit(function(e) {
            $("#btn_add_procedure").html("Processing Request...");
            $("#btn_add_procedure").attr("disabled", true);
        })

        $("#edit_procedure_form").submit(function(e) {
            $("#btn_edit_procedure").html("Processing Request...");
            $("#btn_edit_procedure").attr("disabled", true);
        })

        $("#add_requirement_form").submit(function(e) {
            $("#btn_add_requirement").html("Processing Request...");
            $("#btn_add_requirement").attr("disabled", true);
        })

        $("#edit_requirement_form").submit(function(e) {
            $("#btn_edit_requirement").html("Processing Request...");
            $("#btn_edit_requirement").attr("disabled", true);
        })

        $("#accept_terms_and_conditions_form").submit(function(e) {
            $("#btn_accept_terms_and_conditions").html("Processing Request...");
            $("#btn_accept_terms_and_conditions").attr("disabled", true);
        })

        $("#edit_slot_form").submit(function(e) {
            $("#btn_edit_slot").html("Processing Request...");
            $("#btn_edit_slot").attr("disabled", true);
        })

        $("#step_2_form").submit(function(e) {
            $("#btn_step_2").html("Processing Request...");
            $("#btn_step_2").attr("disabled", true);
        })

        $("#edit_login_account_password").on("keydown", function() {
            $("#edit_login_account_password").attr("class", "form-control");
            $("#edit_login_account_confirm_password").attr("class", "form-control");
            $("#error_edit_login_account_password").attr("class", "d-none");
        })

        $("#edit_login_account_confirm_password").on("keydown", function() {
            $("#edit_login_account_password").attr("class", "form-control");
            $("#edit_login_account_confirm_password").attr("class", "form-control");
            $("#error_edit_login_account_password").attr("class", "d-none");
        })

        $("#edit_login_account_rfid_number").on("keydown", function() {
            $("#edit_login_account_rfid_number").attr("class", "form-control");
            $("#error_edit_login_account_rfid_number").attr("class", "text-danger d-none");

            if (event.which === 13) {
                event.preventDefault();
            }
        })

        $("#edit_login_account_username").on("keydown", function() {
            $("#edit_login_account_username").attr("class", "form-control");
            $("#error_edit_login_account_username").attr("class", "text-danger d-none");
        })

        $("#edit_personal_information_rfid_number").on("keydown", function() {
            $("#edit_personal_information_rfid_number").attr("class", "form-control");
            $("#error_edit_personal_information_rfid_number").attr("class", "d-none");

            if (event.which === 13) {
                event.preventDefault();
            }
        })

        $("#edit_personal_information_student_number").on("keydown", function() {
            $("#edit_personal_information_student_number").attr("class", "form-control");
            $("#error_edit_personal_information_student_number").attr("class", "d-none");
        })

        $("#step_1_rfid_number").on("keydown", function() {
            $("#step_1_rfid_number").attr("class", "form-control");
            $("#error_step_1_rfid_number").attr("class", "d-none");

            if (event.which === 13) {
                event.preventDefault();
            }
        })

        $("#step_1_student_number").on("keydown", function() {
            $("#step_1_student_number").attr("class", "form-control");
            $("#error_step_1_student_number").attr("class", "d-none");
        })

        $("#edit_contact_information_mobile_number").on("keydown", function() {
            $("#edit_contact_information_mobile_number").attr("class", "form-control");
            $("#error_edit_contact_information_mobile_number").attr("class", "d-none");
        })

        $("#step_1_mobile_number").on("keydown", function() {
            $("#step_1_mobile_number").attr("class", "form-control");
            $("#error_step_1_mobile_number").attr("class", "d-none");
        })

        $(".view_image").click(function() {
            src = $(this).attr("src");

            $("#proof_img_container").attr("src", src);
        })

        $("#edit_login_account_image").change(function() {
            display_image_info(this);
        })

        $("#edit_personal_information_user_image").change(function() {
            display_image_info_2(this);
        })

        $(".btn_accept_terms_and_conditions").click(function() {
            var assistance_type = $(this).attr("assistance_type");

            $("#assistance_type").val(assistance_type);

            if (assistance_type == "Educational") {
                $("#assistance_type_head").html("Educational Assistance");
            }

            if (assistance_type == "Scholarship") {
                $("#assistance_type_head").html("Scholarship Assistance");
            }
        })

        $("#edit_contact_information_form").submit(function(e) {
            $("#btn_edit_contact_information").html("Processing Request...");
            $("#btn_edit_contact_information").attr("disabled", true);

            var mobile_number = $("#edit_contact_information_mobile_number").val();

            if (edit_contact_information_verify_mobile_number(mobile_number)) {
                var formData = new FormData();

                formData.append("student_primary_key", $("#edit_contact_information_student_primary_key").val());
                formData.append("mobile_number", $("#edit_contact_information_mobile_number").val());
                formData.append("address", $("#edit_contact_information_address").val());
                formData.append("school_name", $("#edit_contact_information_school_name").val());
                formData.append("school_address", $("#edit_contact_information_school_address").val());
                formData.append("father_name", $("#edit_contact_information_father_name").val());
                formData.append("father_occupation", $("#edit_contact_information_father_occupation").val());
                formData.append("mother_name", $("#edit_contact_information_mother_name").val());
                formData.append("mother_occupation", $("#edit_contact_information_mother_occupation").val());

                $.ajax({
                    url: 'server/edit_contact_information',
                    data: formData,
                    type: 'POST',
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        location.href = base_url + current_tab;
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        })

        $("#step_1_form").submit(function(e) {
            $("#btn_step_1").html("Processing Request...");
            $("#btn_step_1").attr("disabled", true);

            var student_number = $("#step_1_student_number").val();
            var rfid_number = $("#step_1_rfid_number").val();
            var first_name = $("#step_1_first_name").val();
            var middle_name = $("#step_1_middle_name").val();
            var last_name = $("#step_1_last_name").val();
            var sex = $("#step_1_sex").val();
            var mobile_number = $("#step_1_mobile_number").val();
            var address = $("#step_1_address").val();
            var school_name = $("#step_1_school_name").val();
            var school_address = $("#step_1_school_address").val();
            var father_name = $("#step_1_father_name").val();
            var father_occupation = $("#step_1_father_occupation").val();
            var mother_name = $("#step_1_mother_name").val();
            var mother_occupation = $("#step_1_mother_occupation").val();
            var primary_key = $("#step_1_primary_key").val();
            var old_student_number = $("#step_1_old_student_number").val();
            var old_rfid_number = $("#step_1_old_rfid_number").val();

            if (step_1_verify_mobile_number(mobile_number)) {
                var formData = new FormData();

                formData.append('student_number', student_number);
                formData.append('rfid_number', rfid_number);
                formData.append('first_name', first_name);
                formData.append('middle_name', middle_name);
                formData.append('last_name', last_name);
                formData.append('sex', sex);
                formData.append('mobile_number', mobile_number);
                formData.append('address', address);
                formData.append('school_name', school_name);
                formData.append('school_address', school_address);
                formData.append('father_name', father_name);
                formData.append('father_occupation', father_occupation);
                formData.append('mother_name', mother_name);
                formData.append('mother_occupation', mother_occupation);
                formData.append('primary_key', primary_key);
                formData.append('old_student_number', old_student_number);
                formData.append('old_rfid_number', old_rfid_number);

                $.ajax({
                    url: 'server/step_1',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response[0] != "OK") {
                            $("#step_1_rfid_number").addClass("is-invalid");
                            $("#error_step_1_rfid_number").removeClass("d-none");
                            $("#error_step_1_rfid_number").addClass("text-danger");

                            error++;
                        }

                        if (response[1] != "OK") {
                            $("#step_1_student_number").addClass("is-invalid");
                            $("#error_step_1_student_number").removeClass("d-none");
                            $("#error_step_1_student_number").addClass("text-danger");

                            error++;
                        }

                        if (error == 0) {
                            location.href = base_url + current_tab;
                        } else {
                            $("#btn_step_1").html("Proceed to Step 2&nbsp;&nbsp;<i class='fas fa-arrow-right'></i>");
                            $("#btn_step_1").removeAttr("disabled");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        })

        $("#step_2_user_image").change(function() {
            display_image_info_3(this);
        })

        $("#step_2_indigency_image").change(function() {
            display_image_info_4(this);
        })

        $("#step_2_coe_image").change(function() {
            display_image_info_5(this);
        })

        $("#step_2_psa_image").change(function() {
            display_image_info_6(this);
        })

        $("#step_2_valid_id_image_front").change(function() {
            display_image_info_7(this);
        })

        $("#step_2_valid_id_image_back").change(function() {
            display_image_info_8(this);
        })

        $("#step_2_tor_image").change(function() {
            display_image_info_9(this);
        })

        $("#step_2_report_card_image").change(function() {
            display_image_info_10(this);
        })

        $(".btn_education_pending").click(function() {
            var student_id = $(this).attr("student_id");

            $("#set_status_student_id").val(student_id);
        })

        $(".pending_application").click(function() {
            var id = $(this).attr("student_id");
            var student_number = $(this).attr("student_number");
            var rfid_number = $(this).attr("rfid_number");
            var first_name = $(this).attr("first_name");
            var middle_name = $(this).attr("middle_name");
            var last_name = $(this).attr("last_name");
            var sex = $(this).attr("sex");
            var mobile_number = $(this).attr("mobile_number");
            var address = $(this).attr("address");
            var school_name = $(this).attr("school_name");
            var school_address = $(this).attr("school_address");
            var father_name = $(this).attr("father_name");
            var father_occupation = $(this).attr("father_occupation");
            var mother_name = $(this).attr("mother_name");
            var mother_occupation = $(this).attr("mother_occupation");
            var user_image = $(this).attr("user_image");
            var indigency_image = $(this).attr("indigency_image");
            var coe_image = $(this).attr("coe_image");
            var psa_image = $(this).attr("psa_image");
            var tor_image = $(this).attr("tor_image");
            var report_card_image = $(this).attr("report_card_image");
            var valid_id_image_front = $(this).attr("valid_id_image_front");
            var valid_id_image_back = $(this).attr("valid_id_image_back");

            $("#application_details_student_number").html(student_number);
            $("#application_details_rfid_number").html(rfid_number);
            $("#application_details_first_name").html(first_name);
            $("#application_details_middle_name").html(middle_name);
            $("#application_details_last_name").html(last_name);
            $("#application_details_sex").html(sex);
            $("#application_details_mobile_number").html(mobile_number);
            $("#application_details_address").html(address);
            $("#application_details_school_name").html(school_name);
            $("#application_details_school_address").html(school_address);
            $("#application_details_father_name").html(father_name);
            $("#application_details_father_occupation").html(father_occupation);
            $("#application_details_mother_name").html(mother_name);
            $("#application_details_mother_occupation").html(mother_occupation);

            $("#application_details_user_image").removeAttr("href");
            $("#application_details_user_image").removeAttr("download");
            $("#application_details_user_image").html("No Image Uploaded");

            $("#application_details_indigency_image").removeAttr("href");
            $("#application_details_indigency_image").removeAttr("download");
            $("#application_details_indigency_image").html("No Image Uploaded");

            $("#application_details_coe_image").removeAttr("href");
            $("#application_details_coe_image").removeAttr("download");
            $("#application_details_coe_image").html("No Image Uploaded");

            $("#application_details_psa_image").removeAttr("href");
            $("#application_details_psa_image").removeAttr("download");
            $("#application_details_psa_image").html("No Image Uploaded");

            $("#application_details_tor_image").removeAttr("href");
            $("#application_details_tor_image").removeAttr("download");
            $("#application_details_tor_image").html("No Image Uploaded");

            $("#application_details_report_card_image").removeAttr("href");
            $("#application_details_report_card_image").removeAttr("download");
            $("#application_details_report_card_image").html("No Image Uploaded");

            $("#application_details_valid_id_image_front").removeAttr("href");
            $("#application_details_valid_id_image_front").removeAttr("download");
            $("#application_details_valid_id_image_front").html("No Image Uploaded");

            $("#application_details_valid_id_image_back").removeAttr("href");
            $("#application_details_valid_id_image_back").removeAttr("download");
            $("#application_details_valid_id_image_back").html("No Image Uploaded");

            if (user_image) {
                $("#application_details_user_image").attr("href", "dist/img/user_upload/" + user_image);
                $("#application_details_user_image").attr("download", last_name + "_user_image");
                $("#application_details_user_image").html("Download Image");
            }

            if (indigency_image) {
                $("#application_details_indigency_image").attr("href", "dist/img/user_upload/" + indigency_image);
                $("#application_details_indigency_image").attr("download", last_name + "_indigency_image");
                $("#application_details_indigency_image").html("Download Image");
            }

            if (coe_image) {
                $("#application_details_coe_image").attr("href", "dist/img/user_upload/" + coe_image);
                $("#application_details_coe_image").attr("download", last_name + "_coe_image");
                $("#application_details_coe_image").html("Download Image");
            }

            if (psa_image) {
                $("#application_details_psa_image").attr("href", "dist/img/user_upload/" + psa_image);
                $("#application_details_psa_image").attr("download", last_name + "_psa_image");
                $("#application_details_psa_image").html("Download Image");
            }

            if (tor_image) {
                $("#application_details_tor_image").attr("href", "dist/img/user_upload/" + tor_image);
                $("#application_details_tor_image").attr("download", last_name + "_tor_image");
                $("#application_details_tor_image").html("Download Image");
            }

            if (report_card_image) {
                $("#application_details_report_card_image").attr("href", "dist/img/user_upload/" + report_card_image);
                $("#application_details_report_card_image").attr("download", last_name + "_report_card_image");
                $("#application_details_report_card_image").html("Download Image");
            }

            if (valid_id_image_front) {
                $("#application_details_valid_id_image_front").attr("href", "dist/img/user_upload/" + valid_id_image_front);
                $("#application_details_valid_id_image_front").attr("download", last_name + "_valid_id_image_front");
                $("#application_details_valid_id_image_front").html("Download Image");
            }

            if (valid_id_image_back) {
                $("#application_details_valid_id_image_back").attr("href", "dist/img/user_upload/" + valid_id_image_back);
                $("#application_details_valid_id_image_back").attr("download", last_name + "_valid_id_image_back");
                $("#application_details_valid_id_image_back").html("Download Image");
            }
        })

        $(".notifications").click(function() {
            var primary_key = $(this).attr("notification_id");
            var message = $(this).attr("notification_message");
            var admin = $(this).attr("notification_admin");
            var date_and_time = $(this).attr("notification_date_and_time");

            $("#view_notification_admin").html(admin);
            $("#view_notification_date_and_time").html(date_and_time);
            $("#view_notification_message").html(message);

            $(this).find('h3, p').removeClass('text-bold');
            $(this).find('h3, p').addClass('text-muted');

            update_notification_status("server/update_notification_status", primary_key);
        })

        $('#my_table').on('click', '.notifications', function() {
            // Find the parent row and remove the "text-bold" class
            $(this).closest('tr.notifications_tr').removeClass('text-bold');
        })

        $("#notification_menu").click(function() {
            var student_primary_key = $(this).attr("student_primary_key");

            $("#notification_badge").addClass("d-none");

            update_notification_badge("server/update_notification_badge", student_primary_key);
        })

        $("#downloadBtn").click(function() {
            var number = application_id;
            var qrcodeDiv = document.getElementById("qrcode");
            var downloadBtn = document.getElementById("downloadBtn");

            var canvas = qrcodeDiv.getElementsByTagName("canvas")[0];
            var link = document.createElement("a");
            link.href = canvas.toDataURL("image/png");
            link.download = number + "_qrcode.png";
            link.click();
        })

        function isMobileDevice() {
            return /Mobi|Android|iPhone|iPad|iPod|Windows Phone|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }

        function generateQRCode(application_id, progress, status) {
            if (application_id && progress == "Completed" && status == "Approved") {
                var number = application_id;
                var qrcodeDiv = document.getElementById("qrcode");
                var downloadBtn = document.getElementById("downloadBtn");

                var qrcode = new QRCode(qrcodeDiv, {
                    text: number,
                    width: 256,
                    height: 256
                });
            }
        }

        function check_notification_count(notification_count, notification_badge_status) {
            if (parseInt(notification_count) > 0 && notification_badge_status == "active") {
                $("#notification_badge").attr("class", "badge badge-danger navbar-badge");
                $("#notification_badge").html(notification_count);
            }
        }

        function display_image_info(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#edit_login_account_image_label').text(uploader.files[0].name);
                $('#edit_login_account_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_2(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#edit_personal_information_user_image_label').text(uploader.files[0].name);
                $('#edit_personal_information_user_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_3(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_user_image_label').text(uploader.files[0].name);
                $('#step_2_user_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_user_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_4(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_indigency_image_label').text(uploader.files[0].name);
                $('#step_2_indigency_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_indigency_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_5(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_coe_image_label').text(uploader.files[0].name);
                $('#step_2_coe_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_coe_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_6(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_psa_image_label').text(uploader.files[0].name);
                $('#step_2_psa_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_psa_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_7(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_valid_id_image_front_label').text(uploader.files[0].name);
                $('#step_2_valid_id_image_front_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_valid_id_image_front_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_8(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_valid_id_image_back_label').text(uploader.files[0].name);
                $('#step_2_valid_id_image_back_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_valid_id_image_back_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_9(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_tor_image_label').text(uploader.files[0].name);
                $('#step_2_tor_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_tor_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_10(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#step_2_report_card_image_label').text(uploader.files[0].name);
                $('#step_2_report_card_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                $('#step_2_report_card_image_display').attr('img_src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function add_admin_verify_password(password, confirm_password) {
            var error = 0;

            if (!/[A-Z]/.test(password)) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Password must have at least one uppercase letter (A-Z)");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (!/[a-z]/.test(password)) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Password must have at least one lowercase letter (a-z)");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (!/[0-9]/.test(password)) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Password must have at least one digit (0-9)");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (password.length < 8) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Password must be at least 8 characters long");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (password != confirm_password) {
                $("#add_admin_password").attr("class", "form-control is-invalid");
                $("#add_admin_confirm_password").attr("class", "form-control is-invalid");

                $("#error_add_admin_password").html("Passwords do not match");
                $("#error_add_admin_password").attr("class", "text-danger");

                error++;
            }

            if (error > 0) {
                return false;
            } else {
                return true;
            }
        }

        function edit_admin_verify_password(password, confirm_password) {
            var error = 0;

            if (password) {
                if (!/[A-Z]/.test(password)) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Password must have at least one uppercase letter (A-Z)");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[a-z]/.test(password)) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Password must have at least one lowercase letter (a-z)");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[0-9]/.test(password)) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Password must have at least one digit (0-9)");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }

                if (password.length < 8) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Password must be at least 8 characters long");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }

                if (password != confirm_password) {
                    $("#edit_admin_password").attr("class", "form-control is-invalid");
                    $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_admin_password").html("Passwords do not match");
                    $("#error_edit_admin_password").attr("class", "text-danger");

                    error++;
                }
            }

            if (error > 0) {
                return false;
            } else {
                return true;
            }
        }

        function edit_contact_information_verify_mobile_number(mobile_number) {
            error = 0;

            mobile_number = mobile_number.replace(/[^\d]/g, '');

            var validPrefix = ['09'];
            var prefix = mobile_number.substr(0, 2);

            if (mobile_number.length !== 11) {
                $("#edit_contact_information_mobile_number").attr("class", "form-control is-invalid");

                $("#error_edit_contact_information_mobile_number").html("Mobile Number must be 11 digits long");
                $("#error_edit_contact_information_mobile_number").attr("class", "text-danger");

                error++;
            }

            if (!validPrefix.includes(prefix)) {
                $("#edit_contact_information_mobile_number").attr("class", "form-control is-invalid");

                $("#error_edit_contact_information_mobile_number").html("Mobile Number must start with '09'");
                $("#error_edit_contact_information_mobile_number").attr("class", "text-danger");

                error++;
            }

            if (error == 0) {
                return true;
            } else {
                return false;
            }
        }

        function step_1_verify_mobile_number(mobile_number) {
            error = 0;

            mobile_number = mobile_number.replace(/[^\d]/g, '');

            var validPrefix = ['09'];
            var prefix = mobile_number.substr(0, 2);

            if (mobile_number.length !== 11) {
                $("#step_1_mobile_number").attr("class", "form-control is-invalid");

                $("#error_step_1_mobile_number").html("Mobile Number must be 11 digits long");
                $("#error_step_1_mobile_number").attr("class", "text-danger");

                error++;
            }

            if (!validPrefix.includes(prefix)) {
                $("#step_1_mobile_number").attr("class", "form-control is-invalid");

                $("#error_step_1_mobile_number").html("Mobile Number must start with '09'");
                $("#error_step_1_mobile_number").attr("class", "text-danger");

                error++;
            }

            if (error == 0) {
                return true;
            } else {
                return false;
            }
        }

        function edit_login_account_verify_password(password, confirm_password) {
            var error = 0;

            if (password) {
                if (!/[A-Z]/.test(password)) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Password must have at least one uppercase letter (A-Z)");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[a-z]/.test(password)) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Password must have at least one lowercase letter (a-z)");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[0-9]/.test(password)) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Password must have at least one digit (0-9)");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }

                if (password.length < 8) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Password must be at least 8 characters long");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }

                if (password != confirm_password) {
                    $("#edit_login_account_password").attr("class", "form-control is-invalid");
                    $("#edit_login_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_edit_login_account_password").html("Passwords do not match");
                    $("#error_edit_login_account_password").attr("class", "text-danger");

                    error++;
                }
            }

            if (error > 0) {
                return false;
            } else {
                return true;
            }
        }

        function disable_developer_functions(enabled) {
            if (enabled) {
                $(document).on('contextmenu', function() {
                    return false;
                });

                $(document).on('keydown', function(event) {
                    if (event.ctrlKey && event.shiftKey) {
                        if (event.keyCode === 74) {
                            return false;
                        }

                        if (event.keyCode === 67) {
                            return false;
                        }

                        if (event.keyCode === 73) {
                            return false;
                        }
                    }

                    if (event.ctrlKey && event.keyCode === 85) {
                        return false;
                    }
                });
            }
        }

        function check_alert_message(alert) {
            if (alert.length != 0) {
                Swal.fire(
                    alert["title"],
                    alert["message"],
                    alert["type"]
                );
            }
        }

        async function update_notification_status(url, notification_id) {
            var formData = new FormData();

            formData.append('notification_id', notification_id);

            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });
        }

        async function update_notification_badge(url, student_primary_key) {
            var formData = new FormData();

            formData.append('student_primary_key', student_primary_key);

            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });
        }
    })
</script>

<?php $this->session->unset_userdata("alert") ?>

</body>

</html>