<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FilesModel extends CI_Model
{
    public function saveFiles($data)
    {
        $result = $this->db->insert('files_list', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;        
    }
    public function direcoryCheck($data){
        $this->db->select('*');
        $this->db->from('directory_list');
		$this->db->where($data);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function saveDirecory($data)
    {
        $result = $this->db->insert('directory_list', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;        
    }
    public function getFileList($data){
        $this->db->select('*');
        $this->db->from('files_list');
		$this->db->where($data);
        $query = $this->db->get();
        return ($query->result_array());
    }
    public function deleteFile($condition,$data){
		$this->db->set($data);
		$this->db->where($condition);
		$this->db->update('files_list', $data);
		return $this->db->insert_id();
    }
    public function getdirectoryId($data){
        $this->db->select('directory_id');
        $this->db->from('files_list');
		$this->db->where($data);
        $query = $this->db->get();
        $directory_id = $query->row();
        return $directory_id;
    }
    public function getdirectoryPath($data){
        $this->db->select('*');
        $this->db->from('directory_list');
		$this->db->where($data);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}
