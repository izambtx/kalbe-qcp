<?php

namespace App\Controllers;

use App\Controllers;
use Config\Services;
use Myth\Auth\Entities\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\KategoriModel;
use App\Models\DepartmentModel;
use App\Models\BuildingModel;
use App\Models\FotoQCPModel;


class BuildingCreator extends BaseController
{
    protected $db, $builder, $usersModel;
    protected $kategoriModel;
    protected $departmentModel;
    protected $buildingModel;
    protected $fotoqcpModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('qcp');
        $this->kategoriModel = new KategoriModel();
        $this->departmentModel = new DepartmentModel();
        $this->buildingModel = new BuildingModel();
        $this->fotoqcpModel = new FotoQCPModel();
    }

    public function index()
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
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', '1');
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
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', 1);
            $status = ['Created', 'Updated'];
            $this->builder->whereIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        } else {

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', '1');
            $status = ['Created', 'Updated'];
            $this->builder->whereIn('qcp.status', $status);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $query = $this->builder->get($limit, $offset);

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', 1);
            $status = ['Created', 'Updated'];
            $this->builder->whereIn('qcp.status', $status);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        }
        $data = [
            'title' => 'List Data QCP Building',
            'kategori' => $this->kategoriModel->getKategori(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
        ];

        $data['building'] = $query->getResultArray();

        return view('/QCP/Creator/List/Building', $data);
    }

    public function detail($id = false)
    {

        $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
        $this->builder->join('users', 'users.id = qcp.pembuat');
        $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
        $this->builder->where('qcp.id', $id);
        $this->builder->orderBy('qcp.created_at', 'DESC');
        $query = $this->builder->get();

        $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
        $this->builder->join('users', 'users.id = qcp.penyetuju');
        $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
        $this->builder->where('qcp.id', $id);
        $this->builder->orderBy('qcp.created_at', 'DESC');
        $query2 = $this->builder->get();

        $data = [
            'title' => 'Detail QCP Building',
            'kategori' => $this->kategoriModel->getKategori(),
            'foto_qcp' => $this->db->table('foto_qcp')->getWhere(['id_qcp' => $id])->getResultArray(),
            'department' => $this->departmentModel->getDepartment()
        ];

        $data['building'] = $query->getRowArray();
        $data['building2'] = $query2->getRowArray();

        return view('/QCP/Creator/Detail/DetailsBuilding', $data);
    }

    public function create($id = false)
    {
        $data = [
            'title' => 'Create QCP Building',
            'kategori' => $this->kategoriModel->getKategori(),
            'department' => $this->departmentModel->getDepartment(),
            'countCPRno' => $this->buildingModel->getCprNoBuilding(),
            'inputFoto' => $this->request->getVar('jumlahFoto')
        ];

        return view('/QCP/Creator/Input/CreateBuilding', $data);
    }

    public function save($id = false)
    {

        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[qcp.nama_project]',
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.',
                    'is_unique' => 'maaf, {field} project sudah terdaftar.'
                ]
            ],
            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} kpinya terlebih dahulu.'
                ]
            ],
            'start' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.'
                ]
            ],
            'end' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.'
                ]
            ],
            'sebelum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'sesudah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'solusi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'hasil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} terukurnya terlebih dahulu.'
                ]
            ],
            'department' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih.'
                ]
            ]
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('/QCP/Building/FormCreate')->withInput()->with('validation', $validation);
        }

        $this->buildingModel->save([
            'id_kategori' => 1,
            'nama_project' => $this->request->getVar('nama'),
            'sasaran_kpi' => $this->request->getVar('sasaran'),
            'bagian' => $this->request->getVar('department'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
            'sebelum' => $this->request->getVar('sebelum'),
            'solusi' => $this->request->getVar('solusi'),
            'sesudah' => $this->request->getVar('sesudah'),
            'hasil' => $this->request->getVar('hasil'),
            'cpr_no' => $this->request->getVar('counterCPR'),
            'status' => 'Created',
            'pembuat' => user_id(),
            'changecontrol' => $this->request->getVar('changecontrol')
        ]);
        
        
        
        $id_qcp = $this->buildingModel->getInsertID();

        $jumlahFotonya = $this->request->getVar('jumlahFileFoto');

        // ambil gambar
        for ($i = 1; $i <= $jumlahFotonya; $i++) {
            $fileFoto[$i] = $this->request->getFile('foto_sebelum' . $i); //ini pake foto_sebelum karena name di inputnya emg gitu biar nyambung sama JS nya juga

            // apakah tidak ada gambar yang diupload
            if ($fileFoto[$i]->getError() == 4) {
                $namaFoto[$i] = 'default.jpg';
            } else {
                // pindahkan file ke folder img
                $fileFoto[$i]->move('img');
                // ambil nama file foto
                $namaFoto[$i] = $fileFoto[$i]->getName();
            }
        }

        for ($x = 1; $x <= $jumlahFotonya; $x++) {

            $keterangan = $this->request->getVar('ket_foto' . $x);
            $pembuat = user_id();
            $data = [
                'id_kategori' => '1',
                'id_qcp' => $id_qcp,
                'nama_foto'  => $namaFoto[$x],
                'keterangan'  => $keterangan,
                'pembuat'  => $pembuat
            ];
            $this->fotoqcpModel->save($data);
        }

        return redirect()->to('/QCP/Building')->with('pesan', 'Project Berhasil Ditambahkan');
    }

    public function updated()
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
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', '1');
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
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', 1);
            $status = ['Created', 'Updated'];
            $this->builder->whereNotIn('qcp.status', $status);
            $this->builder->like('qcp.nama_project', $keyword);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        } else {
            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', '1');
            $status = ['Created', 'Updated'];
            $this->builder->whereNotIn('qcp.status', $status);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $query = $this->builder->get($limit, $offset);

            $this->builder->select('qcp.*, distribusi.nama_distribusi, singkatan, users.username');
            $this->builder->join('users', 'users.id = qcp.pembuat');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->builder->join('distribusi', 'distribusi.id = qcp.bagian', 'distribusi.id = users.distribusi');
            $this->builder->where('qcp.pembuat', user()->id);
            $this->builder->where('qcp.id_kategori', 1);
            $status = ['Created', 'Updated'];
            $this->builder->whereNotIn('qcp.status', $status);
            $this->builder->orderBy('qcp.created_at', 'DESC');
            $total = $this->builder->countAllResults();
        }

        $data = [
            'title' => 'List Data QCP Building',
            'kategori' => $this->kategoriModel->getKategori(),
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
        ];

        $data['building'] = $query->getResultArray();

        return view('/QCP/Creator/List/UpdatedBuilding', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit QCP Building',
            'kategori' => $this->kategoriModel->getKategori(),
            'department' => $this->departmentModel->getDepartment(),
            'building' => $this->buildingModel->getBuilding($id),
            'inputFoto' => $this->request->getVar('jumlahFoto')
        ];

        return view('/QCP/Creator/Input/EditBuilding', $data);
    }

    public function update($id = false)
    {

        // CEK TEMA
        $namaLama = $this->buildingModel->getBuilding($id);
        if ($namaLama['nama_project'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[qcp.nama_project]';
        }

        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.',
                    'is_unique' => 'maaf, {field} project sudah terdaftar.'
                ]
            ],
            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} kpinya terlebih dahulu.'
                ]
            ],
            'start' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.'
                ]
            ],
            'end' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} projectnya terlebih dahulu.'
                ]
            ],
            'sebelum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'sesudah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'solusi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} perbaikannya terlebih dahulu.'
                ]
            ],
            'hasil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harap isi {field} terukurnya terlebih dahulu.'
                ]
            ],
            'department' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih.'
                ]
            ]
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('/QCP/Building/FormEdit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->buildingModel->save([
            'id' => $id,
            'id_kategori' => 1,
            'nama_project' => $this->request->getVar('nama'),
            'sasaran_kpi' => $this->request->getVar('sasaran'),
            'bagian' => $this->request->getVar('department'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
            'sebelum' => $this->request->getVar('sebelum'),
            'solusi' => $this->request->getVar('solusi'),
            'sesudah' => $this->request->getVar('sesudah'),
            'hasil' => $this->request->getVar('hasil'),
            'status' => 'Updated',
            'pembuat' => user_id()
        ]);

        return redirect()->to('/QCP/Building')->with('pesan', 'Project Berhasil Dirubah');
    }

}
