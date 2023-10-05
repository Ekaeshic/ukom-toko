<?php
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');


		if ($this->form_validation->run() == false) {
			$data['title'] = "Login";
			// $this->load->view('templates/header', $data);
			$this->load->view('login', $data);
			// $this->load->view('templates/footer', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$this->session->set_flashdata('message');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_username = $this->db->get_where('user', ['username' => $username])->row_array();

        //Cek admin
        if ($username == 'admin' && $password == 'admin') {
            $userdata = [
                'id_user' => 'Admin',
                'username' => 'admin',
                'nama_lengkap' => 'admin'
            ];

            $this->session->set_userdata($userdata);
            redirect('admin');
        }

		if ($cek_username) {
			$data = ['password' => $cek_username['password']];
            
            if ($data['password'] == sha1($password)) {
                $userdata = [
                    'id_user' => $cek_username['id_user'],
                    'username' => $cek_username['username'],
                    'nama_lengkap' => $cek_username['nama_lengkap']
                ];

                $this->session->set_userdata($userdata);
                redirect('user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password atau username salah!</div>');
                redirect('auth');
            }
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function Register()
	{

		$name = htmlspecialchars($this->input->post('name'));
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));
		$email = htmlspecialchars($this->input->post('email'));
		$dob = htmlspecialchars($this->input->post('dob'));
		$gender = htmlspecialchars($this->input->post('gender'));
        $address = htmlspecialchars($this->input->post('address'));
        $city = htmlspecialchars($this->input->post('city'));
        $phone = htmlspecialchars($this->input->post('phone'));
        $paypal = htmlspecialchars($this->input->post('paypal'));

		$array = [
			'id_user' => null,
			'name' => $name,
            'username' => $username,
            'password' => sha1($password),
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender,
            'address' => $address,
            'city' => $city,
            'phone' => $phone,
            'paypal' => $paypal,
		];

		$this->m_toko_online->add_data('user', $array);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-check"></i> Mendaftar berhasil!</h5></div>');
		redirect('auth');
	}

	public function Logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout berhasil!</div>');
		redirect('auth');
	}
}
