<?php

namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class Guru extends BaseController
{
    protected $guruModel;
    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }
    public function index()
    {
        // Proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }

        // $guru = $this->guruModel->findAll();

        $data = [
            'title' => 'Data Guru',
            'guru' => $this->guruModel->getGuru()
        ];

        // $guruModel = new \App\Models\GuruModel();
        // $guruModel = new GuruModel();
        // dd($guru);

        // Cara Konek db tanpa Model
        // $db = \Config\Database::connect();
        // $guru = $db->query("SELECT * FROM guru");
        // dd($guru);

        return view('guru/index', $data);
    }

    public function detail($id)
    {
        // Proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }
        $data = [
            'title' => 'Detail Guru',
            'guru'  =>  $this->guruModel->getGuru($id)
        ];

        // Jika guru tidak ada di tabel
        if (empty($data['guru'])) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Guru ' . $id . ' tidak ditemukan,');
        }

        return view('guru/detail', $data);
    }

    public function create()
    {
        // Proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }
        $data = [
            'title' => 'Form Tambah Data Guru',
        ];
        return view('guru/create', $data);
    }

    public function save()
    {
        // ambil gambar
        $uniq = time();
        // $filefoto = $_FILES['foto']['name'];
        // $fileTmp = $_FILES['foto']['tmp_name'];
        // $uniq_foto = $uniq . "_" . $filefoto;
        // $path_foto = "public/img/" . $uniq_foto;
        // move_uploaded_file($fileTmp, $path_foto);
        // $nama_foto = $uniq_foto;
        $filefoto = $this->request->getFile('foto');
        // generate nama foto Random
        $namafoto = $uniq . "_" . $filefoto->getName();
        // pindahkan file ke folder img
        $filefoto->move('img', $namafoto);

        $this->guruModel->save([
            'nama' => $this->request->getVar('nama'),
            'foto' => $namafoto,
            'nip' => $this->request->getVar('nip'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/guru');
    }

    public function delete($id)
    {
        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/guru');
    }

    public function edit($id)
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }
        // $data = [
        //     'title' => 'Form Ubah Data Guru',
        //     'guru' => $this->guruModel->getGuru($id)

        // ];
        $guru = $this->guruModel->query("SELECT * from guru where id= {$id} ")->getResult('array');
        $array = array();
        foreach ($guru as $data) {
            $array['nama'] = $data['nama'];
            $array['foto'] = $data['foto'];
            $array['nip'] = $data['nip'];
            $array['pendidikan'] = $data['pendidikan'];
            $array['jabatan'] = $data['jabatan'];
            $array['alamat'] = $data['alamat'];
        }
        $hasil_arr = array('data' => $array);
        echo json_encode($hasil_arr);
    }

    public function update($id)
    {
        if (!empty($_FILES['foto']['name'])) {
            $uniq = time();
            $filefoto = $this->request->getFile('foto');
            // Findah Folder
            $namafoto = $uniq . "_" . $filefoto->getName();

            $filefoto->move('img', $namafoto);
            // Ambil Nama

        } else {
            $namafoto = $this->request->getVar('oldfoto');
        }
        // echo $namafoto;
        // return;
        $this->guruModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namafoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/guru');
    }
}
