<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifications extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            if ($this->session->userdata("user_type") == "student") {
                $this->session->set_userdata("title", "Notifications");
                $this->session->set_userdata("current_tab", "notifications");

                $this->load->view('templates/header.php');
                $this->load->view('pages/notifications_view.php');
                $this->load->view('templates/footer.php');
            } else {
                http_response_code(403);
                exit();
            }
        } else {
            $this->session->set_userdata("alert", array(
                "title" => "Opps...",
                "message" => "You must login first",
                "type" => "error"
            ));

            redirect(base_url() . "login");
        }
    }
}
