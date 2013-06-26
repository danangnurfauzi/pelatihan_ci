<?php

class Pelatihan_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function input_jabatan($jabatan){
        $this->db->set('nama_jabatan',$jabatan);
        $this->db->insert('jabatan');
    }
    
    public function data_jabatan(){
        $this->db->select('*');
        $this->db->from('jabatan');
        return $this->db->get();
    }
    
    public function hapus_jabatan($id_jabatan){
        $this->db->where('id_jabatan',$id_jabatan);
        $this->db->delete('jabatan');
    }
    
    public function get_data_jabatan($id){
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->where('id_jabatan',$id);
        return $this->db->get();
    }
    
    public function ubah_data_jabatan($id,$jab){
        $this->db->set('nama_jabatan',$jab);
        $this->db->where('id_jabatan',$id);
        $this->db->update('jabatan');
    }
    
    public function input_karyawan($idk=""){
        
        if($idk != ""):
            
            $this->db->select('*');
            $this->db->from('karyawan');
            $this->db->where('id_karyawan',$idk);
            $idkaryawan = $this->db->get()->row();
            
            $this->db->set('nama_lengkap',$this->input->post('nama'));
            $this->db->set('tempat_lahir',$this->input->post('tmpLhr'));
            $this->db->set('tanggal_lahir',$this->input->post('tglLhr'));
            $this->db->set('no_hp',$this->input->post('nohp'));
            $this->db->set('alamat',$this->input->post('alamat'));
            $this->db->where('id_kar_pro',$idkaryawan->id_kar_pro);
            $this->db->update('karyawan_profiles');
                        
            $this->db->set('id_jabatan',$this->input->post('jabatanid'));
            $this->db->where('id_karyawan',$idk);
            $this->db->update('karyawan');
        else:
            $this->db->set('nama_lengkap',$this->input->post('nama'));
            $this->db->set('tempat_lahir',$this->input->post('tmpLhr'));
            $this->db->set('tanggal_lahir',$this->input->post('tglLhr'));
            $this->db->set('no_hp',$this->input->post('nohp'));
            $this->db->set('alamat',$this->input->post('alamat'));
            $this->db->insert('karyawan_profiles');
            $lastId = $this->db->insert_id();
            
            $this->db->set('id_kar_pro',$lastId);
            $this->db->set('id_jabatan',$this->input->post('jabatanid'));
            $this->db->insert('karyawan');
        endif;                
    }
    
    public function get_karyawan($idk=""){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('karyawan_profiles','karyawan.id_kar_pro = karyawan_profiles.id_kar_pro');
        $this->db->join('jabatan','karyawan.id_jabatan = jabatan.id_jabatan');
        
        if($idk != ""):
            $this->db->where('id_karyawan',$idk);
        endif;
        
        return $this->db->get();
    }
    
    public function delete_karyawan($id){
        $this->db->select('id_kar_pro');
        $this->db->from('karyawan');
        $this->db->where('id_karyawan',$id);
        $idk = $this->db->get()->row();
        
        $this->db->where('id_kar_pro',$idk->id_kar_pro);
        $this->db->delete('karyawan_profiles');
        
        $this->db->where('id_karyawan',$id);
        $this->db->delete('karyawan');        
    }
    
}

?>