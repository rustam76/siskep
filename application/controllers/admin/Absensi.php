<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
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
		$data['totalabsenini']=$this->M_pegawai->totalabsenini();
		$data['total_pegawai']=$this->M_pegawai->totalData();
		$data['absensi']=$this->M_pegawai->tampilAbsensi();
		$data['absenku'] = $this->db->query("SELECT * from tbl_absen where status='menunggu'");
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_absensi',$data);
		$this->load->view('templet/footer');
	}
	public function absenuser()
	{
		
		$data['absen']=$this->M_pegawai->tampilData();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_absendetail',$data);
		$this->load->view('templet/footer');
	}
	public function detailAbsen($kode)
	{

		
		$data['absen']=$this->M_pegawai->tampilSemuaabsen($kode);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_semuaabsen',$data);
		$this->load->view('templet/footer');
	}
	public function excel($kode)
    {
		// var_dump($kode);
        $data['title'] = 'Laporan Excel';
        $data['semua'] = $this->M_pegawai->getDataabsen($kode);
        $this->load->view('excel/excelabsen', $data);
    }

	public function simpanData(){
		

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
	

						
		$data = array(	
            'nip_pegawai' => $nip,
            'nama_pegawai' => $nama,
          
			
        );

		$this->M_pegawai->simpanAbsensi($data, 'tbl_absensi');
        $this->session->set_flashdata('pesan','Data Berhasi Di Tambah');
        redirect('admin/Absensi'); 
		
	}

	public function tambahDataKategori()
	{
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_fromKategori');
		$this->load->view('templet/footer');
	}

	public function SimpanData_Kategori(){
		$data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
		
        );

        $this->db->insert('tbl_kategori',$data);
        redirect('Kategori'); 
	}

	// Edit kategori
	public function EditKategori()
	{

	}

	// HApus KAtegori
	public function HapusDataKategori($id_kategori)
	{
		$data = array(
				'id_kategori' => $id_kategori
		);
		$this->M_kategori->hapusDataKategori($data);
		redirect('Kategori');
	}
}
