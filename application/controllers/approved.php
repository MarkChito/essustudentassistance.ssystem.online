<?php
defined('BASEPATH') or exit('No direct script access allowed');

class approved extends CI_Controller
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
                $this->session->set_userdata("title", "Approved Applications");
                
                if ($this->input->get("category") == md5("Educational"))
                {
                    $this->session->set_userdata("current_tab", "approved_educational");

                    $data["category"] = "Educational";
                }
                
                if ($this->input->get("category") == md5("Scholarship"))
                {
                    $this->session->set_userdata("current_tab", "approved_scholarship");

                    $data["category"] = "Scholarship";
                }

                $this->load->view('templates/header.php');
                $this->load->view('pages/approved_view.php', $data);
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
