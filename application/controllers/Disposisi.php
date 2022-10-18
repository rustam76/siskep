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
        $user = $this->session->userdata('nip_pegawai');
        $data['absensi'] = $this->M_pegawai->tampilAbsensi();
        $data['surat'] = $this->M_pegawai->tampildispos($user);
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/V_usersurat', $data);
        $this->load->view('templet/footer');
    }
    public function kirim($id)
	{
		$data['dis'] = $this->M_pegawai->tampilData();
		$data['posisi'] = $this->M_pegawai->tampildatasurat($id);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_disposisiuser', $data);
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
		redirect('Disposisi');
	}
    public function Cek($kode)
    {
        $this->db->query("UPDATE tbl_surat SET status='2' Where id_surat=$kode");
        $this->session->set_flashdata('pesan', 'Berhasi dikerjakan');
        redirect('Disposisi');
    }
    public function Cekpimpinan($kode)
    {
        $this->db->query("UPDATE tbl_surat SET status='1' Where id_surat=$kode");
        $this->session->set_flashdata('pesan', 'Berhasi ubah status');
        redirect('Disposisi');
    }
    public function updateStatuskerja($kode)
    {
        $this->db->query("UPDATE tbl_surat SET lihat='dikerjakan' Where kode=$kode");
        redirect('Disposisi');
    }
}
