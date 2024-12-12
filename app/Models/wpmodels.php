<?php

namespace App\Models;

use CodeIgniter\Model;

class wpmodels extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Mengambil data kriteria beserta bobot dan tipe
    public function getKriteria()
    {
        $dataquery=$this->db->query("select * from data_kriteria");
        return $dataquery->getResult();    }

    // Mengambil data alternatif
    public function getAlternatif()
    {
        $dataquery=$this->db->query("select * from data_alternatif");
        return $dataquery->getResult();    }
    
}
