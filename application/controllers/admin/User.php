<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('M_pegawai');
		if($this->session->userdata('level')==null){
			$this->session->set_flashdata('pesan', 'Jangan Nakal Bro..!!!');
			redirect('Auth');
		}
    }

	public function index()
	{
		$data['user']=$this->M_pegawai->User();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_pengguna',$data);
		$this->load->view('templet/footer');
	}
	
    public function simpan()
	{
		$config['upload_path'] = "./assets/img";
		$config['allowed_types'] = 'png||jpg||gif';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$alamat = $this->input->post('alamat');
			$level = $this->input->post('level');
           
			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'level' => $level,
				'alamat' => $alamat,
			);
			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/User');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$alamat = $this->input->post('alamat');
			$level = $this->input->post('level');
           
			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'level' => $level,
				'alamat' => $alamat,
				'foto' => $foto
			);
			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/User');
		}
    }

    public function ubah()
	{
        $id = $this->input->post('id');
		$config['upload_path'] = "./assets/img";
		$config['allowed_types'] = 'png||jpg||gif';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$alamat = $this->input->post('alamat');
			$level = $this->input->post('level');
        
            $where = array(
                'id_user'=>$id
            );
			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'level' => $level,
				'alamat' => $alamat,
			);
			$this->db->insert('tbl_user', $data,$where);
			$this->session->set_flashdata('pesan', 'berhasil ubah data');
			redirect('admin/User');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$alamat = $this->input->post('alamat');
			$level = $this->input->post('level');
           
            $where = array(
                'id_user'=>$id
            );

			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'level' => $level,
				'alamat' => $alamat,
				'foto' => $foto
			);
			$this->db->update('tbl_user', $data,$where);
			$this->session->set_flashdata('pesan', 'berhasil ubah data');
			redirect('admin/User');
		}
	}

    public function hapus($id)
    {
        $where = array(
            'id_user'=> $id
        );

        $this->db->delete('tbl_user',$where);
        $this->session->set_flashdata('pesan', 'berhasil hapus data');
        redirect('admin/User');
    }
}
