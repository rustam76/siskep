<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('M_pegawai');
			$this->load->model('Jam_model', 'jam');
			$this->load->helper('Tanggal');
			if($this->session->userdata('level')==null){
				$this->session->set_flashdata('pesan', 'Jangan Nakal Bro..!!!');
				redirect('Auth');
			}
		}
	
		public function index()
		{
			$user = $this->session->userdata('nip_pegawai');
			// $data['absen']=$this->M_pegawai->absen_harian_user($user)->num_rows();
			$data['absenku'] =$this->M_pegawai->absen(); 
			$isi = $this->M_pegawai->AbsenByStatusId($user);

			if ($isi) {
				$data['absen'] = $isi;
			  } else {
				$data['absen']['keterangan'] = "";
				// $data['absen']['id_pegawai'] = "peg";
			  }
			
			$this->load->view('templet/header');
			$this->load->view('templet/sidebar');
			$this->load->view('admin/V_absen',$data);
			$this->load->view('templet/footer');
		}
		public function absenmasuk(){
			$nip =$this->input->post('nip_pegawai');
			$tgl =$this->input->post('tgl');
			$waktu =$this->input->post('waktu');

			// var_dump($tgl,$waktu);
			$data=array(
				'nip_pegawa' => $nip,
				'tgl' => $tgl,
				'jam_masuk' => $waktu
			);

			$this->M_pegawai->simpanmasuk($data, 'tbl_absen');
			$this->session->set_flashdata('pesan','Berhasil Absen Masuk');
			redirect('Home');
		}

		public function absenkeluar(){

			$id =$this->input->post('id');
			$status =$this->input->post('status');
			$pulang =$this->input->post('pulang');

			// var_dump($tgl,$waktu);

			$where=array(
				'id_absen' => $id
			);
			$data=array(
				'status' => $status,
				'jam_keluar' => $pulang
			);

			$this->M_pegawai->simpankeluar($where, $data, 'tbl_absen');
			$this->session->set_flashdata('pesan','Berhasil Absen Pulang');
			redirect('Home');

		}

		public function izin(){
			$nip =$this->input->post('nip_pegawai');
			$tgl =$this->input->post('tgl');
			$status =$this->input->post('status');

			// var_dump($tgl,$waktu);
			$data=array(
				'nip_pegawa' => $nip,
				'status' => $status,
				'tgl' => $tgl,

			);

			$this->M_pegawai->simpanmasuk($data, 'tbl_absen');
			$this->session->set_flashdata('pesan','Berhasil Ambil Izin');
			redirect('Home');
		}
		public function sakit(){
			$nip =$this->input->post('nip_pegawai');
			$tgl =$this->input->post('tgl');
			$status =$this->input->post('status');

			// var_dump($tgl,$waktu);
			$data=array(
				'nip_pegawa' => $nip,
				'status' => $status,
				'tgl' => $tgl,

			);

			$this->M_pegawai->simpanmasuk($data, 'tbl_absen');
			$this->session->set_flashdata('pesan','Berhasil Ambil Cuti Sakit');
			redirect('Home');
		}
}
