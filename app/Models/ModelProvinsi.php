<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProvinsi extends Model{
    function __construct()
    {
        $this->db = db_connect();
    }
   
    function tampilData(){
      return $this->db->table('provinsi')->get();
    }

    function simpan($data){
       return $this->db->table('provinsi')->insert($data); 
    }

    function hapusdata($id){
        return $this->db->table('provinsi')->delete(['id' => $id]);
    }

    function ambildata($id){
       return $this->db->table('provinsi')->getWhere(['id' => $id]);
    }

    function editdata($data, $id){
        return $this->db->table('provinsi')->update($data, ['id', $id]);
    }
}