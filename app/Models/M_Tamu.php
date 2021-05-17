<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_Tamu extends Model{
    public function __construct()
    {
        $this->db = db_connect(); 
    }

    public function getAllData()
    {
        return $this->db->table('data_tamu')->get();
    }

    public function tambah($data)
    {
        return $this->db->table('data_tamu')->insert($data);
    }

    public function hapus($id)
    {
        return $this->db->table('data_tamu')->delete(['id' => $id]);
    }

}