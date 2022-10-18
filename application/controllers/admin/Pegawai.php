<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Pegawai extends CI_Controller {
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
		$data['pegawai']=$this->M_pegawai->tampilData();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_Pegawai',$data);
		$this->load->view('templet/footer');
	}

	public function excel()
    {
        $data['title'] = 'Laporan Excel';
        $data['semua'] = $this->M_pegawai->getData();
        $this->load->view('excel/excel', $data);
    }

	// Simpan data ke data base
	public function simpanData(){
		

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$pangkat = $this->input->post('pangkat');
		$jabatan = $this->input->post('jabatan');
		$pend = $this->input->post('pendidikan');
		$ttl = $this->input->post('ttl');
		$alamat = $this->input->post('alamat');
		$mulai = $this->input->post('mulai');

						
		$data = array(	
            'nip_pegawai' => $nip,
            'nama_pegawai' => $nama,
			'jenis'=>$jenis,
			'pangkat'=>$pangkat,
			'jabatan'=>$jabatan,
			'pendidikan'=>$pend,
			'ttl'=>$ttl,
            'alamat' => $alamat,
			'mulai'=>$mulai			
        );

		$this->db->insert('tbl_pegawai',$data);
        $this->session->set_flashdata('pesan','Data Berhasi Di Tambah');
        redirect('admin/Pegawai'); 
		
	}
	public function ubahData(){
		
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$pangkat = $this->input->post('pangkat');
		$jabatan = $this->input->post('jabatan');
		$pend = $this->input->post('pendidikan');
		$ttl = $this->input->post('ttl');
		$alamat = $this->input->post('alamat');
		$mulai = $this->input->post('mulai');

		$where=array(
			'id_pegawai'=>$id
		);
				
		$data = array(	
            'nip_pegawai' => $nip,
            'nama_pegawai' => $nama,
			'jenis'=>$jenis,
			'pangkat'=>$pangkat,
			'jabatan'=>$jabatan,
			'pendidikan'=>$pend,
			'ttl'=>$ttl,
            'alamat' => $alamat,
			'mulai'=>$mulai			
        );

		$this->db->update('tbl_pegawai',$data,$where);
        $this->session->set_flashdata('pesan','Data Berhasi Di ubah');
        redirect('admin/Pegawai'); 
		
	}
	public function Hapus($id)
	{

		$data = array(
				'id_pegawai' => $id
		);
		$this->db->delete('tbl_pegawai',$data);
		$this->session->set_flashdata('pesan','Data Berhasi Di hapus');
        redirect('admin/Pegawai'); 
	}
	// Edit Data Arsip
	public function editDataArsip($id_arsip)
	{
		

	$config['upload_path']="./assets/arsip";
        $config['allowed_types']='pdf';
        $config['max_size']= 0;
     

        $this->load->library('upload',$config);
		if(!$this->upload->do_upload('file_kategori'))
        {
            $error = array('error' => $this->upload->display_errors());
            redirect('Arsip',$error);	
        } else {

				$file_kategori = $this->upload->data();
				$file_kategori = $file_kategori['file_name'];
				$id_arsip = $this->input->post('id_arsip');
				$kode_arsip = $this->input->post('kode_arsip');
				$nama_arsip = $this->input->post('nama_arsip');
				$nama_kategori = $this->input->post('nama_kategori');
				$keterangan = $this->input->post('keterangan');
						
		$data = array(	
			'id_arsip' => $id_arsip,
            'kode_arsip' => $kode_arsip,
            'nama_arsip' => $nama_arsip,
            'nama_kategori' => $nama_kategori,
			'keterangan' => $keterangan,
			'file_kategori' => $file_kategori,	
			
        );

		$this->M_arsip->editDataArsip($data, 'arsip');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Data</strong> Berhasil Di Tambah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
        redirect('Arsip'); 
		}
	}
	
	// Hapus DataArsip
	public function HapusDataArsip()
	{
		$id_arsip = $this->input->post('id_arsip');

		$data = array(
				'id_arsip' => $id_arsip
		);
		$this->M_arsip->hapusDataArsip($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Data</strong> Berhasil Di Hapuss...!!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
		redirect('Arsip');
	}

	public function detailDataArsip($id_arsip)
	{
		$data['detail']=$this->M_arsip->detailDataArsip($id_arsip);
	
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_detailArsip',$data);
		$this->load->view('templet/footer');
	}
	
}
