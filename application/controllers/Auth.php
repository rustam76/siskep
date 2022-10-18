<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->load->view('V_login');

	}
	public function Login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$cekuser = $this->M_auth->CekUser($username);

		if ($cekuser) {
			$ceklogin = $this->M_auth->CekLogin($username, $password);
			if ($ceklogin) {
				foreach ($ceklogin as $row)
					if ($row->status == "aktif") {
						$this->session->set_userdata('id_user', $row->id_user);
						$this->session->set_userdata('username', $row->username);
						$this->session->set_userdata('password', $row->password);
						$this->session->set_userdata('nip_pegawai', $row->nip_pegawai);
						$this->session->set_userdata('foto', $row->foto);
						$this->session->set_userdata('alamat', $row->alamat);
						$this->session->set_userdata('level', $row->level);
						if ($this->session->userdata('level') == "admin") {
							$this->session->set_flashdata('pesan','berhasil Login');
							redirect('admin/Home', 'refresh');
						}else{
                            $this->session->set_flashdata('pesan','berhasil Login');
                            redirect('Home');
                        }
					} else {
						$this->session->set_flashdata('pesan','maaf username belum aktif');
						redirect('Auth', 'refresh');
					}
			} else {
				$this->session->set_flashdata('pesan','maaf username salah');
				
				redirect('Auth', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan','Belum Terdafaftar');
			
			redirect('Auth', 'refresh');
		}
	}

	function logout(){
		$this->session->sess_destroy();

		$this->session->set_flashdata('pesan', 'berhasi LogOut');
		redirect('Auth');
	}

}
