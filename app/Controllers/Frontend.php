<?php

namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class Frontend extends BaseController
{
    protected $guruModel;
    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'guru' => $this->guruModel->getGuru()
        ];

        return view('partials/frontend/main', $data);
    }
}
