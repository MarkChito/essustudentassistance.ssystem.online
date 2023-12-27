<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta tags for SEO and social media sharing -->
    <meta name="description" content="Student Assistance Beneficiaries' System - Providing support and aid to students in need.">
    <meta name="keywords" content="student assistance, beneficiaries, support, education, financial aid">
    <meta name="author" content="Colegio de Montalban">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Protocol Tags for better social media sharing -->
    <meta property="og:title" content="Student Assistance Beneficiaries' System">
    <meta property="og:description" content="Providing support and aid to students in need.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= base_url() ?>dist/img/favicon.ico">
    <meta property="og:url" content="<?= base_url() ?>">

    <title><?= project_name() ?> | <?= $this->session->userdata("title") ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        body {
            background-image: url("dist/img/bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <!-- Login Box -->
    <div class="login-box">
        <div class="alert text-center d-none" role="alert" id="alert_notification"></div>
        <div class="card">
            <div style="background-color: #FFFFFF;" class="mt-3 text-center">
                <img src="dist/img/logo_alt.png" style="width: 50%;">
            </div>
            <div class="card-header text-center">
                <span class="h2"><?= project_name() ?></span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to proceed</p>
                <form action="server/login" method="post" id="login_form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="login_username" placeholder="Username" value="<?= $this->session->userdata("remember_me_username") ? $this->session->userdata("remember_me_username") : null ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="login_password" placeholder="Password" value="<?= $this->session->userdata("remember_me_password") ? $this->session->userdata("remember_me_password") : null ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="login_remember_me" name="login_remember_me" style="cursor: pointer;" <?= $this->session->userdata("remember_me") ? $this->session->userdata("remember_me") : null ?>>
                                <label for="login_remember_me" style="cursor: pointer;">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" name="login_account" class="btn btn-primary btn-block" id="btn_login">Sign In</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="javascript:void()" class="btn btn-block btn-success" id="btn_login_rfid" data-toggle="modal" data-target="#rfid_sign_in_modal">
                        <i class="fas fa-wifi mr-2"></i> Sign in using RFID Card
                    </a>
                </div>
                <p class="mb-0">
                    Don't have an Account? <a href="javascript:void()" class="text-center" data-toggle="modal" data-target="#register_modal">Register</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="register_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create an Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" method="post" id="register_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="register_rfid_number">RFID Number</label>
                                    <input type="text" class="form-control" id="register_rfid_number" name="register_rfid_number" placeholder="Enter RFID Number" required>
                                    <small class="text-danger d-none" id="error_register_rfid_number">RFID Number is already in use</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="register_student_number">Student Number</label>
                                    <input type="text" class="form-control" id="register_student_number" name="register_student_number" placeholder="Enter Student Number">
                                    <small class="text-danger d-none" id="error_register_student_number">Student Number is already in use</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_first_name">First Name</label>
                                    <input type="text" class="form-control" id="register_first_name" name="register_first_name" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_middle_name">Middle Name (Optional)</label>
                                    <input type="text" class="form-control" id="register_middle_name" name="register_middle_name" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="register_last_name" name="register_last_name" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="register_mobile_number">Mobile Number</label>
                                    <input type="number" class="form-control" id="register_mobile_number" name="register_mobile_number" placeholder="Enter Mobile Number" required>
                                    <small class="d-none" id="error_mobile_number"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="register_sex">Sex</label>
                                    <select name="register_sex" id="register_sex" class="custom-select" required>
                                        <option value="" selected disabled>-- Select Sex --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="register_address">Address</label>
                                    <textarea class="form-control" id="register_address" name="register_address" placeholder="Enter Address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_username">Username</label>
                                    <input type="text" class="form-control" id="register_username" name="register_username" placeholder="Enter Username" required>
                                    <small class="text-danger d-none" id="error_register_username">Username already exists</small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_password">Password</label>
                                    <input type="password" class="form-control" id="register_password" name="register_password" placeholder="Enter Password" required>
                                    <small class="d-none" id="error_password">Passwords do not match</small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="register_confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="register_confirm_password" name="register_confirm_password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign In RFID Modal -->
    <div class="modal fade" id="rfid_sign_in_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">RFID Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="server/rfid_login" method="post" id="rfid_login_form">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div id="scan_rfid_gif">
                                    <img src="dist/img/scan_rfid_gif.gif" alt="RFID Logo" class="w-100">
                                </div>
                                <div id="loading" class="d-none">
                                    <img src="dist/img/loading.gif" alt="RFID Logo" class="w-100">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group" id="rfid_input">
                                    <label for="register_rfid_number">Tap your RFID Card</label>
                                    <input type="text" class="form-control" name="rfid_login_rfid_number" id="rfid_login_rfid_number" placeholder="RFID Number" required>
                                </div>
                                <div class="text-center d-none" id="rfid_verify">
                                    <h5 class="text-muted">Verifying RFID NUmber . . .</h5>
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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Javascript -->
    <script>
        $(document).ready(function() {
            var base_url = "<?= base_url() ?>";
            var alert_message = <?= $this->session->userdata("alert") ? json_encode($this->session->userdata("alert")) : json_encode(array()) ?>;

            check_alert_message(alert_message);

            disable_developer_functions(false);

            $("#login_form").submit(function() {
                $("#btn_login").html("Processing...");
                $("#btn_login").attr("disabled", true);
            })

            $("#rfid_login_form").submit(function(e) {
                $("#scan_rfid_gif").addClass("d-none");
                $("#rfid_input").addClass("d-none");

                $("#loading").removeClass("d-none");
                $("#rfid_verify").removeClass("d-none");
            })

            $('#rfid_sign_in_modal').on('shown.bs.modal', function() {
                $('#rfid_login_rfid_number').val(null);
                $('#rfid_login_rfid_number').focus();
            })

            $("#register_form").submit(function(e) {
                $("#btn_register").html("Processing Request...");
                $("#btn_register").attr("disabled", true);

                var rfid_number = $("#register_rfid_number").val();
                var student_number = $("#register_student_number").val();
                var first_name = $("#register_first_name").val();
                var middle_name = $("#register_middle_name").val();
                var last_name = $("#register_last_name").val();
                var mobile_number = $("#register_mobile_number").val();
                var sex = $("#register_sex").val();
                var address = $("#register_address").val();
                var username = $("#register_username").val();
                var password = $("#register_password").val();
                var confirm_password = $("#register_confirm_password").val();

                var error = 0;

                mobile_number = mobile_number.replace(/[^\d]/g, '');

                var validPrefix = ['09'];
                var prefix = mobile_number.substr(0, 2);

                if (mobile_number.length !== 11) {
                    $("#register_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_mobile_number").html("Mobile Number must be 11 digits long");
                    $("#error_mobile_number").attr("class", "text-danger");

                    error++;
                }

                if (!validPrefix.includes(prefix)) {
                    $("#register_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_mobile_number").html("Mobile Number must start with '09'");
                    $("#error_mobile_number").attr("class", "text-danger");

                    error++;
                }

                if (!/[A-Z]/.test(password)) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Password must have at least one uppercase letter (A-Z)");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[a-z]/.test(password)) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Password must have at least one lowercase letter (a-z)");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[0-9]/.test(password)) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Password must have at least one digit (0-9)");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (password.length < 8) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Password must be at least 8 characters long");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (password != confirm_password) {
                    $("#register_password").attr("class", "form-control is-invalid");
                    $("#register_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_password").html("Passwords do not match");
                    $("#error_password").attr("class", "text-danger");

                    error++;
                }

                if (error == 0) {
                    $.ajax({
                        url: "server/register",
                        data: {
                            student_number: student_number,
                            rfid_number: rfid_number,
                            first_name: first_name,
                            middle_name: middle_name,
                            last_name: last_name,
                            mobile_number: mobile_number,
                            sex: sex,
                            address: address,
                            username: username,
                            password: password
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(response) {
                            console.log(response);

                            if (response[0] != "OK") {
                                $("#register_rfid_number").addClass("is-invalid");
                                $("#error_register_rfid_number").removeClass("d-none");

                                error++;
                            }

                            if (response[1] != "OK") {
                                $("#register_student_number").addClass("is-invalid");
                                $("#error_register_student_number").removeClass("d-none");

                                error++;
                            }

                            if (response[2] != "OK") {
                                $("#register_username").addClass("is-invalid");
                                $("#error_register_username").removeClass("d-none");

                                error++;
                            }

                            if (error == 0) {
                                location.href = base_url;
                            } else {
                                $("#btn_register").html("Register");
                                $("#btn_register").removeAttr("disabled");
                            }
                        }
                    });
                } else {
                    $("#btn_register").html("Register");
                    $("#btn_register").removeAttr("disabled");
                }
            })

            $("#register_password").on("keydown", function() {
                $("#register_password").attr("class", "form-control");
                $("#register_confirm_password").attr("class", "form-control");
                $("#error_password").attr("class", "d-none");
            })

            $("#register_confirm_password").on("keydown", function() {
                $("#register_password").attr("class", "form-control");
                $("#register_confirm_password").attr("class", "form-control");
                $("#error_password").attr("class", "d-none");
            })

            $("#register_mobile_number").on("keydown", function() {
                $("#register_mobile_number").attr("class", "form-control");
                $("#error_mobile_number").attr("class", "d-none");
            })

            $("#register_rfid_number").on("keydown", function(event) {
                $("#register_rfid_number").removeClass("is-invalid");
                $("#error_register_rfid_number").addClass("d-none");

                if (event.which === 13) {
                    event.preventDefault();
                }
            })

            $("#register_student_number").on("keydown", function() {
                $("#register_student_number").removeClass("is-invalid");
                $("#error_register_student_number").addClass("d-none");
            })

            $("#register_username").on("keydown", function() {
                $("#register_username").removeClass("is-invalid");
                $("#error_register_username").addClass("d-none");
            })

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
                    var alert_type = alert["type"] != "error" ? alert["type"] : "danger";

                    $("#alert_notification").addClass("alert-" + alert_type);
                    $("#alert_notification").removeClass("d-none");
                    $("#alert_notification").html(alert["message"]);
                } else {
                    $("#alert_notification").addClass("d-none");
                }
            }
        })
    </script>

    <?php $this->session->unset_userdata("alert") ?>
</body>

</html>