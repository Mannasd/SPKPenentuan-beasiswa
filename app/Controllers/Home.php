<?php

namespace App\Controllers;

use App\Models\namajenis_model;
use App\Models\datakriteria_model;
use App\Models\datakeputusan_model;
use App\Models\dataalter_model;
use App\Models\wpmodels;


class Home extends BaseController
{
    public function index()
    {
        echo View('admin_header');
        echo View('admin_nav');
        echo View('home');
        echo View('admin_footer');
    }

    public function callviewjenisusaha()
    {
        $mb = new namajenis_model();
        $datamb = $mb->tampiljenis();
        $data = array('dataMb' => $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View('viewjenisusaha', $data);
        echo View('admin_footer');
    }

    public function callviewdatakriteria()
    {
        $mb = new datakriteria_model();
        $datamb = $mb->tampilkriteria();
        $data = array('dataMb' => $datamb,);

        echo View('admin_header');
        echo View('admin_nav');
        echo View('viewdatakriteria', $data);
        echo View('admin_footer');
    }

    public function callviewkeputusan()
    {
        $model = new wpmodels();
        $alternatif = $model->getAlternatif(); // Ambil data alternatif
        $kriteria = $model->getKriteria();    // Ambil data kriteria

        // Bobot Kriteria
        $bobot = array_column($kriteria, 'nilai_kriteria');
        $totalBobot = array_sum($bobot);
        $bobotNormalisasi = array_map(function ($value) use ($totalBobot) {
            return $value / $totalBobot;
        }, $bobot);

        // Perhitungan Vector S dan V
        $totalS_ipa = 0;
        $preferensi = [];
        foreach ($alternatif as $row) {
            $S_ipa = pow($row->C1, $bobotNormalisasi[0]) *
                pow($row->C2, $bobotNormalisasi[1]) *
                pow($row->C3, $bobotNormalisasi[2]) *
                pow($row->C4, $bobotNormalisasi[3]) *
                pow($row->C5, $bobotNormalisasi[4]) *
                pow($row->C6, $bobotNormalisasi[5]);
            $totalS_ipa += $S_ipa;
            $preferensi[] = [
                'nama_alternatif' => $row->nama_alternatif,
                'S_ipa' => $S_ipa,
            ];
        }


        // Hitung nilai preferensi V_ipa (normalisasi Vector S)
        foreach ($preferensi as &$alt) {
            // Hitung nilai V_ipa
            $alt['V_ipa'] = $alt['S_ipa'] / ($totalS_ipa ?: 1); // Menghindari pembagian oleh nol

            // Membulatkan S_ipa dan V_ipa ke 2 digit desimal
            $alt['S_ipa'] = round($alt['S_ipa'], 2);
            $alt['V_ipa'] = round($alt['V_ipa'], 2);
        }


        // Tampilkan hasil ke view
        echo View('admin_header');
        echo View('admin_nav');
        echo View('viewkeputusan', ['preferensi' => $preferensi]);
        echo View('admin_footer');
    }


    public function callviewdataalter()
    {
        $mb = new dataalter_model();
        $datamb = $mb->tampilAlter();
        $data = array('dataMb' => $datamb);

        echo View('admin_header');
        echo View('admin_nav');
        echo View('viewdataalter', $data);
        echo View('admin_footer');
    }

    public function formtambah()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('addjenisusaha');
        echo view('admin_footer');
    }

    public function prosesTambahJenis()
    {
        $namaJenisUsaha = $this->request->getPost('nama_jenis_usaha');
        $model = new namajenis_model();

        $data = [
            'nama_jenis_usaha' => $namaJenisUsaha
        ];

        if ($model->tambahJenisUsaha($data)) {
            return redirect()->to('Home/callviewjenisusaha')->with('success', 'Jenis Usaha berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan Jenis Usaha!');
        }
    }

    public function formEditJenisUsaha($id)
    {
        $model = new namajenis_model();

        // Ambil data berdasarkan ID
        $jenisUsaha = $model->getJenisUsahaById($id);

        // Jika data tidak ditemukan, kembalikan pesan error
        if (!$jenisUsaha) {
            return redirect()->to('Home/callviewjenisusaha')->with('error', 'Data tidak ditemukan!');
        }

        // Kirim data ke view
        $data['jenisUsaha'] = $jenisUsaha;

        // Tampilkan view
        echo view('admin_header');
        echo view('admin_nav');
        echo view('editjenisusaha', $data);
        echo view('admin_footer');
    }


    // Memproses perubahan data jenis usaha
    public function prosesEditJenisUsaha($id)
    {
        $namaJenisUsaha = $this->request->getPost('nama_jenis_usaha');

        // Validasi input
        if (empty($namaJenisUsaha)) {
            return redirect()->back()->with('error', 'Nama Jenis Usaha tidak boleh kosong!');
        }

        $model = new namajenis_model();
        $data = [
            'nama_jenis_usaha' => $namaJenisUsaha
        ];

        // Update data
        if ($model->editJenisUsaha($id, $data)) {
            return redirect()->to('Home/callviewjenisusaha')->with('success', 'Jenis Usaha berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui Jenis Usaha!');
        }
    }


    // Menghapus data jenis usaha
    public function hapusJenisUsaha($id)
    {
        $model = new namajenis_model();

        if ($model->delete($id)) {
            return redirect()->to('Home/callviewjenisusaha')->with('success', 'Jenis Usaha berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus Jenis Usaha!');
        }
    }

    public function formtambahkriteria()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('form_createkriteria');
        echo view('admin_footer');
    }

    public function createdatakriteria()
    {
        $mb = new datakriteria_model();
        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                'nilai_kriteria' => $this->request->getPost('nilai_kriteria'),
                'tipe_kriteria' => $this->request->getPost('tipe_kriteria')
            ];

            // Insert data ke database
            $mb->tambahKriteria($data);

            // Redirect ke halaman tampilan data
            return redirect()->to('/Home/callviewdatakriteria');
        }

        // Load form untuk tambah data
        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_createkriteria'); // Ganti dengan nama view form create
        echo View('admin_footer');
    }

    public function formupdatekriteria($id)
    {
        $mb = new datakriteria_model();

        // Ambil data kriteria berdasarkan ID
        $kriteria = $mb->cariKriteria($id);

        // Cek apakah data ditemukan
        if (!$kriteria) {
            return redirect()->to('/Home/callviewdatakriteria')->with('error', 'Data kriteria tidak ditemukan!');
        }

        $data = [
            'kriteria' => $kriteria, // Kirim data kriteria ke view
        ];

        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_updatekriteria', $data); // Panggil view form update
        echo View('admin_footer');
    }

    public function updatedatakriteria($id)
    {
        $mb = new datakriteria_model();

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                'nilai_kriteria' => $this->request->getPost('nilai_kriteria'),
                'tipe_kriteria' => $this->request->getPost('tipe_kriteria')
            ];

            // Update data di database
            $mb->updateKriteria($id, $data);

            // Redirect ke halaman tampilan data
            return redirect()->to('/Home/callviewdatakriteria');
        }

        // Ambil data yang akan diedit
        $datamb = $mb->cariKriteria($id);

        // Load form edit dengan data
        $data = array('dataMb' => $datamb);
        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_updatekriteria', $data); // Ganti dengan nama view form update
        echo View('admin_footer');
    }

    public function deletedatakriteria($id)
    {
        $mb = new datakriteria_model();

        // Hapus data berdasarkan ID
        $mb->hapusKriteria($id);

        // Redirect ke halaman tampilan data
        return redirect()->to('/Home/callviewdatakriteria');
    }

    public function formtambahalter()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('form_createalter');
        echo view('admin_footer');
    }

    public function createdataalter()
    {
        $mb = new dataalter_model();

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'kode_alternatif' => $this->request->getPost('kode_alternatif'),
                'nama_alternatif' => $this->request->getPost('nama_alternatif'),
                'C1' => $this->request->getPost('C1'),
                'C2' => $this->request->getPost('C2'),
                'C3' => $this->request->getPost('C3'),
                'C4' => $this->request->getPost('C4'),
                'C5' => $this->request->getPost('C5'),
                'C6' => $this->request->getPost('C6'),
            ];

            // Insert data ke database
            $mb->tambahAlter($data);

            // Redirect ke halaman tampilan data
            return redirect()->to('/Home/callviewdataalter');
        }

        // Load form untuk tambah data
        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_createalter'); // Ganti dengan nama view form create
        echo View('admin_footer');
    }

    public function formupdatealter($id)
    {
        $mb = new dataalter_model();

        // Ambil data kriteria berdasarkan ID
        $alternatif = $mb->cariAlter($id);

        // Cek apakah data ditemukan
        if (!$alternatif) {
            return redirect()->to('/Home/callviewdataalter')->with('error', 'Data ALternatif tidak ditemukan!');
        }

        $data = [
            'alternatif' => $alternatif, // Kirim data kriteria ke view
        ];

        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_updatealter', $data); // Panggil view form update
        echo View('admin_footer');
    }

    public function updatedataalter($id)
    {
        $mb = new dataalter_model();

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'kode_alternatif' => $this->request->getPost('kode_alternatif'),
                'nama_alternatif' => $this->request->getPost('nama_alternatif'),
                'C1' => $this->request->getPost('C1'),
                'C2' => $this->request->getPost('C2'),
                'C3' => $this->request->getPost('C3'),
                'C4' => $this->request->getPost('C4'),
                'C5' => $this->request->getPost('C5'),
                'C6' => $this->request->getPost('C6'),
            ];

            // Update data di database
            $mb->updateAlter($id, $data);

            // Redirect ke halaman tampilan data
            return redirect()->to('/Home/callviewdataalter');
        }

        // Ambil data yang akan diedit
        $datamb = $mb->cariAlter($id);

        // Load form edit dengan data
        $data = array('dataMb' => $datamb);
        echo View('admin_header');
        echo View('admin_nav');
        echo View('form_updatealter', $data); // Ganti dengan nama view form update
        echo View('admin_footer');
    }

    public function deletedataalter($id)
    {
        $mb = new dataalter_model();

        // Hapus data berdasarkan ID
        $mb->hapusAlter($id);

        // Redirect ke halaman tampilan data
        return redirect()->to('/Home/callviewdataalter');
    }

    public function normalisasi()
    {
        $model = new wpmodels();
        $alternatif = $model->getAlternatif(); // Ambil data alternatif
        $kriteria = $model->getKriteria();    // Ambil data kriteria

        // Bobot Kriteria
        $bobot = array_column($kriteria, 'nilai_kriteria');
        $totalBobot = array_sum($bobot);
        $bobotNormalisasi = array_map(function ($value) use ($totalBobot) {
            return $value / $totalBobot;
        }, $bobot);

        // Perhitungan Vector S dan V
        $totalS_ipa = 0;
        $preferensi = [];
        foreach ($alternatif as $row) {
            $S_ipa = pow($row->C1, $bobotNormalisasi[0]) *
                pow($row->C2, $bobotNormalisasi[1]) *
                pow($row->C3, $bobotNormalisasi[2]) *
                pow($row->C4, $bobotNormalisasi[3]) *
                pow($row->C5, $bobotNormalisasi[4]) *
                pow($row->C6, $bobotNormalisasi[5]);
            $totalS_ipa += $S_ipa;
            $preferensi[] = [
                'nama_alternatif' => $row->nama_alternatif,
                'S_ipa' => $S_ipa,
            ];
        }


        // Hitung nilai preferensi V_ipa (normalisasi Vector S)
        foreach ($preferensi as &$alt) {
            // Hitung nilai V_ipa
            $alt['V_ipa'] = $alt['S_ipa'] / ($totalS_ipa ?: 1); // Menghindari pembagian oleh nol

            // Membulatkan S_ipa dan V_ipa ke 2 digit desimal
            $alt['S_ipa'] = round($alt['S_ipa'], 4);
            $alt['V_ipa'] = round($alt['V_ipa'], 4);
        }


        // Tampilkan hasil ke view
        echo View('admin_header');
        echo View('admin_nav');
        echo View('normalisasi', ['preferensi' => $preferensi]);
        echo View('admin_footer');
    }
}
