<?php
$useraccount_data = $this->model->MOD_GET_USERACCOUNT_DATA($this->session->userdata("primary_key"));

if ($useraccount_data) {
    $useraccount = $useraccount_data[0];

    $useraccount_session_data = array(
        "rfid_number" => $useraccount->rfid_number,
        "name" => $useraccount->name,
        "username" => $useraccount->username,
        "password" => $useraccount->password,
        "user_type" => $useraccount->user_type,
        "user_image" => "default_user.png"
    );

    $this->session->set_userdata($useraccount_session_data);
}

if ($this->session->userdata("user_type") == "student") {
    $student_data = $this->model->MOD_GET_STUDENT_DATA($this->session->userdata("primary_key"));

    if ($student_data) {
        $student = $student_data[0];

        $student_session_data = array(
            "student_primary_key" => $student->primary_key,
            "student_number" => $student->student_number,
            "first_name" => $student->first_name,
            "middle_name" => $student->middle_name,
            "last_name" => $student->last_name,
            "sex" => $student->sex,
            "mobile_number" => $student->mobile_number,
            "address" => $student->address,
            "school_name" => $student->school_name,
            "school_address" => $student->school_address,
            "father_name" => $student->father_name,
            "father_occupation" => $student->father_occupation,
            "mother_name" => $student->mother_name,
            "mother_occupation" => $student->mother_occupation,
            "indigency_image" => $student->indigency_image,
            "psa_image" => $student->psa_image,
            "report_card_image" => $student->report_card_image,
            "tor_image" => $student->tor_image,
            "user_image" => $student->user_image == "" ? "default_user.png" : $student->user_image,
            "coe_image" => $student->coe_image,
            "valid_id_image_front" => $student->valid_id_image_front,
            "valid_id_image_back" => $student->valid_id_image_back
        );

        $this->session->set_userdata($student_session_data);
    }
}

$education_available = $this->model->MOD_CHECK_CATEGORY("Educational");
$scholarship_available = $this->model->MOD_CHECK_CATEGORY("Scholarship");

if ($education_available) {
    $education_slot_available = $this->model->MOD_CHECK_SLOT("Educational");

    if (!$education_slot_available) {
        $this->model->MOD_ADD_SLOT("Educational", 0);
    }
} else {
    $this->model->MOD_DELETE_SLOT("Educational");
}

if ($scholarship_available) {
    $scholarship_slot_available = $this->model->MOD_CHECK_SLOT("Scholarship");

    if (!$scholarship_slot_available) {
        $this->model->MOD_ADD_SLOT("Scholarship", 0);
    }
} else {
    $this->model->MOD_DELETE_SLOT("Scholarship");
}

$application_data = $this->model->MOD_APPLICATION_DATA($this->session->userdata("primary_key"));

if ($application_data) {
    foreach ($application_data as $application) {
        $this->session->set_userdata("application_id", md5($application->primary_key));
        $this->session->set_userdata("progress", $application->progress);
        $this->session->set_userdata("status", $application->status);
    }
}

$notification_count = 0;
$notification_count_read = 0;

$result_notification_count = $this->model->MOD_GET_NOTIFICATION_COUNT($this->session->userdata("primary_key"));

if ($result_notification_count) {
    $notification_count_read = $result_notification_count[0]->unread_notifications;
}

$result_notification_badge = $this->model->MOD_GET_NOTIFICATION_BADGE($this->session->userdata("primary_key"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta tags for SEO and social media sharing -->
    <meta name="description" content="Student Assistance Beneficiaries System - Providing support and aid to students in need.">
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
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="dist/css/custom_styles.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Pre-Loader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="logo" height="60" width="60">
        <p class="mt-3">CDM Student Assistance</p>
    </div>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="btn_pushmenu"><i class="fas fa-bars"></i></a>
                </li>
                <?php if ($this->session->userdata("user_type") == "student" && $this->session->userdata("current_tab") != "notifications") : ?>
                    <li class="nav-item dropdown" id="notification_menu" student_primary_key="<?= $this->session->userdata("primary_key") ?>">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <?php if (intval($notification_count_read) > 0 && $result_notification_badge) : ?>
                                <span class="badge badge-danger navbar-badge" id="notification_badge"><?= $notification_count_read ?></span>
                            <?php endif ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg">
                            <?php $result_notifications = $this->model->MOD_GET_NOTIFICATIONS_DATA($this->session->userdata("primary_key")); ?>
                            <?php foreach ($result_notifications as $notification) : ?>
                                <?php
                                $unread = "text-muted";

                                if ($notification->status == "unread") {
                                    $unread = "text-bold";
                                }

                                $date_and_time = $notification->date . " - " . $notification->time;

                                $message = $notification->message;

                                if (strlen($message) > 27) {
                                    $message = substr($message, 0, 25) . " ...";
                                }

                                $result_admin = $this->model->MOD_GET_USERACCOUNT_DATA($notification->admin_primary_key);

                                ?>
                                <?php if ($notification_count < 5) : ?>
                                    <a href="javascript:void(0)" class="dropdown-item notifications" data-toggle="modal" data-target="#view_notification" notification_id="<?= $notification->primary_key ?>" notification_message="<?= $notification->message ?>" notification_date_and_time="<?= $date_and_time ?>" notification_time="<?= $notification->time ?>" notification_admin="<?= $result_admin[0]->name ?>">
                                        <div class="media">
                                            <img src="dist/img/user_upload/default_user.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title <?= $unread ?>"><?= $result_admin[0]->name ?></h3>
                                                <p class="text-sm <?= $unread ?>"><?= $message ?></p>
                                                <small class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $date_and_time ?></small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <?php endif ?>

                                <?php $notification_count++ ?>
                            <?php endforeach ?>

                            <?php if ($notification_count == 0) : ?>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="pt-3 pb-3 text-center text-muted">No Notifications Yet</p>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                            <?php endif ?>

                            <a href="notifications" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="dist/img/user_upload/<?= $this->session->userdata("user_image") ?>" class="rounded-circle img-bordered-sm" style="width: 32px; height: 32px" alt="">
                        &nbsp;<?= $this->session->userdata("name") ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item btn_edit_login_account" href="javascript:void(0)" data-toggle="modal" data-target="#edit_login_account"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;Account</a>
                        <?php if ($this->session->userdata("user_type") == "student") : ?>
                            <a class="dropdown-item" id="btn_edit_profile" href="profile"><i class="fas fa-user-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Profile</a>
                        <?php endif ?>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#about_the_developers_modal"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;Developers</a>
                        <?php if ($this->session->userdata("user_type") == "super admin") : ?>
                            <a class="dropdown-item disabled" href="#" data-toggle="modal" data-target="#settings"><i class="fas fa-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp;Settings&nbsp; <span class="badge badge-danger">Soon</span></a>
                        <?php endif ?>
                        <a class="dropdown-item btn_logout" href="#"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="w-100 text-center pt-4 py-3">
                <img src="dist/img/logo.png" style="height: auto; width: 200px !important; padding-top: 10px" id="favicon">
            </div>
            <hr class="bg-light">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard Tab -->
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link <?= $this->session->userdata("current_tab") == "dashboard" ? "active" : null ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                                <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                            </a>
                        </li>
                        <!-- Administrator Tabs -->
                        <?php if ($this->session->userdata("user_type") == "admin" || $this->session->userdata("user_type") == "super admin") : ?>
                            <!-- Scan QR Code Tab -->
                            <li class="nav-item">
                                <a href="<?= base_url() ?>scan_qr_code" class="nav-link <?= $this->session->userdata("current_tab") == "scan_qr_code" ? "active" : null ?>">
                                    <i class="nav-icon fas fa-qrcode"></i>
                                    <p>Scan QR Code</p>
                                    <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                </a>
                            </li>
                            <?php if ($this->session->userdata("user_type") == "super admin") : ?>
                                <!-- Manage Admins Tab -->
                                <li class="nav-item">
                                    <a href="manage_admins" class="nav-link <?= $this->session->userdata("current_tab") == "manage_admins" ? "active" : null ?>">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Administrators</p>
                                        <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                    </a>
                                </li>
                                <!-- Manage Students Tab -->
                                <li class="nav-item">
                                    <a href="manage_students" class="nav-link <?= $this->session->userdata("current_tab") == "manage_students" ? "active" : null ?>">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>Students</p>
                                        <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                    </a>
                                </li>
                            <?php endif ?>
                            <!-- Manage Educational Assistance Tab -->
                            <li class="nav-item <?= $this->session->userdata("current_tab") == "pending_educational" || $this->session->userdata("current_tab") == "approved_educational" || $this->session->userdata("current_tab") == "rejected_educational" ? "menu-open" : null ?>">
                                <a href="#" class="nav-link <?= $this->session->userdata("current_tab") == "pending_educational" || $this->session->userdata("current_tab") == "approved_educational" || $this->session->userdata("current_tab") == "rejected_educational" ? "active" : null ?>">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Educational
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- Pending -->
                                    <li class="nav-item">
                                        <a href="pending?category=<?php echo md5("Educational") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "pending_educational" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pending</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                    <!-- Approved -->
                                    <li class="nav-item">
                                        <a href="approved?category=<?php echo md5("Educational") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "approved_educational" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Approved</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                    <!-- Rejected -->
                                    <li class="nav-item">
                                        <a href="rejected?category=<?php echo md5("Educational") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "rejected_educational" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rejected</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Manage Scholarhip Assistance Tab -->
                            <li class="nav-item <?= $this->session->userdata("current_tab") == "pending_scholarship" || $this->session->userdata("current_tab") == "approved_scholarship" || $this->session->userdata("current_tab") == "rejected_scholarship" ? "menu-open" : null ?>">
                                <a href="#" class="nav-link  <?= $this->session->userdata("current_tab") == "pending_scholarship" || $this->session->userdata("current_tab") == "approved_scholarship" || $this->session->userdata("current_tab") == "rejected_scholarship" ? "active" : null ?>">
                                    <i class="nav-icon fas fa-award"></i>
                                    <p>
                                        Scholarship
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- Pending -->
                                    <li class="nav-item">
                                        <a href="pending?category=<?php echo md5("Scholarship") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "pending_scholarship" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pending</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                    <!-- Approved -->
                                    <li class="nav-item">
                                        <a href="approved?category=<?php echo md5("Scholarship") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "approved_scholarship" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Approved</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                    <!-- Rejected -->
                                    <li class="nav-item">
                                        <a href="rejected?category=<?php echo md5("Scholarship") ?>" class="nav-link <?= $this->session->userdata("current_tab") == "rejected_scholarship" ? "active" : null ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rejected</p>
                                            <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php if ($this->session->userdata("user_type") == "super admin") : ?>
                                <!-- Manage Organizations Tab -->
                                <li class="nav-item <?= $this->session->userdata("current_tab") == "manage_procedures" || $this->session->userdata("current_tab") == "manage_requirements" || $this->session->userdata("current_tab") == "manage_slots" ? "menu-open" : null ?>">
                                    <a href="#" class="nav-link <?= $this->session->userdata("current_tab") == "manage_procedures" || $this->session->userdata("current_tab") == "manage_requirements" || $this->session->userdata("current_tab") == "manage_slots" ? "active" : null ?>">
                                        <i class="nav-icon fa fa-sitemap"></i>
                                        <p>
                                            Organization
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <!-- Procedures -->
                                        <li class="nav-item">
                                            <a href="manage_procedures" class="nav-link <?= $this->session->userdata("current_tab") == "manage_procedures" ? "active" : null ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Procedures</p>
                                                <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                            </a>
                                        </li>
                                        <!-- Requirements -->
                                        <li class="nav-item">
                                            <a href="manage_requirements" class="nav-link <?= $this->session->userdata("current_tab") == "manage_requirements" ? "active" : null ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Requirements</p>
                                                <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                            </a>
                                        </li>
                                        <!-- Slots -->
                                        <li class="nav-item">
                                            <a href="manage_slots" class="nav-link <?= $this->session->userdata("current_tab") == "manage_slots" ? "active" : null ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Slots</p>
                                                <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif ?>
                        <?php endif ?>
                        <!-- Student Tabs -->
                        <?php if ($this->session->userdata("user_type") == "student") : ?>
                            <!-- Transactions Tab -->
                            <li class="nav-item">
                                <a href="transactions" class="nav-link <?= $this->session->userdata("current_tab") == "transactions" ? "active" : null ?>">
                                    <i class="nav-icon fas fa-exchange-alt"></i>
                                    <p>Transactions</p>
                                    <div class="spinner-border spinner-border-sm text-success float-right d-none tab_spinner" role="status"></div>
                                </a>
                            </li>
                        <?php endif ?>
                        <!-- Logout Tab -->
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link btn_logout">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-8">
                            <h1><?= $this->session->userdata("title") ?></h1>
                        </div>
                        <?php if ($this->session->userdata("current_tab") == "manage_admins" || $this->session->userdata("current_tab") == "manage_procedures" || $this->session->userdata("current_tab") == "manage_requirements" || $this->session->userdata("current_tab") == "scan_qr_code")  : ?>
                            <div class="col-4">
                                <?php if ($this->session->userdata("current_tab") == "manage_admins") : ?>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add_admin"><i class="fas fa-plus"></i>&nbsp; New Administrator</button>
                                <?php endif ?>
                                <?php if ($this->session->userdata("current_tab") == "manage_procedures") : ?>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add_procedure"><i class="fas fa-plus"></i>&nbsp; New Procedure</button>
                                <?php endif ?>
                                <?php if ($this->session->userdata("current_tab") == "manage_requirements") : ?>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add_requirement"><i class="fas fa-plus"></i>&nbsp; New Requirement</button>
                                <?php endif ?>
                                <?php if ($this->session->userdata("current_tab") == "scan_qr_code") : ?>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#scan_qr_code" id="btn_scan_qr_code"><i class="fas fa-qrcode"></i>&nbsp; Scan QR Code</button>
                                <?php endif ?>
                            </div>
                        <?php else : ?>
                            <div class="col-4">
                                <ol class="breadcrumb float-sm-right">
                                    <?php if ($this->session->userdata("current_tab") != "dashboard") : ?>
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><?= $this->session->userdata("title") ?></li>
                                    <?php endif ?>
                                </ol>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>