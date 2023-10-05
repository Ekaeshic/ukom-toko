<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (null == $this->session->userdata('id_user')) {
			redirect('auth');
		} else {
			if ($this->session->userdata('id_user') != "Admin") {
				redirect('auth', 'refresh');
			}
		}
    }

    public function index()
    {
        $data['title'] = "Admin";
        $data['user'] = $this->session->userdata('id_user');
        $data['username'] = $this->session->userdata('username');

        //$this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        // $this->load->view('templates/footer', $data);
    }
}