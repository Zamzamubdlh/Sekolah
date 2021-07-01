<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        echo view('v_login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->LoginModel->cek_login($username, $password);

        if (($cek['username'] == $username) && ($cek['password'] == $password)) {
            // Jika Username dan Password betil
            session()->set('username', $cek['username']);
            session()->set('nama_user', $cek['nama_user']);
            session()->set('level', $cek['level']);
            return redirect()->to(base_url('guru'));
        } else {
            // Jika Username dan Password salah
            session()->setFlashdata('gagal', 'Username Atau Password Salah !!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->remove('username');
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Anda Berhasil Logout !!!');
        return redirect()->redirect(base_url('login'));
    }
}
