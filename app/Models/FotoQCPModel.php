<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoQCPModel extends Model
{
    protected $table      = 'foto_qcp';
    protected $useTimeStamps      = True;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id_qcp', 'id_kategori', 'nama_foto', 'keterangan', 'pembuat'];

    public function getFoto($id = false)
    {
        if ($id == false) {
            return $this->orderBy('nama_foto')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
