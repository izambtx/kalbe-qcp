<?php

namespace App\Models;

use CodeIgniter\Model;

class LainlainModel extends Model
{
    protected $table      = 'qcp';
    protected $useTimeStamps      = True;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id_kategori', 'changecontrol', 'nama_project', 'sasaran_kpi', 'bagian', 'start', 'end', 'sebelum', 'sesudah', 'solusi', 'hasil', 'status', 'cpr_no', 'change_control', 'catatan', 'pembuat', 'penyetuju', 'returner', 'rejecter', 'alasan', 'approved_at', 'returned_at', 'rejected_at'];

    public function getLainlain($id = false)
    {
        if ($id == false) {
            return $this->orderBy('created_at')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getCprNoLainlain($id = false)
    {

        return $this->where(['pembuat' => user_id()])->where(['id_kategori' => 4])->countAllResults();
    }

    public function getCountLainlain()
    {
        return $this->where(['id_kategori' => 4])->where(['pembuat' => user_id()])->orWhere(['penyetuju' => user_id()])->countAllResults();
    }

    public function getCountLainlainPenyetuju()
    {

        return $this->where(['id_kategori' => 4])->Where(['penyetuju' => user_id()])->countAllResults();
    }

    public function getCountLainlainPembuat()
    {

        return $this->where(['id_kategori' => 4])->Where(['pembuat' => user_id()])->countAllResults();
    }

    public function getCountLainlainHead()
    {
        return $this->where(['pembuat' => user_id()])->orWhere(['penyetuju' => user_id()])->where(['id_kategori' => 4])->countAllResults();
    }



    public function getCountMonthlyDept($month, $year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
    }

    public function getTotalMonthlyDept($month, $year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
    }

    public function getTotalDept($month, $year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->orderBy('created_at', 'ASC')->countAllResults();
    }



    public function getCountYearlyDept($year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
    }

    public function getTotalYearlyDept($year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
    }

    public function getTotalDeptYear($year, $distribusi)
    {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['bagian' => $distribusi])->orderBy('created_at', 'ASC')->countAllResults();
    }



    public function getCountMonthlyUsers($month, $year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
        // }
    }

    public function getTotalMonthlyUsers($month, $year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
        // }
    }

    public function getTotalUsers($month, $year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->orderBy('created_at', 'ASC')->countAllResults();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('MONTH(created_at)', $month)->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->orderBy('created_at', 'ASC')->countAllResults();
        // }
    }



    public function getCountYearlyUser($year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->findAll();
        // }
    }

    public function getTotalYearlyUser($year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->groupBy('WEEK(created_at)')->orderBy('created_at', 'ASC')->countAllResults();
        // }
    }

    public function getTotalUserYear($year, $users)
    {
        // if (in_groups('users')) {
        return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['pembuat' => $users])->orderBy('created_at', 'ASC')->countAllResults();
        // } elseif (in_groups('supervisor')) {
        //     return $this->selectCount('id')->where('id_kategori', '4')->where('YEAR(created_at)', $year)->where(['penyetuju' => $users])->orderBy('created_at', 'ASC')->countAllResults();
        // }
    }
}
