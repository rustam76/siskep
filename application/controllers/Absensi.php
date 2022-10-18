<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
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
		$data['absen'] = $this->M_pegawai->tampilAbsenuser($user);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_datauserabsen', $data);
		$this->load->view('templet/footer');
	}
	public function absen()
    { 
        // if ($this->uri->segment(2)) {
            
                $nip = $this->session->userdata('nip_pegawai');
                $tgl = date('Y-m-d');
                $waktu = date('H:i:s');

                $data = array(
                    'pegawai_nip' => $nip,
                    'keterangan' => '1',
                    'tgl' => $tgl,
                    'jam_masuk' => $waktu,
                    'status'=> 'menunggu'
                );
                
                $this->db->insert('tbl_absen',$data);
                $this->session->set_flashdata('pesan','Berhasi Absen Masuk Hari ini');
                redirect('Home');
    
	}
    public function pulang($id)
    { 
        $where =array(
            'id_absen'=> $id
        );
       
                $waktu = date('H:i:s');

                $data = array(
                    'keterangan' => '3',
                    'jam_keluar' => $waktu,
                    'status'=> 'hadir'
                );
                $this->db->update('tbl_absen',$data,$where);
                $this->session->set_flashdata('pesan','Berhasi Absen Pulang Hari ini');
                redirect('Home');
    }

    public function Izin()
    { 
        // if ($this->uri->segment(2)) {
            
                $nip = $this->session->userdata('nip_pegawai');
                $tgl = date('Y-m-d');
                $status = $this->input->post('status');

                $data = array(
                    'pegawai_nip' => $nip,
                    'tgl' => $tgl,
                    'status'=> $status
                );
                
                $this->db->insert('tbl_absen',$data);
                $this->session->set_flashdata('pesan','Berhasi Ambil Cuti Hari ini');
                redirect('Home');
    
	}
}
