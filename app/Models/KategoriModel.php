<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $useTimeStamps      = True;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['nama_kategori'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->orderBy('id')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
