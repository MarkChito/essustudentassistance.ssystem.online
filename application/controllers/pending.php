<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pending extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            if ($this->session->userdata("user_type") == "super admin" || $this->session->userdata("user_type") == "admin") {
                $this->session->set_userdata("title", "Pending Applications");
                
                if ($this->input->get("category") == md5("Educational"))
                {
                    $this->session->set_userdata("current_tab", "pending_educational");

                    $data["category"] = "Educational";
                }
                
                if ($this->input->get("category") == md5("Scholarship"))
                {
                    $this->session->set_userdata("current_tab", "pending_scholarship");

                    $data["category"] = "Scholarship";
                }

                $this->load->view('templates/header.php');
                $this->load->view('pages/pending_view.php', $data);
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
