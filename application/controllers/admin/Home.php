<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		$data['totalizin']=$this->M_pegawai->totalaizin();
		$data['totalsakit']=$this->M_pegawai->totalasakit();
		$data['totalabsenini']=$this->M_pegawai->totalabsenku();
		$data['total_pegawai']=$this->M_pegawai->totalData();
		$data['absensi']=$this->M_pegawai->tampilAbsensi();
		$data['absenku'] = $this->db->query("SELECT * from tbl_absen where status='menunggu'");
		// $data['total_kategori']=$this->M_kategori->totalDataKategori();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_home',$data);
		$this->load->view('templet/footer');
	}
}
