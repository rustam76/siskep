<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{
    public function User()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');        
        $query= $this->db->get();
        return $query->result();
    }
    public function tampilData()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');        
        $query= $this->db->get();
        return $query->result();
    }
    public function tampildatasurat($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_surat');
        $this->db->where('id_surat',$id);        
        $query= $this->db->get();
        return $query->row_array();
    }

    public function tampildisposisi()
    {
        $this->db->select('*');
        $this->db->from('tbl_surat');
      
        $query= $this->db->get();
        return $query->result();
    }
    public function tampildispos($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_disposisi');
        $this->db->join('tbl_surat','tbl_surat.id_surat=tbl_disposisi.surat_id');
        $this->db->where('disposisi',$nip);        
        $query= $this->db->get();
        return $query->result();
    }

    function simpanData($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getData()
    {
        return $this->db->get('tbl_pegawai')->result_array();
    }
    public function getDataabsen($kode)
    {
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->join('tbl_pegawai','tbl_pegawai.nip_pegawai=tbl_absen.pegawai_nip');
        $this->db->where('pegawai_nip',$kode);
        $query= $this->db->get();
        return $query->result_array();
       
    }
    
    public function absen()
    {
        
        $this->db->select('*');
        $this->db->from('tbl_absen');

        $query= $this->db->get();
        return $query->result();
    }
    public function AbsenByStatusId($id_user)
  {
    $tgl_skrng = date('Y-m-d');
    $sql = "SELECT * from tbl_absen where pegawai_nip='$id_user' and tgl='$tgl_skrng'";
    $result = $this->db->query($sql);
    return $result->row_array();
  }
    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('nip_user', $id_user);
        $data = $this->db->get('tbl_absensi');
        return $data;
    }
    public function tampilSemuaabsen($kode)
    {
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->join('tbl_pegawai','tbl_pegawai.nip_pegawai=tbl_absen.pegawai_nip');
        $this->db->where('pegawai_nip',$kode);
        $query= $this->db->get();
        return $query->result();
    }
    
    public function tampilAbsensi()
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->join('tbl_pegawai','tbl_pegawai.nip_pegawai=tbl_absen.pegawai_nip');
        $this->db->where('tgl', $today);
        $query= $this->db->get();
        return $query->result();
    }
   
    public function tampilAbsenini($user)
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->where('tgl', $today);
        $this->db->where('pegawai_nip',$user);
        $query= $this->db->get();
        return $query->result();
    }
    public function tampilAbsen()
    {
       
        $this->db->select('*');
        $this->db->from('tbl_absen');
       
        $query= $this->db->get();
        return $query->result();
    }
    function simpanmasuk($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function simpankeluar($where, $data, $table)
    {
        $this->db->update($table, $data, $where);
    }

    function simpanAbsensi($data, $table)
    {
        $this->db->insert($table, $data);
    }
   
    public function totalData()
    {
        return $this->db->get('tbl_pegawai')->num_rows();
    }
    public function tampilAbsenuser($user){
     
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->join('tbl_pegawai','tbl_pegawai.nip_pegawai=tbl_absen.pegawai_nip');
        $this->db->where('pegawai_nip',$user);
        $this->db->order_by('id_absen', "DESC");
        $query= $this->db->get();
        return $query->result();
    }

    public function totalabsenku()
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_absen');
        // $this->db->where('status','hadir');
        $this->db->where('tgl', $today);
        $query= $this->db->get();
        return $query->num_rows();
    }
    public function totalasakit()
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->where('status','sakit');
        $this->db->where('tgl', $today);
        $query= $this->db->get();
        return $query->num_rows();
    }
    public function totalaizin()
    {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_absen');
        $this->db->where('status','izin');
        $this->db->where('tgl', $today);
        $query= $this->db->get();
        return $query->num_rows();
    }
    public function tampilabsenku(){
       $query ="SELECT status from tbl_absen where status='menunggu'";
        return $this->db->query($query)->result_array();

    }
}