<?php 
namespace App\Models;
use CodeIgniter\Model;

class Datakriteria_model extends Model
{
    protected $table = 'data_kriteria'; // Nama tabel
    protected $primaryKey = 'id';       // Primary key tabel (id)

    public function __construct()
    {
        $this->db = db_connect(); // Koneksi database
    }

    // Function Read All (MeAnggunakan Query Manual)
    public function tampilkriteria()
    {
        $query = $this->db->query("SELECT * FROM $this->table");
        return $query->getResult(); // Mengembalikan semua data sebagai objek
    }

    // Function Create
    public function tambahKriteria($data)
    {
        $sql = "INSERT INTO $this->table (kode_kriteria, nama_kriteria, nilai_kriteria, tipe_kriteria) 
                VALUES (:kode_kriteria:, :nama_kriteria:, :nilai_kriteria:, :tipe_kriteria:)";
        return $this->db->query($sql, $data);
    }

    // Function Find by ID
    public function cariKriteria($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id = ?", [$id]);
        return $query->getRow(); // Mengembalikan satu baris data sebagai objek
    }

    // Function Update
    public function updateKriteria($id, $data)
    {
        $sql = "UPDATE $this->table 
                SET kode_kriteria = :kode_kriteria:, nama_kriteria = :nama_kriteria:, 
                    nilai_kriteria = :nilai_kriteria:, tipe_kriteria = :tipe_kriteria:
                WHERE id = :id:";
        $data['id'] = $id; // Tambahkan ID ke data array
        return $this->db->query($sql, $data);
    }

    // Function Delete
    public function hapusKriteria($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
