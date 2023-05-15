<?php

namespace App\Controllers;

use App\Controllers;
use Config\Services;
use Myth\Auth\Entities\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\KategoriModel;
use App\Models\DepartmentModel;
use App\Models\UtilityModel;

class UtilityApprover extends BaseController
{
    protected $db, $builder, $usersModel;
    protected $kategoriModel;
    protected $departmentModel;
    protected $utilityModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('qcp');
        $this->kategoriModel = new KategoriModel();
        $this->departmentModel = new DepartmentModel();
        $this->utilityModel = new UtilityModel();
    }

    public function indexApprover()
    {

        $page = 1;

        if ($this->request->getGet()) {
            $page = $this->request->getGet('page');
        }

        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $perPage = 15;

        $limit = $perPage;
        $offset = ($page - 1) * $perPage;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.bagian', user()->distribusi);
            $this->builder->where('qcp.id_kategori', '3');
            $status = ['Created', 'Updated'];
            $this->builder->whereIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $query = $this->builder->get($limit, $offset);

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.bagian', user()->distribusi);
            $this->builder->where('qcp.id_kategori', 3);
            $status = ['Created', 'Updated'];
            $this->builder->whereIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        } else {

            if (in_groups('senior')) {
                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('auth_groups_users.group_id', 3);
                $this->builder->where('qcp.id_kategori', '3');
                $status = ['Created', 'Updated'];
                $this->builder->whereIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $query = $this->builder->get($limit, $offset);

                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('auth_groups_users.group_id', 3);
                $this->builder->where('qcp.id_kategori', 3);
                $status = ['Created', 'Updated'];
                $this->builder->whereIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $total = $this->builder->countAllResults();
            } else {
                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('qcp.bagian', user()->distribusi);
                $this->builder->where('qcp.id_kategori', '3');
                $status = ['Created', 'Updated'];
                $this->builder->whereIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $query = $this->builder->get($limit, $offset);

                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('qcp.bagian', user()->distribusi);
                $this->builder->where('qcp.id_kategori', 3);
                $status = ['Created', 'Updated'];
                $this->builder->whereIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $total = $this->builder->countAllResults();
            }
        }

        $data = [
            'title' => 'List Data QCP Utility',
            'kategori' => $this->kategoriModel->getKategori(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
        ];

        $data['utility'] = $query->getResultArray();

        return view('/QCP/Approver/List/Utility', $data);
    }

    public function detailApprover($id = false)
    {

        $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username, users.fullname, users.NIK');
        $this->builder->join('users', 'users.id = qcp.pembuat');
        $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
        $this->builder->where('qcp.id', $id);
        $this->builder->orderBy('qcp.created_at', 'DESC');
        $query = $this->builder->get();

        $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username, users.fullname, users.NIK');
        $this->builder->join('users', 'users.id = qcp.penyetuju');
        $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
        $this->builder->where('qcp.id', $id);
        $this->builder->orderBy('qcp.created_at', 'DESC');
        $query2 = $this->builder->get();

        $data = [
            'title' => 'Detail QCP Utility',
            'kategori' => $this->kategoriModel->getKategori(),
            'department' => $this->departmentModel->getDepartment(),
            'foto_qcp' => $this->db->table('foto_qcp')->getWhere(['id_qcp' => $id])->getResultArray(),
            'session_id' => $id
        ];

        $data['utility'] = $query->getRowArray();
        $data['utility2'] = $query2->getRowArray();

        return view('/QCP/Approver/Detail/DetailsUtility', $data);
    }

    public function createApprover($id = false)
    {
        $data = [
            'title' => 'Create QCP Utility',
            'kategori' => $this->kategoriModel->getKategori(),
            'department' => $this->departmentModel->getDepartment(),
            'inputFoto' => $this->request->getVar('jumlahFoto')
        ];

        return view('/QCP/Approver/Input/CreateUtility', $data);
    }

    public function approve($id = false)
    {

        $cc = $this->request->getVar('cc');
        $cc_no = "NA";
        if ($cc == 'NA' || $cc == 'na' || $cc == '' || $cc == ' ' || $cc == 'tidak ada' || $cc == 'Tidak Ada' || $cc == 'Tidak ada') {
            $cc_no == 'NA';
        } else {
            $cc_no = $cc;
        }

        // dd($id);

        $this->utilityModel->save([
            'id' => $id,
            'cpr_no' => $this->request->getVar('nocpr'),
            'approved_at' => $this->request->getVar('tglapprove'),
            'changecontrol' => $cc_no,
            'status' => 'Approved',
            'penyetuju' => user_id()
        ]);

        return redirect()->to('/QCP/HistoryApprover/Utility')->with('pesan', 'Project Berhasil Disetujui');
    }

    public function return($id = false)
    {

        $this->utilityModel->save([
            'id' => $id,
            'alasan' => $this->request->getVar('alasanreturn'),
            'returned_at' => $this->request->getVar('tglreturn'),
            'status' => 'Returned',
            'returner' => user_id()
        ]);

        return redirect()->to('/QCP/HistoryApprover/Utility')->with('pesan', 'Project Berhasil Dikembalikan');
    }

    public function reject($id = false)
    {

        $this->utilityModel->save([
            'id' => $id,
            'alasan' => $this->request->getVar('alasanreject'),
            'rejected_at' => $this->request->getVar('tglreject'),
            'status' => 'Rejected',
            'rejecter' => user_id()
        ]);

        return redirect()->to('/QCP/HistoryApprover/Utility')->with('pesan', 'Project Berhasil Dibatalkan');
    }

    public function historyUtility()
    {

        $page = 1;

        if ($this->request->getGet()) {
            $page = $this->request->getGet('page');
        }

        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $perPage = 15;

        $limit = $perPage;
        $offset = ($page - 1) * $perPage;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.bagian', user()->distribusi);
            $this->builder->where('qcp.id_kategori', '3');
            $status = ['Created', 'Updated'];
            $this->builder->whereNotIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $query = $this->builder->get($limit, $offset);

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.bagian', user()->distribusi);
            $this->builder->where('qcp.id_kategori', 3);
            $status = ['Created', 'Updated'];
            $this->builder->whereNotIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        } else {

            if (in_groups('senior')) {
                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('auth_groups_users.group_id', 3);
                $this->builder->where('qcp.id_kategori', '3');
                $this->builder->where('qcp.penyetuju', 2022);
                $status = ['Created', 'Updated'];
                $this->builder->whereNotIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $query = $this->builder->get($limit, $offset);

                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('auth_groups_users.group_id', 3);
                $this->builder->where('qcp.id_kategori', 3);
                $this->builder->where('qcp.penyetuju', 2022);
                $status = ['Created', 'Updated'];
                $this->builder->whereNotIn('qcp.status', $status);
                $orang = [user()->id];
                $this->builder->whereNotIn('qcp.pembuat', $orang);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $total = $this->builder->countAllResults();
            } else {

                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('qcp.bagian', user()->distribusi);
                $this->builder->where('qcp.id_kategori', '3');
                $status = ['Created', 'Updated'];
                $this->builder->whereNotIn('qcp.status', $status);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $query = $this->builder->get($limit, $offset);

                $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
                $this->builder->join('users', 'users.id = qcp.pembuat');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
                $this->builder->where('qcp.bagian', user()->distribusi);
                $this->builder->where('qcp.id_kategori', 3);
                $status = ['Created', 'Updated'];
                $this->builder->whereNotIn('qcp.status', $status);
                $this->builder->orderBy('qcp.created_at', 'DESC');
                $total = $this->builder->countAllResults();
            }
        }

        $data = [
            'title' => 'List History QCP Utility',
            'kategori' => $this->kategoriModel->getKategori(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
        ];

        $data['utility'] = $query->getResultArray();

        return view('/QCP/Approver/List/Utility', $data);
    }
}
