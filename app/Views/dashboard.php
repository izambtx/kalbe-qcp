<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid mb-5 justify-content-center">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 ml-5 mb-3 text-gray-900">Hello <span class="font-weight-bold"><?= user()->fullname; ?></span>, it's good to see you again!</h1>
    </div>
    <!-- Content Row -->
    <div class="row mb-5">

        <div class="col-sm-4">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Building
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Total : <?php if (in_groups('senior')) : ?> <?= $countBuildingHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countBuildingDouble; ?> <?php else : ?> <?= $countBuildingUser; ?> <?php endif; ?></div>
                            </div>
                            <div class="col-sm-2 text-primary">
                                <h2 class="my-auto"><i class="fas fa-building"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Facility
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Total : <?php if (in_groups('senior')) : ?> <?= $countFacilityHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countFacilityDouble; ?> <?php else : ?> <?= $countFacilityUser; ?> <?php endif; ?></div>
                            </div>
                            <div class="col-sm-2 text-success">
                                <h2 class="my-auto"><i class="fas fa-home"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Utility
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Total : <?php if (in_groups('senior')) : ?> <?= $countUtilityHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countUtilityDouble; ?> <?php else : ?> <?= $countUtilityUser; ?> <?php endif; ?></div>
                            </div>
                            <div class="col-sm-2 text-danger">
                                <h2 class="my-auto"><i class="fas fa-city"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Returned Card Example -->
            <div class="col mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Lain-Lain
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Total : <?php if (in_groups('senior')) : ?> <?= $countLainHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countLainDouble; ?> <?php else : ?> <?= $countLainUser; ?> <?php endif; ?></div>
                            </div>
                            <div class="col-sm-2 text-dark">
                                <h2 class="my-auto"><i class="fas fa-warehouse"></i></h2>
                            </div>
                            <!-- </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-dark" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-2">
                                <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                <lord-icon src="https://cdn.lordicon.com/jefnhaqh.json" trigger="hover" colors="outline:#121331,primary:#e8b730,secondary:#e8b730,tertiary:#e4e4e4" style="width:50px;height:50px">
                                </lord-icon>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">

            <!-- Pie Chart -->
            <div class="col my-0" style="border-radius: 50px;">
                <div class="card shadow rounded">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header rounded-top-lg border-bottom-0 pt-4 d-flex flex-row align-items-center justify-content-between bg-white">
                        <?php if (in_groups('admin')) : ?>
                            <h6 class="m-0 font-weight-bold text-gray-900">All QCP Per Category</h6>
                        <?php else : ?>
                            <h6 class="m-0 font-weight-bold text-gray-900">QCP <span class="text-success"><?= user()->username; ?></span> Per Category </h6>
                        <?php endif; ?>
                        <div class="dropdown no-arrow">
                            <a href="<?php base_url() ?>/opl/export" class="download-button dropdown-toggle">
                                <div class="docs py-0"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line y2="13" x2="8" y1="13" x1="16"></line>
                                        <line y2="17" x2="8" y1="17" x1="16"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    Download .XLSX</div>
                                <div class="download">
                                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line y2="3" x2="12" y1="15" x1="12"></line>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body rounded-bottom-lg">
                        <div class="chart-pie py-2 my-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-5 mb-2 text-center small">
                            <span class="mr-2 text-dark">
                                <i class="fas fa-circle text-primary"></i> Building
                            </span>
                            <span class="mr-2 text-dark">
                                <i class="fas fa-circle text-success"></i> Facility
                            </span>
                            <span class="mr-2 text-dark">
                                <i class="fas fa-circle text-danger"></i> Utility
                            </span>
                            <span class="mr-2 text-dark">
                                <i class="fas fa-circle text-dark"></i> Lain-Lain
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white rounded">
        <div class="col-sm-12 d-flex justify-content-center py-3">
            <form action="" method="post" class="form-inline bg-white pt-3 rounded">
                <div class="input-group mb-3 col-sm-3">
                    <?php
                    $selected_month = date('m'); //current month

                    echo '<select class="custom-select text-gray-900 font-weight-bold" id="month" name="month">' . "\n";
                    echo '<option selected disabled hidden>Choose Month</option>' . "\n";
                    for ($i_month = 1; $i_month <= 12; $i_month++) {
                        $selected = ($selected_month == $i_month ? ' selected' : '');
                        echo '<option value="' . $i_month . '"' . '>' . date('F', mktime(0, 0, 0, $i_month)) . '</option>' . "\n";
                    }
                    echo '</select>' . "\n";
                    ?>
                </div>
                <div class="input-group mb-3 col-sm-3">
                    <?php
                    $year_start  = 2023;
                    $year_end = date('Y'); // current Year
                    $user_selected_year = 1992; // user date of birth year

                    echo '<select class="custom-select text-gray-900 font-weight-bold" id="year" name="year">' . "\n";
                    echo '<option selected disabled hidden value="$year_end">Choose Year</option>' . "\n";
                    for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                        $selected = ($user_selected_year == $i_year ? ' selected' : '');
                        echo '<option value="' . $i_year . '"' . '>' . $i_year . '</option>' . "\n";
                    }
                    echo '</select>' . "\n";
                    ?>
                </div>
                <div class="input-group mb-3 col-sm-3">
                    <select class="custom-select text-gray-900 font-weight-bold" id="distribusi" name="distribusi">
                        <option selected disabled hidden>Choose Department</option>
                        <?php foreach ($distribusiList as $d) : ?>
                            <option value="<?= $d['id'];  ?>" <?= old('distribusi') == $d['id'] ? 'selected' : '' ?>><?= $d['nama_distribusi'];  ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3 col-sm-3 pr-3 p-0">
                    <h5 class="mr-2 pr-1 text-center my-auto font-weight-bold text-gray-900">OR</h5>
                    <select class="custom-select text-gray-900 font-weight-bold rounded-sm" id="users" name="users">
                        <option selected hidden disabled>Choose User</option>
                        <?php foreach ($usersList as $uL) : ?>
                            <option value="<?= $uL['id'];  ?>"><?= $uL['fullname'];  ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary ml-3"><i class="fas fa-search-plus"></i></button>
                </div>

                <?php if ($month || $year || $distribusi || $users) : ?>
                    <div class="ml-4 mb-3">
                        <h6 class="text-gray-900 font-weight-bold">Filter Tags</h6>
                        <div class="form-inline border border-primary ml-2 pl-2 rounded">
                            <?php if (empty($month)) : ?>
                            <?php else : ?>
                                <div class="input-group my-2 mr-2 bg-light text-primary text-center font-weight-bold form-control rounded-sm border border-abu">
                                    <span class="mt-1 align-middle">
                                        <i class="fas fa-tags mr-2"></i><?= date("F", mktime(0, 0, 0, $month)); ?><i class="fas fa-times pl-2" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <?php if (empty($year)) : ?>
                            <?php else : ?>
                                <div class="input-group my-2 mr-2 bg-light text-primary text-center font-weight-bold form-control rounded-sm border border-abu">
                                    <span class="mt-1 align-middle">
                                        <i class="fas fa-tags mr-2"></i><?= $year; ?><i class="fas fa-times pl-2" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <?php if (empty($distribusi)) : ?>
                            <?php else : ?>
                                <div class="input-group my-2 mr-2 bg-light text-primary text-center font-weight-bold form-control rounded-sm border border-abu">
                                    <span class="mt-1 align-middle">
                                        <i class="fas fa-tags mr-2"></i><?= $distribusiNama['nama_distribusi']; ?><i class="fas fa-times pl-2" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <?php if (empty($users)) : ?>
                            <?php else : ?>
                                <div class="input-group my-2 mr-2 bg-light text-primary text-center font-weight-bold form-control rounded-sm border border-abu">
                                    <span class="mt-1 align-middle">
                                        <i class="fas fa-tags mr-2"></i><?= $usersNama['fullname']; ?><i class="fas fa-times pl-2" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <!-- Area / Bar Chart -->
        <div class="col mt-3 mx-3">
            <div class="card mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header rounded-lg bg-white border-bottom-0 py-4 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="font-weight-bold text-gray-900">Laporan Grafik QCP</h6>
                    <div class="dropdown no-arrow">
                        <?php
                        $request = \Config\Services::request();
                        $filter = $request->getVar('filter');
                        $distribusi = $request->getVar('distribusi');
                        $users = $request->getVar('users');
                        $month = $request->getVar('month');
                        $year = $request->getVar('year');

                        if ($month && $year && $users) {

                            $param = "?month=" . $month . "&year=" . $year . "&users=" . $users;
                        } elseif ($month && $year && $distribusi) {

                            $param = "?month=" . $month . "&year=" . $year . "&distribusi=" . $distribusi;
                        } elseif ($year && $distribusi) {

                            $param = "?year=" . $year . "&distribusi=" . $distribusi;
                        } elseif ($year && $users) {

                            $param = "?year=" . $year . "&users=" . $users;
                        }
                        ?>
                        <?php if ($countTB == 0 && $countTF == 0  && $countTU == 0  && $countTL == 0) : ?>
                            <button type="button" id="tombolError" class="download-button dropdown-toggle">
                                <div class="docs">
                                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line y2="13" x2="8" y1="13" x1="16"></line>
                                        <line y2="17" x2="8" y1="17" x1="16"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    Download .XLSX
                                </div>
                                <div class="download">
                                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line y2="3" x2="12" y1="15" x1="12"></line>
                                    </svg>
                                </div>
                            </button>
                        <?php else : ?>
                            <a href="<?php base_url() ?>/opl/export<?= $param; ?>" class="download-button">
                                <div class="docs"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line y2="13" x2="8" y1="13" x1="16"></line>
                                        <line y2="17" x2="8" y1="17" x1="16"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>Download .XLSX</div>
                                <div class="download">
                                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line y2="3" x2="12" y1="15" x1="12"></line>
                                    </svg>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body mb-1">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2 text-dark">
                            <i class="fas fa-circle text-primary"></i> Building
                        </span>
                        <span class="mr-2 text-dark">
                            <i class="fas fa-circle text-success"></i> Facility
                        </span>
                        <span class="mr-2 text-dark">
                            <i class="fas fa-circle text-danger"></i> Utility
                        </span>
                        <span class="mr-2 text-dark">
                            <i class="fas fa-circle text-dark"></i> Lain-Lain
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input id="CBU" type="hidden" value="<?php if (in_groups('senior')) : ?> <?= $countBuildingHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countBuildingDouble; ?> <?php else : ?> <?= $countBuildingUser; ?> <?php endif; ?>"></input>
<input id="CFU" type="hidden" value="<?php if (in_groups('senior')) : ?> <?= $countFacilityHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countFacilityDouble; ?> <?php else : ?> <?= $countFacilityUser; ?> <?php endif; ?>"></input>
<input id="CUU" type="hidden" value="<?php if (in_groups('senior')) : ?> <?= $countUtilityHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countUtilityDouble; ?> <?php else : ?> <?= $countUtilityUser; ?> <?php endif; ?>"></input>
<input id="CLLU" type="hidden" value="<?php if (in_groups('senior')) : ?> <?= $countLainHead; ?> <?php elseif (in_groups('supervisor')) : ?> <?= $countLainDouble; ?> <?php else : ?> <?= $countLainUser; ?> <?php endif; ?>"></input>

<!-- BUAT CHART AREA BUILDING -->

<?php $i = 1; ?>
<?php if ($countTMB == 0) : ?>

    <input id="qcpMB1" type="hidden" value="0"></input>
    <input id="qcpMB2" type="hidden" value="0"></input>
    <input id="qcpMB3" type="hidden" value="0"></input>
    <input id="qcpMB4" type="hidden" value="0"></input>
    <input id="qcpMB5" type="hidden" value="0"></input>

<?php elseif ($countTMB == 1) : ?>

    <?php foreach ($countMB as $CMB) : ?>
        <input id="qcpMB<?= $i++; ?>" type="hidden" value="<?= $CMB['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMB2" type="hidden" value="0"></input>
    <input id="qcpMB3" type="hidden" value="0"></input>
    <input id="qcpMB4" type="hidden" value="0"></input>
    <input id="qcpMB5" type="hidden" value="0"></input>

<?php elseif ($countTMB == 2) : ?>

    <?php foreach ($countMB as $CMB) : ?>
        <input id="qcpMB<?= $i++; ?>" type="hidden" value="<?= $CMB['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMB3" type="hidden" value="0"></input>
    <input id="qcpMB4" type="hidden" value="0"></input>
    <input id="qcpMB5" type="hidden" value="0"></input>

<?php elseif ($countTMB == 3) : ?>

    <?php foreach ($countMB as $CMB) : ?>
        <input id="qcpMB<?= $i++; ?>" type="hidden" value="<?= $CMB['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMB4" type="hidden" value="0"></input>
    <input id="qcpMB5" type="hidden" value="0"></input>

<?php elseif ($countTMB == 4) : ?>

    <?php foreach ($countMB as $CMB) : ?>
        <input id="qcpMB<?= $i++; ?>" type="hidden" value="<?= $CMB['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMB5" type="hidden" value="0"></input>

<?php elseif ($countTMB == 5) : ?>

    <?php foreach ($countMB as $CMB) : ?>
        <input id="qcpMB<?= $i++; ?>" type="hidden" value="<?= $CMB['id']; ?>"></input>
    <?php endforeach; ?>
<?php endif; ?>

<!-- BUAT CHART AREA FACILITY -->

<?php $i = 1; ?>
<?php if ($countTMF == 0) : ?>

    <input id="qcpMF1" type="hidden" value="0"></input>
    <input id="qcpMF2" type="hidden" value="0"></input>
    <input id="qcpMF3" type="hidden" value="0"></input>
    <input id="qcpMF4" type="hidden" value="0"></input>
    <input id="qcpMF5" type="hidden" value="0"></input>

<?php elseif ($countTMF == 1) : ?>

    <?php foreach ($countMF as $CMF) : ?>
        <input id="qcpMF<?= $i++; ?>" type="hidden" value="<?= $CMF['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMF2" type="hidden" value="0"></input>
    <input id="qcpMF3" type="hidden" value="0"></input>
    <input id="qcpMF4" type="hidden" value="0"></input>
    <input id="qcpMF5" type="hidden" value="0"></input>

<?php elseif ($countTMF == 2) : ?>

    <?php foreach ($countMF as $CMF) : ?>
        <input id="qcpMF<?= $i++; ?>" type="hidden" value="<?= $CMF['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMF3" type="hidden" value="0"></input>
    <input id="qcpMF4" type="hidden" value="0"></input>
    <input id="qcpMF5" type="hidden" value="0"></input>

<?php elseif ($countTMF == 3) : ?>

    <?php foreach ($countMF as $CMF) : ?>
        <input id="qcpMF<?= $i++; ?>" type="hidden" value="<?= $CMF['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMF4" type="hidden" value="0"></input>
    <input id="qcpMF5" type="hidden" value="0"></input>

<?php elseif ($countTMF == 4) : ?>

    <?php foreach ($countMF as $CMF) : ?>
        <input id="qcpMF<?= $i++; ?>" type="hidden" value="<?= $CMF['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMF5" type="hidden" value="0"></input>

<?php elseif ($countTMF == 5) : ?>
    <?php foreach ($countMF as $CMF) : ?>
        <input id="qcpMF<?= $i++; ?>" type="hidden" value="<?= $CMF['id']; ?>"></input>
    <?php endforeach; ?>
<?php endif; ?>

<!-- BUAT CHART AREA UTILITY -->

<?php $i = 1; ?>
<?php if ($countTMU == 0) : ?>
    <input id="qcpMU1" type="hidden" value="0"></input>
    <input id="qcpMU2" type="hidden" value="0"></input>
    <input id="qcpMU3" type="hidden" value="0"></input>
    <input id="qcpMU4" type="hidden" value="0"></input>
    <input id="qcpMU5" type="hidden" value="0"></input>
<?php elseif ($countTMU == 1) : ?>

    <?php foreach ($countMU as $CMU) : ?>
        <input id="qcpMU<?= $i++; ?>" type="hidden" value="<?= $CMU['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMU2" type="hidden" value="0"></input>
    <input id="qcpMU3" type="hidden" value="0"></input>
    <input id="qcpMU4" type="hidden" value="0"></input>
    <input id="qcpMU5" type="hidden" value="0"></input>

<?php elseif ($countTMU == 2) : ?>

    <?php foreach ($countMU as $CMU) : ?>
        <input id="qcpMU<?= $i++; ?>" type="hidden" value="<?= $CMU['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMU3" type="hidden" value="0"></input>
    <input id="qcpMU4" type="hidden" value="0"></input>
    <input id="qcpMU5" type="hidden" value="0"></input>

<?php elseif ($countTMU == 3) : ?>

    <?php foreach ($countMU as $CMU) : ?>
        <input id="qcpMU<?= $i++; ?>" type="hidden" value="<?= $CMU['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMU4" type="hidden" value="0"></input>
    <input id="qcpMU5" type="hidden" value="0"></input>

<?php elseif ($countTMU == 4) : ?>

    <?php foreach ($countMU as $CMU) : ?>
        <input id="qcpMU<?= $i++; ?>" type="hidden" value="<?= $CMU['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpMU5" type="hidden" value="0"></input>

<?php elseif ($countTMU == 5) : ?>

    <?php foreach ($countMU as $CMU) : ?>
        <input id="qcpMU<?= $i++; ?>" type="hidden" value="<?= $CMU['id']; ?>"></input>
    <?php endforeach; ?>
<?php endif; ?>

<!-- BUAT CHART AREA LAIN-LAIN -->

<?php $i = 1; ?>
<?php if ($countTML == 0) : ?>

    <input id="qcpML1" type="hidden" value="0"></input>
    <input id="qcpML2" type="hidden" value="0"></input>
    <input id="qcpML3" type="hidden" value="0"></input>
    <input id="qcpML4" type="hidden" value="0"></input>
    <input id="qcpML5" type="hidden" value="0"></input>

<?php elseif ($countTML == 1) : ?>

    <?php foreach ($countML as $CML) : ?>
        <input id="qcpML<?= $i++; ?>" type="hidden" value="<?= $CML['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpML2" type="hidden" value="0"></input>
    <input id="qcpML3" type="hidden" value="0"></input>
    <input id="qcpML4" type="hidden" value="0"></input>
    <input id="qcpML5" type="hidden" value="0"></input>

<?php elseif ($countTML == 2) : ?>

    <?php foreach ($countML as $CML) : ?>
        <input id="qcpML<?= $i++; ?>" type="hidden" value="<?= $CML['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpML3" type="hidden" value="0"></input>
    <input id="qcpML4" type="hidden" value="0"></input>
    <input id="qcpML5" type="hidden" value="0"></input>

<?php elseif ($countTML == 3) : ?>

    <?php foreach ($countML as $CML) : ?>
        <input id="qcpML<?= $i++; ?>" type="hidden" value="<?= $CML['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpML4" type="hidden" value="0"></input>
    <input id="qcpML5" type="hidden" value="0"></input>

<?php elseif ($countTML == 4) : ?>

    <?php foreach ($countML as $CML) : ?>
        <input id="qcpML<?= $i++; ?>" type="hidden" value="<?= $CML['id']; ?>"></input>
    <?php endforeach; ?>
    <input id="qcpML5" type="hidden" value="0"></input>

<?php elseif ($countTML == 5) : ?>

    <?php foreach ($countML as $CML) : ?>
        <input id="qcpML<?= $i++; ?>" type="hidden" value="<?= $CML['id']; ?>"></input>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->endSection(); ?>