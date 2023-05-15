<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid mb-5 justify-content-center">

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>

    <!-- Content Card -->
    <div class="card text-center shadow">
        <div id="contentQCP" class="bg-white rounded">
            <div class="table-responsive">
                <table class="table text-gray-900 my-auto">
                    <tbody>
                        <tr>
                            <td scope="col" rowspan="5" class="align-middle text-left pl-5 border-light border-right border-top-0">
                                <img src="/img/kalbe.png" width="150" height="60" alt="">
                            </td>
                            <td scope="col" rowspan="5" class="align-middle border-light border-right border-left border-top-0">
                                <h3 class="font-weight-bold my-auto">QCP Project Report</h3>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-right border-left border-top-0 font-weight-bold py-1">
                                CPR No.
                            </td>
                            <td scope="col" class="align-middle border-light border-left border-top-0 py-1">
                                <?php if (empty($facility['approved_at']) || empty($facility['penyetuju'])) : ?>
                                <?php else : ?>
                                    <?= $facility['cpr_no']; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                                PIC Project
                            </td>
                            <td scope="col" class="align-middle border-light border-left py-1">
                                <?= user()->fullname; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                                NIK
                            </td>
                            <td scope="col" class="align-middle border-light border-left py-1">
                                <?= user()->NIK; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                                Bagian
                            </td>
                            <td scope="col" class="align-middle border-light border-left py-1">
                                <?= $facility['nama_distribusi']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                                Bulan
                            </td>
                            <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                                <?= date('F', strtotime($facility['created_at'])); ?>
                            </td>
                            <td scope="col" colspan="2" rowspan="2" class="align-middle border-light border-bottom border-left py-1">
                                <h5 class="font-weight-bold text-gray-900 my-auto">NA</h5>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                                Category Project
                            </td>
                            <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                                <?php foreach ($kategori as $k) : ?>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" <?php if ($k['id'] == 2) : ?>checked<?php else : ?>disabled<?php endif ?> class="custom-control-input" id="<?= $k['id']; ?>">
                                        <label class="custom-control-label" for="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></label>
                                    </div>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                                Nama Project
                            </td>
                            <td scope="col" colspan="3" class="align-middle border-light border-bottom border-left py-1">
                                <?= $facility['nama_project']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                                Sasaran KPI
                            </td>
                            <td scope="col" colspan="3" class="align-middle border-light border-bottom border-left py-1">
                                <?= $facility['sasaran_kpi']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                                Start Project
                            </td>
                            <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                                <?= date('F Y', strtotime($facility['start'])); ?>
                            </td>
                            <td scope="col" class="align-middle border-light border-bottom border-left font-weight-bold py-1">
                                End Project
                            </td>
                            <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                                <?= date('F Y', strtotime($facility['end'])); ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php if ($facility['status'] == 'Returned' || $facility['status'] == 'Rejected') : ?>
                        <tfoot>
                            <tr>
                                <td class="border border-light border-left-0 align-middle">
                                    Alasan :
                                </td>
                                <td class="border border-light align-middle" style="max-width: 30rem;">
                                    <?= $facility['alasan']; ?>
                                </td>
                                <td colspan="2" rowspan="2" class="border border-light align-middle">
                                    <a href="/QCP/Building/FormEdit/<?= $facility['id']; ?>" class="btn btn-lg btn-warning rounded-sm">update <i class="fas fa-arrow-alt-circle-right"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-light border-left-0 align-middle">
                                    <?= $facility['status']; ?> pada :
                                </td>
                                <td class="border border-light align-middle">
                                    <?php if ($facility['status'] == 'Returned') : ?>
                                        <?= date('d F Y', strtotime($facility['returned_at'])); ?>
                                    <?php elseif ($facility['status'] == 'Rejected') : ?>
                                        <?= date('d F Y', strtotime($facility['rejected_at'])); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>
            </div>

            <div class="d-flex justify-content-around mb-5">

                <div class="container">
                    <h5 class="text-gray-900 font-weight-bold m-3 mt-5">Sebelum Perbaikan</h5>
                    <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                        <?= $facility['sebelum']; ?>
                    </p>
                </div>

                <div class="container">
                    <h5 class="text-gray-900 font-weight-bold m-3 mt-5">Solusi Perbaikan</h5>
                    <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                        <?= $facility['solusi']; ?>
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-around mb-5">

                <div class="container">
                    <h5 class="text-gray-900 font-weight-bold m-3 mt-5">Sesudah Perbaikan</h5>
                    <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                        <?= $facility['sesudah']; ?>
                    </p>
                </div>

                <div class="container">
                    <h5 class="text-gray-900 font-weight-bold m-3 mt-4">Hasil terukur yang didapat dan dampak QCDSMPE</h5>
                    <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                        <?= $facility['hasil']; ?>
                    </p>
                </div>
            </div>
            <div class="border-top">

                <h5 class="mt-4 text-gray-900 ">Lampiran Gambar : </h5>
                <div class="row my-5">
                    <?php $x = 1; ?>
                    <?php foreach ($foto_qcp as $foto) : ?>
                        <?php if ($foto['nama_foto'] == 'default.jpg') : ?>
                        <?php else : ?>
                            <div class="col-sm-3 d-flex flex-wrap align-items-center mx-auto d-block">
                                <div class="card border-0 col-sm-12">
                                    <img class="card-img-top img-fluid rounded p-0 m-0" style="object-fit: contain; height: 250px;" src="/img/<?= $foto['nama_foto'];  ?>" alt="Foto Trouble Shooting">
                                    <div class="card-block">
                                        <h4 class="mt-4 text-center card-title font-weight-bold text-gray-900">Gambar <?= $x++; ?>.</h4>
                                        <p class="card-text text-center text-gray-900"><?= $foto['keterangan'];  ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="table-responsive px-5 mb-5">
                <table class="table table-bordered text-gray-900 my-auto">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="font-weight-bold text-gray-900">Change Control</td>
                            <td colspan="2" rowspan="3" class="w-50 text-left">
                                <span class="font-weight-bold text-gray-900">Catatan : </span>
                                <span class=" text-gray-900"><?= $facility['catatan']; ?></span>
                            </td>
                            <td rowspan="3">
                                <span class="font-weight-bold text-gray-900">Dibuat Oleh</span>
                                <br>
                                <br>
                                <small class="font-weight-bold text-success"><?= date('d M Y', strtotime($facility['created_at'])); ?></small>
                                <br>
                                <small class="font-weight-bold text-success"><?= date('H : i : s', strtotime($facility['created_at'])); ?></small>
                                <br>
                                <br>
                                <span class="font-weight-bold text-gray-900"><?= $facility['username']; ?></span>
                            </td>

                            <td rowspan="3">
                                <span class="font-weight-bold text-gray-900">Disetujui Oleh</span>
                                <?php if ($facility['status'] == 'Created' || $facility['status'] == 'Updated' || $facility['status'] == 'Returned' || $facility['status'] == 'Rejected') : ?>
                                    <br>
                                    <br>
                                    <br>
                                    <h4 class="font-weight-bold text-gray-900">NA</h4>
                                <?php else : ?>
                                    <br>
                                    <br>
                                    <small class="font-weight-bold text-success"><?= date('d M Y', strtotime($facility['approved_at'])); ?></small>
                                    <br>
                                    <small class="font-weight-bold text-success"><?= date('H : i : s', strtotime($facility['approved_at'])); ?></small>
                                    <br>
                                    <br>
                                    <span class="font-weight-bold text-gray-900"><?= $facility2['username']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <td>
                            <p><?= $facility['changecontrol']; ?></p>
                        </td>
                        <!-- <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($facility['changecontrol'] == 1) : ?>checked<?php else : ?>disabled<?php endif ?> id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">YA</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($facility['changecontrol'] == 0) : ?>checked<?php else : ?>disabled<?php endif ?> id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">TIDAK</label>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($facility['status'] == 'Approved') : ?>
            <div class="col-auto my-auto">
                <button id="downloadQCP" class="download-button mb-5">
                    <div class="docs"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line y2="13" x2="8" y1="13" x1="16"></line>
                            <line y2="17" x2="8" y1="17" x1="16"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg> Download .PNG</div>
                    <div class="download">
                        <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line y2="3" x2="12" y1="15" x1="12"></line>
                        </svg>
                    </div>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>