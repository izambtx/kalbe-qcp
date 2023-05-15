<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid mb-5 justify-content-center">

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>

    <!-- Content Card -->
    <div class="card text-center shadow">
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
                            <?php if (empty($building['approved_at']) || empty($building['penyetuju'])) : ?>
                            <?php else : ?>
                                <?= $building['cpr_no']; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                            PIC Project
                        </td>
                        <td scope="col" class="align-middle border-light border-left py-1">
                            <?= $building['fullname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                            NIK
                        </td>
                        <td scope="col" class="align-middle border-light border-left py-1">
                            <?= $building['NIK']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-right border-left font-weight-bold py-1">
                            Bagian
                        </td>
                        <td scope="col" class="align-middle border-light border-left py-1">
                            <?= $building['nama_distribusi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                            Bulan
                        </td>
                        <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                            <?= date('F', strtotime($building['created_at'])); ?>
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
                                    <input type="checkbox" <?php if ($k['id'] == 1) : ?>checked<?php else : ?>disabled<?php endif ?> class="custom-control-input" id="<?= $k['id']; ?>">
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
                            <?= $building['nama_project']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                            Sasaran KPI
                        </td>
                        <td scope="col" colspan="3" class="align-middle border-light border-bottom border-left py-1">
                            <?= $building['sasaran_kpi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" class="align-middle border-light border-bottom border-right font-weight-bold py-1">
                            Start Project
                        </td>
                        <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                            <?= date('F Y', strtotime($building['start'])); ?>
                        </td>
                        <td scope="col" class="align-middle border-light border-bottom border-left font-weight-bold py-1">
                            End Project
                        </td>
                        <td scope="col" class="align-middle border-light border-bottom border-left py-1">
                            <?= date('F Y', strtotime($building['end'])); ?>
                        </td>
                    </tr>
                </tbody>
                <?php if ($building['status'] == 'Returned' || $building['status'] == 'Rejected') : ?>
                    <tfoot>
                        <tr>
                            <td class="border border-light border-left-0 align-middle">
                                Alasan :
                            </td>
                            <td colspan="3" class="border border-light align-middle" style="max-width: 30rem;">
                                <?= $building['alasan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-light border-left-0 align-middle">
                                <?= $building['status']; ?> pada :
                            </td>
                            <td colspan="3" class="border border-light align-middle">
                                <?php if ($building['status'] == 'Returned') : ?>
                                    <?= date('d F Y', strtotime($building['returned_at'])); ?>
                                <?php elseif ($building['status'] == 'Rejected') : ?>
                                    <?= date('d F Y', strtotime($building['rejected_at'])); ?>
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
                    <?= $building['sebelum']; ?>
                </p>
            </div>

            <div class="container">
                <h5 class="text-gray-900 font-weight-bold m-3 mt-5">Solusi Perbaikan</h5>
                <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                    <?= $building['solusi']; ?>
                </p>
            </div>
        </div>

        <div class="d-flex justify-content-around mb-5">

            <div class="container">
                <h5 class="text-gray-900 font-weight-bold m-3 mt-5">Sesudah Perbaikan</h5>
                <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                    <?= $building['sesudah']; ?>
                </p>
            </div>

            <div class="container">
                <h5 class="text-gray-900 font-weight-bold m-3 mt-4">Hasil terukur yang didapat dan dampak QCDSMPE</h5>
                <p class="mb-4 mx-auto card-text text-justify text-gray-900 border border-light rounded p-3">
                    <?= $building['hasil']; ?>
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
                            <span class=" text-gray-900"><?= $building['catatan']; ?></span>
                        </td>
                        <td rowspan="3">
                            <span class="font-weight-bold text-gray-900">Dibuat Oleh</span>
                            <br>
                            <br>
                            <small class="font-weight-bold text-success"><?= date('d M Y', strtotime($building['created_at'])); ?></small>
                            <br>
                            <small class="font-weight-bold text-success"><?= date('H : i', strtotime($building['created_at'])); ?></small>
                            <br>
                            <br>
                            <span class="font-weight-bold text-gray-900"><?= $building['username']; ?></span>
                        </td>
                        <td rowspan="3">
                            <span class="font-weight-bold text-gray-900">Disetujui Oleh</span>
                            <?php if ($building['status'] == 'Created' || $building['status'] == 'Updated') : ?>
                                <button type="button" class="btn btn-warning btn-sm btn-block mt-2" data-toggle="modal" data-target="#returnModal">Return</button>
                                <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#rejectModal">Reject</button>
                                <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#approveModal">Approve</button>
                            <?php elseif ($building['status'] == 'Returned' || $building['status'] == 'Rejected') : ?>
                                <br>
                                <br>
                                <br>
                                <h4 class="font-weight-bold text-gray-900">NA</h4>
                            <?php else : ?>
                                <br>
                                <br>
                                <small class="font-weight-bold text-success"><?= date('d M Y', strtotime($building['approved_at'])); ?></small>
                                <br>
                                <small class="font-weight-bold text-success"><?= date('H : i', strtotime($building['approved_at'])); ?></small>
                                <br>
                                <br>
                                <span class="font-weight-bold text-gray-900"><?= $building2['username']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <td>
                        <p><?= $building['changecontrol']; ?></p>
                    </td>

                    <!-- <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($building['changecontrol'] == 1) : ?>checked<?php else : ?>disabled<?php endif ?> id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">YA</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input type="radio" <?php if ($building['changecontrol'] == 0) : ?>checked<?php else : ?>disabled<?php endif ?> id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">TIDAK</label>
                                </div>
                            </td>
                        </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Start of Modal -->

<!-- Return Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-md">
            <div class="modal-header bg-warning rounded-top-lg">
                <h5 class="modal-title text-gray-900 font-weight-bold" id="exampleModalLabel">Return One Point Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="/img/caution.gif" class="w-25 mx-auto d-block">
                    <h4 class="text-center font-weight-bold text-gray-900">Sure Want To Return This OPL?</h4>
                    <h6 class="small text-center text-gray-900">Make Sure The Data is Correct!</h6>

                    <form action="/QCP/Approver/Building/ReturnProject/<?= $building['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row mb-0 mt-5">
                            <label for="alasanreturn" class="col-sm-4 col-form-label">Reason Return </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" autofocus required id="alasanreturn" name="alasanreturn"></textarea>
                                <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" id="tglreturn" name="tglreturn"></input>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="returnopl" class="col-sm-4 col-form-label">Returned By </label>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?= user()->id; ?>" id="returnopl" name="returnopl"></input>
                                <input type="text" readonly value="<?= user()->NIK; ?>, <?= user()->fullname; ?>" class="form-control font-weight-bold text-gray-900 border-0 bg-white"></input>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning px-4 mx-2 mt-5">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-md">
            <div class="modal-header bg-danger rounded-top-lg">
                <h5 class="modal-title text-gray-900 font-weight-bold" id="exampleModalLabel">Reject One Point Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="/img/reject.gif" class="w-25 mx-auto d-block">
                    <h4 class="text-center font-weight-bold text-gray-900">Sure Want To Reject This OPL?</h4>
                    <h6 class="small text-center text-gray-900">Make Sure The Data is Correct!</h6>

                    <form action="/QCP/Approver/Building/RejectProject/<?= $building['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row mb-0 mt-5">
                            <label for="alasanreject" class="col-sm-4 col-form-label">Reason Reject </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" autofocus required id="alasanreject" name="alasanreject"></textarea>
                                <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" id="tglreject" name="tglreject"></input>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="rejectopl" class="col-sm-4 col-form-label">Rejected By </label>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?= user()->id; ?>" id="rejectopl" name="rejectopl"></input>
                                <input type="text" readonly value="<?= user()->NIK; ?>, <?= user()->fullname; ?>" class="form-control font-weight-bold text-gray-900 border-0 bg-white"></input>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger px-4 mx-2 mt-5">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aprrove Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-md">
            <div class="modal-header bg-success rounded-top-lg">
                <h5 class="modal-title text-gray-900 font-weight-bold" id="exampleModalLabel">Approve One Point Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img src="/img/sending.gif" class="w-25 mx-auto d-block">
                    <h4 class="text-center font-weight-bold text-gray-900">Sure Want To Approve This OPL?</h4>
                    <h6 class="small text-center text-gray-900">Make Sure The Data Below is Correct</h6>

                    <form action="/QCP/Approver/Building/SaveProject/<?= $building['id']; ?>" method="post">
                        <?= csrf_field();  ?>
                        <div class="form-group row mb-1 mt-5">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Project </label>
                            <div class="col-sm-8">
                                <textarea readonly rows="4" id="nama" name="nama" class="form-control font-weight-bold text-gray-900 border-0 bg-white"><?= $building['nama_project']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="nocpr" class="col-sm-4 col-form-label">CPR No. </label>
                            <div class="col-sm-8">
                                <input type="text" id="nocpr" name="nocpr" readonly value="QCP1-<?= $building['singkatan']; ?>-<?= $building['cpr_no']; ?>" class="form-control font-weight-bold text-gray-900 border-0 bg-white"></input>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="cc" class="col-sm-4 col-form-label">Change Control </label>
                            <div class="col-sm-8">
                                <?php if (empty($building['changecontrol'])) : ?>
                                    <input type="text" id="cc" name="cc" value="<?= $building['changecontrol']; ?>" class="form-control font-weight-bold text-gray-900"></input>
                                <?php else : ?>
                                    <input type="text" id="cc" name="cc" readonly value="<?= $building['changecontrol']; ?>" class="form-control font-weight-bold text-gray-900 border-0 bg-white"></input>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="namaApprove" class="col-sm-4 col-form-label">Approver </label>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?= user()->id; ?>" id="approveopl" name="approveopl"></input>
                                <input type="text" id="namaApprove" name="namaApprove" readonly value="<?= user()->NIK; ?>, <?= user()->fullname; ?>" class="form-control font-weight-bold text-gray-900 border-0 bg-white"></input>
                            </div>
                        </div>
                        <input type="hidden" class="border-0 d-block" value="TRUE" id="statusrealisasi" name="statusrealisasi">
                        <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" id="tglapprove" name="tglapprove"></input>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4 mx-2 mt-5">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Of Modal -->

<?= $this->endSection(); ?>