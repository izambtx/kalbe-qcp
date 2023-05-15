<?php

namespace App\Controllers;

use App\Controllers;
use Config\Services;
use App\Models\UsersModel;
use Myth\Auth\Entities\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\KategoriModel;
use App\Models\DepartmentModel;
use App\Models\BuildingModel;
use App\Models\FacilityModel;
use App\Models\UtilityModel;
use App\Models\LainlainModel;

class Users extends BaseController
{
    protected $db, $builder, $usersModel;
    protected $kategoriModel;
    protected $departmentModel;
    protected $buildingModel;
    protected $facilityModel;
    protected $utilityModel;
    protected $lainlainModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->kategoriModel = new KategoriModel();
        $this->usersModel = new UsersModel();
        $this->departmentModel = new DepartmentModel();
        $this->buildingModel = new BuildingModel();
        $this->facilityModel = new FacilityModel();
        $this->utilityModel = new UtilityModel();
        $this->lainlainModel = new LainlainModel();
    }

    public function index()
    {

        $distribusi = $this->request->getVar('distribusi');
        $users = $this->request->getVar('users');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');

        $countBuildingPenyetuju = $this->buildingModel->getCountBuildingPenyetuju();
        $countBuildingPembuat = $this->buildingModel->getCountBuildingPembuat();
        $countBuildingDouble = $countBuildingPenyetuju + $countBuildingPembuat;

        $countFacilityPenyetuju = $this->facilityModel->getCountFacilityPenyetuju();
        $countFacilityPembuat = $this->facilityModel->getCountFacilityPembuat();
        $countFacilityDouble = $countFacilityPenyetuju + $countFacilityPembuat;

        $countUtilityPenyetuju = $this->utilityModel->getCountUtilityPenyetuju();
        $countUtilityPembuat = $this->utilityModel->getCountUtilityPembuat();
        $countUtilityDouble = $countUtilityPenyetuju + $countUtilityPembuat;

        $countLainPenyetuju = $this->lainlainModel->getCountLainLainPenyetuju();
        $countLainPembuat = $this->lainlainModel->getCountLainLainPembuat();
        $countLainDouble = $countLainPenyetuju + $countLainPembuat;

        $data = [
            'title' => 'Dashboard',
            'countBuildingUser' => $this->buildingModel->getCountBuilding(),
            'countFacilityUser' => $this->facilityModel->getCountFacility(),
            'countUtilityUser' => $this->utilityModel->getCountUtility(),
            'countLainUser' => $this->lainlainModel->getCountLainlain(),
            'countBuildingHead' => $this->buildingModel->getCountBuildingHead(),
            'countFacilityHead' => $this->facilityModel->getCountFacilityHead(),
            'countUtilityHead' => $this->utilityModel->getCountUtilityHead(),
            'countLainHead' => $this->lainlainModel->getCountLainlainHead(),
            'countBuildingDouble' => $countBuildingDouble,
            'countFacilityDouble' => $countFacilityDouble,
            'countUtilityDouble' => $countUtilityDouble,
            'countLainDouble' => $countLainDouble,
            'distribusiNama' => $this->departmentModel->getDepartment($distribusi),
            'distribusiList' => $this->departmentModel->getDepartment(),
            'distribusi' => $distribusi,
            'month' => $month,
            'year' => $year,
            'usersNama' => $this->usersModel->getUsers($users),
            'usersList' => $this->usersModel->getUsers(),
            'users' => $users,
        ];
        if ($distribusi && $month && $year) {
            $data['countMB'] = $this->buildingModel->getCountMonthlyDept($month, $year, $distribusi);
            $data['countMF'] = $this->facilityModel->getCountMonthlyDept($month, $year, $distribusi);
            $data['countMU'] = $this->utilityModel->getCountMonthlyDept($month, $year, $distribusi);
            $data['countML'] = $this->lainlainModel->getCountMonthlyDept($month, $year, $distribusi);
            $data['countTMB'] = $this->buildingModel->getTotalMonthlyDept($month, $year, $distribusi);
            $data['countTMF'] = $this->facilityModel->getTotalMonthlyDept($month, $year, $distribusi);
            $data['countTMU'] = $this->utilityModel->getTotalMonthlyDept($month, $year, $distribusi);
            $data['countTML'] = $this->lainlainModel->getTotalMonthlyDept($month, $year, $distribusi);
            $data['countTB'] = $this->buildingModel->getTotalDept($month, $year, $distribusi);
            $data['countTF'] = $this->facilityModel->getTotalDept($month, $year, $distribusi);
            $data['countTU'] = $this->utilityModel->getTotalDept($month, $year, $distribusi);
            $data['countTL'] = $this->lainlainModel->getTotalDept($month, $year, $distribusi);
        } elseif ($users && $month && $year) {
            $data['countMB'] = $this->buildingModel->getCountMonthlyUsers($month, $year, $users);
            $data['countMF'] = $this->facilityModel->getCountMonthlyUsers($month, $year, $users);
            $data['countMU'] = $this->utilityModel->getCountMonthlyUsers($month, $year, $users);
            $data['countML'] = $this->lainlainModel->getCountMonthlyUsers($month, $year, $users);
            $data['countTMB'] = $this->buildingModel->getTotalMonthlyUsers($month, $year, $users);
            $data['countTMF'] = $this->facilityModel->getTotalMonthlyUsers($month, $year, $users);
            $data['countTMU'] = $this->utilityModel->getTotalMonthlyUsers($month, $year, $users);
            $data['countTML'] = $this->lainlainModel->getTotalMonthlyUsers($month, $year, $users);
            $data['countTB'] = $this->buildingModel->getTotalUsers($month, $year, $users);
            $data['countTF'] = $this->facilityModel->getTotalUsers($month, $year, $users);
            $data['countTU'] = $this->utilityModel->getTotalUsers($month, $year, $users);
            $data['countTL'] = $this->lainlainModel->getTotalUsers($month, $year, $users);
        } elseif ($distribusi && $year) {
            $data['countMB'] = $this->buildingModel->getCountYearlyDept($year, $distribusi);
            $data['countMF'] = $this->facilityModel->getCountYearlyDept($year, $distribusi);
            $data['countMU'] = $this->utilityModel->getCountYearlyDept($year, $distribusi);
            $data['countML'] = $this->lainlainModel->getCountYearlyDept($year, $distribusi);
            $data['countTMB'] = $this->buildingModel->getTotalYearlyDept($year, $distribusi);
            $data['countTMF'] = $this->facilityModel->getTotalYearlyDept($year, $distribusi);
            $data['countTMU'] = $this->utilityModel->getTotalYearlyDept($year, $distribusi);
            $data['countTML'] = $this->lainlainModel->getTotalYearlyDept($year, $distribusi);
            $data['countTB'] = $this->buildingModel->getTotalDeptYear($year, $distribusi);
            $data['countTF'] = $this->facilityModel->getTotalDeptYear($year, $distribusi);
            $data['countTU'] = $this->utilityModel->getTotalDeptYear($year, $distribusi);
            $data['countTL'] = $this->lainlainModel->getTotalDeptYear($year, $distribusi);
        } elseif ($users && $year) {
            $data['countMB'] = $this->buildingModel->getCountYearlyUser($year, $users);
            $data['countMF'] = $this->facilityModel->getCountYearlyUser($year, $users);
            $data['countMU'] = $this->utilityModel->getCountYearlyUser($year, $users);
            $data['countML'] = $this->lainlainModel->getCountYearlyUser($year, $users);
            $data['countTMB'] = $this->buildingModel->getTotalYearlyUser($year, $users);
            $data['countTMF'] = $this->facilityModel->getTotalYearlyUser($year, $users);
            $data['countTMU'] = $this->utilityModel->getTotalYearlyUser($year, $users);
            $data['countTML'] = $this->lainlainModel->getTotalYearlyUser($year, $users);
            $data['countTB'] = $this->buildingModel->getTotalUserYear($year, $users);
            $data['countTF'] = $this->facilityModel->getTotalUserYear($year, $users);
            $data['countTU'] = $this->utilityModel->getTotalUserYear($year, $users);
            $data['countTL'] = $this->lainlainModel->getTotalUserYear($year, $users);
        } else {
            $data['countMB'] = 0;
            $data['countMF'] = 0;
            $data['countMU'] = 0;
            $data['countML'] = 0;
            $data['countTMB'] = 0;
            $data['countTMF'] = 0;
            $data['countTMU'] = 0;
            $data['countTML'] = 0;
            $data['countTB'] = 0;
            $data['countTF'] = 0;
            $data['countTU'] = 0;
            $data['countTL'] = 0;
        }


        return view('dashboard', $data);
    }

    public function view_profile()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('user/index', $data);
    }

    public function changePassword()
    {

        $data = [
            'title' => 'Change User Password',
        ];
        return view('auth/password', $data);
    }

    public function updatePassword()
    {

        //Rules for the update password form
        $rules = [
            'old-password' => [
                // 'rules'  => 'required|checkOldPasswords',
                'rules'  => 'required',
                'errors' => [
                    // 'checkOldPasswords' => 'Password Lama Tidak Sesuai',
                    'required' => 'Password Lama Harus Diisi',
                ]
            ],
            'new-password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password Baru Harus Diisi',

                ]
            ],
            'password' => [
                'rules'  => 'required|matches[new-password]',
                'errors' => [
                    'required' => 'Konfirmasi Password Baru Harus Diisi',
                    'matches' => 'Password Tidak Sesuai Dengan Password Baru'
                ]
            ],
        ];

        if ($this->request->getMethod() === 'post' && $this->validate($rules)) {

            //Create new instance of the MythAuth UserModel
            $users = model(UserModel::class);

            //Get the id of the current user
            $user_id = user_id();

            //Create new user entity
            $entity = new User();

            //Get current password from input field
            $newPassword = $this->request->getVar('password');

            //Hash password using the "setPassword" function of the User entity
            $entity->setPassword($newPassword);

            //Save the hashed password in the variable "hash"
            $hash  = $entity->password_hash;

            //update the current users password_hash in the database with the new hashed password.
            $users->update($user_id, ['password_hash' => $hash]);

            //Return back with success message
            return redirect()->to('/change-password')->with('pesan', "Password Has Been Updated");
        } else {
            $validation = $this->validator->listErrors();
            //Return with errors
            return redirect()->to('/change-password')->withInput()->with('validation', $validation);
        }
    }

    public function export()
    {
        $this->builder = $this->db->table('qcp');

        $distribusi = $this->request->getVar('distribusi');
        $users = $this->request->getVar('users');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');


        if ($month && $year && $users) {
            if (in_groups('user')) {
                $query = $this->db->table('qcp')->select('qcp.*, distribusi.nama_distribusi, users.fullname, kategori.nama_kategori')->join('kategori', 'kategori.id = qcp.id_kategori')->join('users', 'users.id = qcp.pembuat')->join('distribusi', 'distribusi.id = qcp.bagian')->where('MONTH(qcp.created_at)', $month)->where('YEAR(qcp.created_at)', $year)->where(['pembuat' => $users])->get();
            } elseif (in_groups('supervisor')) {
                $query = $this->db->table('qcp')->select('qcp.*, distribusi.nama_distribusi, users.fullname, kategori.nama_kategori')->join('kategori', 'kategori.id = qcp.id_kategori')->join('users', 'users.id = qcp.penyetuju')->join('distribusi', 'distribusi.id = qcp.bagian')->where('MONTH(qcp.created_at)', $month)->where('YEAR(qcp.created_at)', $year)->where(['penyetuju' => $users])->get();
            }
        } elseif ($month && $year && $distribusi) {
            $query = $this->db->table('qcp')->select('qcp.*, distribusi.nama_distribusi, users.fullname, kategori.nama_kategori')->join('kategori', 'kategori.id = qcp.id_kategori')->join('users', 'users.id = qcp.pembuat')->join('distribusi', 'distribusi.id = qcp.bagian')->where('MONTH(qcp.created_at)', $month)->where('YEAR(qcp.created_at)', $year)->where('bagian', $distribusi)->get();
        } else {
            if (in_groups('user')) {
                $query = $this->db->table('qcp')->select('qcp.*, distribusi.nama_distribusi, users.fullname, kategori.nama_kategori')->join('kategori', 'kategori.id = qcp.id_kategori')->join('users', 'users.id = qcp.pembuat')->join('distribusi', 'distribusi.id = qcp.bagian')->where('pembuat', user_id())->get();
            } elseif (in_groups('supervisor')) {
                $query = $this->db->table('qcp')->select('qcp.*, distribusi.nama_distribusi, users.fullname, kategori.nama_kategori')->join('kategori', 'kategori.id = qcp.id_kategori')->join('users', 'users.id = qcp.penyetuju')->join('distribusi', 'distribusi.id = qcp.bagian')->where('penyetuju', user_id())->get();
            }
        }


        $qcp = $query->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kategori');
        $sheet->setCellValue('C1', 'CPR No.');
        $sheet->setCellValue('D1', 'Nama Project');
        $sheet->setCellValue('E1', 'Sasaran KPI');
        $sheet->setCellValue('F1', 'Bagian');
        $sheet->setCellValue('G1', 'Waktu Start');
        $sheet->setCellValue('H1', 'Waktu End');
        $sheet->setCellValue('I1', 'Sebelum Perbaikan');
        $sheet->setCellValue('J1', 'Sesudah Perbaikan');
        $sheet->setCellValue('K1', 'Solusi Perbaikan');
        $sheet->setCellValue('L1', 'Hasil Perbaikan');
        $sheet->setCellValue('M1', 'Pembuat');
        $sheet->setCellValue('N1', 'Status OPL');
        $sheet->setCellValue('O1', 'Tanggal Dibuat');

        $column = 2;
        foreach ($qcp as $QCP) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $QCP['nama_kategori']);
            if (stripos($QCP['cpr_no'], 'OPL') !== FALSE) {     // INI UNTUK CEK KAYAK OPERATOR LIKE YANG ADA DI SQL
                $sheet->setCellValue('C' . $column, $QCP['cpr_no']);
            } else {
                $sheet->setCellValue('C' . $column, 'NA');
            }
            $sheet->setCellValue('D' . $column, $QCP['nama_project']);
            $sheet->setCellValue('E' . $column, $QCP['sasaran_kpi']);
            $sheet->setCellValue('F' . $column, $QCP['nama_distribusi']);
            $sheet->setCellValue('G' . $column, $QCP['start']);
            $sheet->setCellValue('H' . $column, $QCP['end']);
            $sheet->setCellValue('I' . $column, $QCP['sebelum']);
            $sheet->setCellValue('J' . $column, $QCP['sesudah']);
            $sheet->setCellValue('K' . $column, $QCP['solusi']);
            $sheet->setCellValue('L' . $column, $QCP['hasil']);
            $sheet->setCellValue('M' . $column, $QCP['fullname']);
            $sheet->setCellValue('N' . $column, $QCP['status']);
            $sheet->setCellValue('O' . $column, $QCP['created_at']);
            $column++;
        }

        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('93bd84');

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=export-QCP.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();

        return redirect(base_url());
    }
}
