<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_profil');
		$this->load->view('templet/footer');
		
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
			
           
			$where=array(
				'id_user'=> $id
			); 
			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'alamat' => $alamat,
		
			);
			$this->db->update('tbl_user', $data, $where);
			$this->session->set_flashdata('pesan', 'berhasil ubah data silahkan logout terlebih dahulu');
			redirect('User');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$alamat = $this->input->post('alamat');
           
			$where=array(
				'id_user'=> $id
			); 
			$data = array(
				'username' => $username,
				'password' => $password,
				'nip_pegawai' => $nip,
				'alamat' => $alamat,
				'foto' => $foto
			);
			$this->db->update('tbl_user', $data, $where);
			$this->session->set_flashdata('pesan', 'berhasil ubah data silahkan logout terlebih dahulu');
			redirect('User');
		}
    }
		

	// public function Registrasi(){
	// 	$nik = $this->input->post('nik');
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	$data = array(	
	// 		'nik' => $nik,
	// 		'username' => $username,
	// 		'password' => $password,
	// 		'role_id' => '4',
	// 		'status' => 'tidak'
    //     );

	// 	$this->db->insert('tbl_user',$data);
	// 	$this->session->set_flashdata('pesan', 'berhasil Registrasi Silahkan Tunggu Konfirmasi Admin');
	// 		redirect('Surat');
	// }
}
