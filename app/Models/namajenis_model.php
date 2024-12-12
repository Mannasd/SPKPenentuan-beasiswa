<?php 
namespace App\Models;
use CodeIgniter\Model;

class namajenis_model extends Model
{
    protected $table = 'jenis_usaha';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_jenis_usaha'];
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampiljenis()
    {
        $dataquery=$this->db->query("select * from jenis_usaha" );
        return $dataquery->getResult();
    }

    public function tambahJenisUsaha($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function editJenisUsaha($id, $data)
    {
        return $this->db->table($this->table)
                        ->set($data)
                        ->where('id', $id)
                        ->update();
    }

    public function getJenisUsahaById($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();
    }


    
}