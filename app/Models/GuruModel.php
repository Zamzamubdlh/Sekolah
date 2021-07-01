<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'foto', 'nip', 'pendidikan', 'jabatan', 'alamat'];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
