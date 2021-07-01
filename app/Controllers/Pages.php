<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Web Pragramming',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        // Proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }
        $data = [
            'title' => 'About Me',
            // 'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        // Proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login !!!');
            return redirect()->to(base_url('login'));
        }
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl, abc No. 123',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl, Setiabudi No. 193',
                    'kota' => 'Bandung'
                ]
            ]
        ];


        return view('pages/contact', $data);
    }

    //--------------------------------------------------------------------

}
