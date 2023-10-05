<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (null == $this->session->userdata('id_user')) {
			redirect('auth');
		} else {
			if ($this->session->userdata('id_user') == "Admin") {
				redirect('auth', 'refresh');
			}
		}
    }

    public function index()
    {
        $data['title'] = "Toko Online";
        $data['user'] = $this->session->userdata('id_user');
        $data['username'] = $this->session->userdata('username');

        $this->load->view('user/header', $data);
        $this->load->view('user/browse', $data);
        //$this->load->view('templates/footer', $data);
    }
}