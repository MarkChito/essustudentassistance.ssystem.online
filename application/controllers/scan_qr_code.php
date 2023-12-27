<?php
defined('BASEPATH') or exit('No direct script access allowed');

class scan_qr_code extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata("primary_key")) {
            $this->session->set_userdata("title", "Scan QR Code");
            $this->session->set_userdata("current_tab", "scan_qr_code");

            $this->load->view('templates/header.php');
            $this->load->view('pages/scan_qr_code_view.php');
            $this->load->view('templates/footer.php');
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
