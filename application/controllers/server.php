<?php
defined('BASEPATH') or exit('No direct script access allowed');

class server extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function login()
    {
        $username = $this->input->post("login_username");
        $password = $this->input->post("login_password");
        $remember_me = $this->input->post("login_remember_me") ? "checked" : null;

        $current_tab = $this->session->userdata("current_tab");

        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($username_exists) {
            foreach ($username_exists as $result) {
                $db_primary_key = $result->primary_key;
                $db_password = $result->password;
            }

            if (password_verify($password, $db_password)) {
                $this->session->set_userdata("primary_key", $db_primary_key);

                if ($remember_me) {
                    $this->session->set_userdata("remember_me_username", $username);
                    $this->session->set_userdata("remember_me_password", $password);
                    $this->session->set_userdata("remember_me", $remember_me);
                } else {
                    $this->session->unset_userdata("remember_me_username");
                    $this->session->unset_userdata("remember_me_password");
                    $this->session->unset_userdata("remember_me");
                }

                $this->session->set_userdata("alert", array(
                    "title" => "Success!",
                    "message" => "You've successfully logged in",
                    "type" => "success"
                ));
            } else {
                $this->session->set_userdata("alert", array(
                    "title" => "Opps...",
                    "message" => "Invalid Username or Password",
                    "type" => "error"
                ));
            }
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Opps...",
                "message" => "Invalid Username or Password",
                "type" => "error"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function rfid_login()
    {
        $rfid_number = $this->input->post("rfid_login_rfid_number");

        $current_tab = $this->session->userdata("current_tab");

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);

        if ($rfid_exists) {
            foreach ($rfid_exists as $result) {
                $this->session->set_userdata("primary_key", $result->primary_key);
            }

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "You've successfully logged in",
                "type" => "success"
            ));
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Opps...",
                "message" => "Invalid RFID Card",
                "type" => "error"
            ));
        }

        redirect(base_url() . $current_tab);
    }

    public function register()
    {
        $rfid_number = $this->input->post("rfid_number");
        $student_number = $this->input->post("student_number");
        $first_name = $this->input->post("first_name");
        $middle_name = $this->input->post("middle_name");
        $last_name = $this->input->post("last_name");
        $mobile_number = $this->input->post("mobile_number");
        $sex = $this->input->post("sex");
        $address = $this->input->post("address");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $name = $first_name . " " . $last_name;

        if ($middle_name) {
            $name = $first_name . " " . $middle_name[0] . ". " . $last_name;
        }

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $student_number_exists = $this->model->MOD_CHECK_STUDENT_NUMBER($student_number);
        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($rfid_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($student_number_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($username_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            $this->model->MOD_ADD_USERACCOUNT($rfid_number, $name, $username, password_hash($password, PASSWORD_BCRYPT), "student");

            $username_exists = $this->model->MOD_CHECK_USERNAME($username);

            if ($username_exists) {
                foreach ($username_exists as $username) {
                    $login_primary_key = $username->primary_key;
                }
            }

            $this->model->MOD_ADD_STUDENT($login_primary_key, $student_number, $first_name, $middle_name, $last_name, $sex, $mobile_number, $address);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Successfully created your account",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function edit_login_account()
    {
        $name = $this->input->post("name");
        $rfid_number = $this->input->post("rfid_number");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $primary_key = $this->input->post("primary_key");
        $old_rfid_number = $this->input->post("old_rfid_number");
        $old_username = $this->input->post("old_username");
        $old_password = $this->input->post("old_password");

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($rfid_exists && $rfid_number != $old_rfid_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($username_exists && $username != $old_username) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            if ($password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
            } else {
                $password = $old_password;
            }

            $this->model->MOD_UPDATE_USERACCOUNT($name, $rfid_number, $username, $password, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Successfully updated your account",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function edit_personal_information()
    {
        $first_name = $this->input->post("first_name");
        $middle_name = $this->input->post("middle_name");
        $last_name = $this->input->post("last_name");
        $student_number = $this->input->post("student_number");
        $rfid_number = $this->input->post("rfid_number");
        $sex = $this->input->post("sex");
        $user_image = isset($_FILES["user_image"]) ? $_FILES["user_image"] : null;

        $login_primary_key = $this->input->post("login_primary_key");
        $student_primary_key = $this->input->post("student_primary_key");
        $old_student_number = $this->input->post("old_student_number");
        $old_rfid_number = $this->input->post("old_rfid_number");
        $old_user_image = $this->input->post("old_user_image");

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $student_number_exists = $this->model->MOD_CHECK_STUDENT_NUMBER($student_number);

        if ($rfid_exists && $rfid_number != $old_rfid_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($student_number_exists && $student_number != $old_student_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            if ($user_image) {
                $user_image = $this->file_upload("user_image");
            } else {
                $user_image = $old_user_image;
            }

            $name = $first_name . " " . $last_name;

            if ($middle_name) {
                $name = $first_name . " " . $middle_name[0] . ". " . $last_name;
            }

            $this->model->MOD_UPDATE_PERSONAL_INFORMATION($first_name, $middle_name, $last_name, $student_number, $sex, $user_image, $student_primary_key);
            $this->model->MOD_UPDATE_USERACCOUNT_NAME($name, $rfid_number, $login_primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Successfully updated your account",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function check_application_id()
    {
        $application_id = $this->input->post("application_id");

        $response = array();

        $applications = $this->model->MOD_CHECK_APPLICATIONS();

        if ($applications) {
            foreach ($applications as $application_data) {
                $db_application_id = md5($application_data->primary_key);

                if ($db_application_id == $application_id) {
                    $student_primary_key = $application_data->student_primary_key;
                    $status = $application_data->status;

                    if ($status != "Approved") {
                        if ($status == "Received") {
                            $response = array(
                                "status" => "NOT OK",
                                "content" => "This Application ID has already received cash"
                            );
                        } elseif ($status == "Pending" || $status == "Rejected") {
                            $response = array(
                                "status" => "NOT OK",
                                "content" => "This Application ID has not been approved"
                            );
                        }
                    } else {
                        $student_data = $this->model->MOD_GET_STUDENT_DATA($student_primary_key);
                        $login_data = $this->model->MOD_GET_USERACCOUNT_DATA($student_primary_key);

                        $response = array(
                            "status" => "OK",
                            "content" => $student_data,
                            "rfid_number" => $login_data[0]->rfid_number
                        );
                    }
                } else {
                    $response = array(
                        "status" => "NOT OK",
                        "content" => "This Application ID doesn't exists"
                    );
                }
            }
        }

        echo json_encode($response);
    }

    public function update_application_status()
    {
        $primary_key = $this->input->post("primary_key");

        $this->model->MOD_UPDATE_APPLICATION_STATUS($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully released the money.",
            "type" => "success"
        ));

        echo json_encode("OK");
    }

    public function edit_contact_information()
    {
        $mobile_number = $this->input->post("mobile_number");
        $address = $this->input->post("address");
        $school_name = $this->input->post("school_name");
        $school_address = $this->input->post("school_address");
        $father_name = $this->input->post("father_name");
        $father_occupation = $this->input->post("father_occupation");
        $mother_name = $this->input->post("mother_name");
        $mother_occupation = $this->input->post("mother_occupation");
        $student_primary_key = $this->input->post("student_primary_key");

        $this->model->MOD_UPDATE_CONTACT_INFORMATION($mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $student_primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully updated your account",
            "type" => "success"
        ));

        echo json_encode("OK");
    }

    public function add_admin()
    {
        $name = $this->input->post("name");
        $rfid_number = $this->input->post("rfid_number");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($rfid_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($username_exists) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            $this->model->MOD_ADD_USERACCOUNT($rfid_number, $name, $username, password_hash($password, PASSWORD_BCRYPT), "admin");

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Successfully created an administrator account",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function edit_admin()
    {
        $name = $this->input->post("name");
        $rfid_number = $this->input->post("rfid_number");
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $primary_key = $this->input->post("primary_key");
        $old_rfid_number = $this->input->post("old_rfid_number");
        $old_username = $this->input->post("old_username");
        $old_password = $this->input->post("old_password");

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $username_exists = $this->model->MOD_CHECK_USERNAME($username);

        if ($rfid_exists && $rfid_number != $old_rfid_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($username_exists && $username != $old_username) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            if ($password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
            } else {
                $password = $old_password;
            }

            $this->model->MOD_UPDATE_USERACCOUNT($name, $rfid_number, $username, $password, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Success!",
                "message" => "Successfully created an administrator account",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function delete_admin()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_ADMIN($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully deleted an administrator account",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function delete_student()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_STUDENT($primary_key);
        $this->model->MOD_DELETE_STUDENT_ACCOUNT($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully deleted an student account",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function add_procedure()
    {
        $category = $this->input->post("add_procedure_category");
        $description = $this->input->post("add_procedure_description");

        $this->model->MOD_ADD_PROCEDURE($category, $description);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully added a procedure",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function edit_procedure()
    {
        $category = $this->input->post("edit_procedure_category");
        $description = $this->input->post("edit_procedure_description");
        $primary_key = $this->input->post("edit_procedure_primary_key");

        $this->model->MOD_UPDATE_PROCEDURE($category, $description, $primary_key);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully updated a procedure",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function delete_procedure()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_PROCEDURE($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully deleted a procedure",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function add_requirement()
    {
        $category = $this->input->post("add_requirement_category");
        $description = $this->input->post("add_requirement_description");

        $this->model->MOD_ADD_REQUIREMENT($category, $description);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully added a requirement",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function edit_requirement()
    {
        $category = $this->input->post("edit_requirement_category");
        $description = $this->input->post("edit_requirement_description");
        $primary_key = $this->input->post("edit_requirement_primary_key");

        $this->model->MOD_UPDATE_REQUIREMENT($category, $description, $primary_key);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully updated a procedure",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function delete_requirement()
    {
        $primary_key = $this->input->get("primary_key");

        $current_tab = $this->session->userdata("current_tab");

        $this->model->MOD_DELETE_REQUIREMENT($primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Successfully deleted a requirement",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function edit_slot()
    {
        $primary_key = $this->input->post("edit_slot_primary_key");
        $slot = $this->input->post("edit_slot_slot");

        $this->model->MOD_UPDATE_SLOT($slot, $primary_key);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've successfully updated a slot",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function accept_terms_and_conditions()
    {
        $date_now = date("F d, Y");
        $time_now = date("h:i A");

        $category = $this->input->post("assistance_type");
        $student_primary_key = $this->input->post("accept_user_id");
        $progress = "Step 1";
        $status = "none";

        $current_tab = $this->session->userdata("current_tab");

        $result_application = $this->model->MOD_APPLICATION_DATA($student_primary_key);

        if ($result_application) {
            $this->model->MOD_UPDATE_APPLICATION($date_now, $time_now, $progress, $status, $student_primary_key);
        } else {
            $this->model->MOD_ADD_APPLICATION($student_primary_key, $category, $progress, $status);
        }

        $event = "Applied for " . $category . " Assistance. Accepted Terms and Conditions. Proceeding to Step 1.";

        $this->model->MOD_ADD_TRANSACTION($student_primary_key, $date_now, $time_now, $event);

        $this->session->set_userdata("alert", array(
            "title" => "Congratulations!",
            "message" => "You can now proceed to Step 1",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function step_1()
    {
        $student_number = $this->input->post("student_number");
        $rfid_number = $this->input->post("rfid_number");
        $first_name = $this->input->post("first_name");
        $middle_name = $this->input->post("middle_name");
        $last_name = $this->input->post("last_name");
        $sex = $this->input->post("sex");
        $mobile_number = $this->input->post("mobile_number");
        $address = $this->input->post("address");
        $school_name = $this->input->post("school_name");
        $school_address = $this->input->post("school_address");
        $father_name = $this->input->post("father_name");
        $father_occupation = $this->input->post("father_occupation");
        $mother_name = $this->input->post("mother_name");
        $mother_occupation = $this->input->post("mother_occupation");
        $old_student_number = $this->input->post("old_student_number");
        $old_rfid_number = $this->input->post("old_rfid_number");

        $primary_key = $this->input->post("primary_key");

        $error = 0;

        $check_list = array();

        $rfid_exists = $this->model->MOD_CHECK_RFID_NUMBER($rfid_number);
        $student_number_exists = $this->model->MOD_CHECK_STUDENT_NUMBER($student_number);

        if ($rfid_exists && $rfid_number != $old_rfid_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($student_number_exists && $student_number != $old_student_number) {
            array_push($check_list, "NOT OK");

            $error++;
        } else {
            array_push($check_list, "OK");
        }

        if ($error == 0) {
            $name = $first_name . " " . $last_name;

            if ($middle_name) {
                $name = $first_name . " " . $middle_name[0] . ". " . $last_name;
            }

            $this->model->MOD_UPDATE_PERSONAL_INFORMATION_STEP_1($first_name, $middle_name, $last_name, $student_number, $sex, $mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $primary_key);
            $this->model->MOD_UPDATE_USERACCOUNT_NAME($name, $rfid_number, $primary_key);

            $date_now = date("F d, Y");
            $time_now = date("h:i A");
            $event = "Personal and Contact Details were verified and submitted. Proceeding to Step 2.";

            $this->model->MOD_ADD_TRANSACTION($primary_key, $date_now, $time_now, $event);

            $progress = "Step 2";
            $status = "none";

            $this->model->MOD_UPDATE_APPLICATION($date_now, $time_now, $progress, $status, $primary_key);

            $this->session->set_userdata("alert", array(
                "title" => "Congratulations!",
                "message" => "You can now proceed to Step 2",
                "type" => "success"
            ));
        }

        echo json_encode($check_list);
    }

    public function step_2()
    {
        $student_primary_key = $this->input->post("step_2_primary_key");

        $user_image = $this->file_upload("step_2_user_image");
        $indigency_image = $this->file_upload("step_2_indigency_image");
        $coe_image = $this->file_upload("step_2_coe_image");
        $psa_image = $this->file_upload("step_2_psa_image");
        $valid_id_image_front = $this->file_upload("step_2_valid_id_image_front");
        $valid_id_image_back = $this->file_upload("step_2_valid_id_image_back");
        $tor_image = $this->file_upload("step_2_tor_image");
        $report_card_image = $this->file_upload("step_2_report_card_image");

        if ($user_image) {
            $this->model->MOD_UPDATE_USER_IMAGE($user_image, $student_primary_key);
        }

        if ($indigency_image) {
            $this->model->MOD_UPDATE_INDIGENCY_IMAGE($indigency_image, $student_primary_key);
        }

        if ($coe_image) {
            $this->model->MOD_UPDATE_COE_IMAGE($coe_image, $student_primary_key);
        }

        if ($psa_image) {
            $this->model->MOD_UPDATE_PSA_IMAGE($psa_image, $student_primary_key);
        }

        if ($valid_id_image_front) {
            $this->model->MOD_UPDATE_VALID_ID_IMAGE_FRONT($valid_id_image_front, $student_primary_key);
        }

        if ($valid_id_image_back) {
            $this->model->MOD_UPDATE_VALID_ID_IMAGE_BACK($valid_id_image_back, $student_primary_key);
        }

        if ($tor_image) {
            $this->model->MOD_UPDATE_TOR_IMAGE($tor_image, $student_primary_key);
        }

        if ($report_card_image) {
            $this->model->MOD_UPDATE_REPORT_CARD_IMAGE($report_card_image, $student_primary_key);
        }

        $current_tab = $this->session->userdata("current_tab");

        $date_now = date("F d, Y");
        $time_now = date("h:i A");
        $event = "Necessary documents has been uploaded. Waiting for further notifications.";

        $this->model->MOD_ADD_TRANSACTION($student_primary_key, $date_now, $time_now, $event);

        $progress = "Completed";
        $status = "Pending";

        $this->model->MOD_UPDATE_APPLICATION($date_now, $time_now, $progress, $status, $student_primary_key);

        $this->session->set_userdata("alert", array(
            "title" => "Congratulations!",
            "message" => "Application process has been completed, wait for further notifications",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function set_status()
    {
        $date_now = date("F d, Y");
        $time_now = date("h:i A");

        $student_id = $this->input->post("set_status_student_id");
        $admin_id = $this->input->post("set_status_admin_id");
        $status = $this->input->post("set_status_status");
        $message = $this->input->post("set_status_message");

        $category = $this->input->post("set_status_category");
        $admin_name = $this->input->post("set_status_admin_name");

        $notification_status = "unread";
        $event = "";

        $this->model->MOD_ADD_NOTIFICATION($student_id, $admin_id, $date_now, $time_now, $message, $notification_status);

        $result_notification_badge = $this->model->MOD_GET_NOTIFICATION_BADGE($student_id);

        if ($result_notification_badge) {
            $this->model->MOD_UPDATE_NOTIFICATION_BADGE("unclicked", $student_id);
        } else {
            $this->model->MOD_ADD_NOTIFICATION_BADGE("unclicked", $student_id);
        }

        if ($status == "Approved" || $status == "Rejected") {
            $progress = "Completed";

            $this->model->MOD_UPDATE_APPLICATION_ADMIN($date_now, $time_now, $admin_id, $progress, $status, $student_id);

            if ($status == "Approved") {
                if ($category == md5("Educational")) {
                    $plain_category = "Educational";
                } else {
                    $plain_category = "Scholarship";
                }

                $slot_result = $this->model->MOD_SPECIFIC_SLOTS_DATA($plain_category);

                if ($slot_result) {
                    foreach ($slot_result as $slot) {
                        $available_slots = intval($slot->slot) - 1;
                    }
                }

                $this->model->MOD_UPDATE_SLOT_CATEGORY($available_slots, $plain_category);

                $event = "Application has been approved by Admin " . $admin_name . ".";
            } else {
                $event = "Application has been rejected by Admin " . $admin_name . ".";
            }
        } else {
            $this->model->MOD_UPDATE_APPLICATION($date_now, $time_now, $status, "None", $student_id);

            $event = "Admin " . $admin_name . " has reverted this application back to " . $status . " for further review of certain details.";
        }

        $this->model->MOD_ADD_TRANSACTION($student_id, $date_now, $time_now, $event);

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Student's status is updated",
            "type" => "success"
        ));

        redirect("pending?category=" . $category);
    }

    public function reset_status()
    {
        $date_now = date("F d, Y");
        $time_now = date("h:i A");

        $student_id = $this->input->post("reset_status_student_id");
        $admin_id = $this->input->post("reset_status_admin_id");
        $status = "Step 0";
        $message = $this->input->post("reset_status_message");

        $category = $this->input->post("reset_status_category");
        $admin_name = $this->input->post("reset_status_admin_name");

        $notification_status = "unread";
        $event = "";

        $this->model->MOD_ADD_NOTIFICATION($student_id, $admin_id, $date_now, $time_now, $message, $notification_status);

        $result_notification_badge = $this->model->MOD_GET_NOTIFICATION_BADGE($student_id);

        if ($result_notification_badge) {
            $this->model->MOD_UPDATE_NOTIFICATION_BADGE("unclicked", $student_id);
        } else {
            $this->model->MOD_ADD_NOTIFICATION_BADGE("unclicked", $student_id);
        }

        $this->model->MOD_UPDATE_APPLICATION($date_now, $time_now, $status, "None", $student_id);

        $event = "Admin " . $admin_name . " has reset this application.";

        $this->model->MOD_ADD_TRANSACTION($student_id, $date_now, $time_now, $event);

        $current_tab = $this->session->userdata("current_tab");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "Student's status is updated",
            "type" => "success"
        ));

        redirect(base_url() . $current_tab);
    }

    public function update_notification_status()
    {
        $primary_key = $this->input->post("notification_id");

        $this->model->MOD_UPDATE_NOTIFICATION_STATUS($primary_key);
    }

    public function update_notification_badge()
    {
        $student_primary_key = $this->input->post("student_primary_key");

        $this->model->MOD_UPDATE_NOTIFICATION_BADGE("clicked", $student_primary_key);
    }

    public function logout()
    {
        $this->session->unset_userdata("primary_key");

        $this->session->set_userdata("alert", array(
            "title" => "Success!",
            "message" => "You've been successfully signed out",
            "type" => "success"
        ));

        header("Location: " . base_url());
    }

    private function file_upload($filename)
    {
        $originalFilename = $_FILES[$filename]['name'];
        $temporaryFilePath = $_FILES[$filename]['tmp_name'];

        // Check for allowed file types (you can customize this based on your requirements)
        $allowedFileTypes = array('jpg', 'jpeg', 'png');
        $fileExtension = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedFileTypes)) {
            return false;
        } else {
            // Generate a unique filename to avoid conflicts
            $targetDirectory = "dist/img/user_upload/";
            $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $uniqueId = uniqid();
            $uniqueFilename = $uniqueId . '_' . time() . '.' . $fileExtension;

            while (file_exists($targetDirectory . '/' . $uniqueFilename)) {
                $uniqueId = uniqid();
                $uniqueFilename = $uniqueId . '_' . time() . '.' . $fileExtension;
            }

            if (move_uploaded_file($temporaryFilePath, "dist/img/user_upload/" . $uniqueFilename)) {
                return $uniqueFilename;
            } else {
                return false;
            }
        }
    }
}
