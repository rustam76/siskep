<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
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
		$data['absensi'] = $this->M_pegawai->tampilAbsensi();
		$data['surat'] = $this->M_pegawai->tampildisposisi();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_surat', $data);
		$this->load->view('templet/footer');
	}
	public function simpanSurat()
	{
		$config['upload_path'] = "./assets/arsip";
		$config['allowed_types'] = 'pdf';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {

			$this->session->set_flashdata('pesan', 'Gagal Tambah Data');
			redirect('admin/Disposisi');
		} else {

			$file = $this->upload->data();
			$file = $file['file_name'];
			$no = $this->input->post('no');
			$tgl = $this->input->post('tgl');
			$tglsurat = $this->input->post('tglsurat');
			$asal = $this->input->post('asal');
			$isi = $this->input->post('isi');

			$data = array(
				'no_surat' => $no,
				'tgl' => $tgl,
				'tglsurat' => $tglsurat,
				'dari' => $asal,
				'isi_singkat' => $isi,
				'file' => $file
			);
			$this->db->insert('tbl_surat', $data);
			$this->session->set_flashdata('pesan', 'berhasil simpan surat masuk');
			redirect('admin/Disposisi');
		}
	}
	public function kirim($id)
	{
		$data['dis'] = $this->M_pegawai->tampilData();
		$data['posisi'] = $this->M_pegawai->tampildatasurat($id);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_disposisi', $data);
		$this->load->view('templet/footer');
	}
	public function kirimdisposisi()
	{

		$id = $this->input->post('id');
		$agenda = $this->input->post('agenda');
		$sifat = $this->input->post('sifat');
		$perihal = $this->input->post('perihal');
		$disposisi = $this->input->post('disposisi');
		$baca = $this->input->post('baca');

		$data = array(
			'surat_id' => $id,
			'ket' => $agenda,
			'sifat' => $sifat,
			'hal' => $perihal,
			'disposisi' => $disposisi,
			'baca'=>$baca
			
		);
		// var_dump($data);
		$this->db->insert('tbl_disposisi', $data);
		$this->session->set_flashdata('pesan', 'Berhasi Disposisi Surat');
		redirect('admin/Disposisi');
	}

	public function Arsip()
	{
		$data['absensi'] = $this->M_pegawai->tampilAbsensi();
		$data['surat'] = $this->M_pegawai->tampildisposisi();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_arsip', $data);
		$this->load->view('templet/footer');
	}
	public function Hapus($id)
	{

		$data = array(
				'id_surat' => $id
		);
		$this->db->delete('tbl_surat',$data);
		$this->session->set_flashdata('pesan','Data Berhasi Di hapus');
        redirect('admin/Disposisi/Arsip'); 
	}

	public function ubahArsip()
	{
		$id = $this->input->post('id');
		$config['upload_path'] = "./assets/arsip";
		$config['allowed_types'] = 'pdf';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {
			$no = $this->input->post('no');
			$tgl = $this->input->post('tgl');
			$tglsurat = $this->input->post('tglsurat');
			$asal = $this->input->post('asal');
			$isi = $this->input->post('isi');
			$jenis = $this->input->post('jenis');
			$where =array(
				'id_surat'=> $id
			);

			$data = array(
				'no_surat' => $no,
				'tgl' => $tgl,
				'tglsurat' => $tglsurat,
				'dari' => $asal,
				'isi_singkat' => $isi,
				'status' => $jenis,
			
			);
			$this->db->update('tbl_surat', $data,$where);
			$this->session->set_flashdata('pesan', 'berhasil ubah arsip');
			redirect('admin/Disposisi/Arsip');
		} else {

			$file = $this->upload->data();
			$file = $file['file_name'];
			$no = $this->input->post('no');
			$tgl = $this->input->post('tgl');
			$tglsurat = $this->input->post('tglsurat');
			$asal = $this->input->post('asal');
			$isi = $this->input->post('isi');
			$jenis = $this->input->post('jenis');

			$where =array(
				'id_surat'=> $id
			);

			$data = array(
				'no_surat' => $no,
				'tgl' => $tgl,
				'tglsurat' => $tglsurat,
				'dari' => $asal,
				'isi_singkat' => $isi,
				'status' => $jenis,
				'file' => $file
			);
			$this->db->update('tbl_surat', $data,$where);
			$this->session->set_flashdata('pesan', 'berhasil ubah arsip');
			redirect('admin/Disposisi/Arsip');
		}
	}
}
