<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid mb-5 justify-content-center">

    <div class="card p-5">

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('/QCP/Building/Details/' . $building['id']); ?>" type="button" class="btn btn-outline-primary mb-5"><i class="fas fa-chevron-circle-left"></i>&nbsp; Detail QCP Building</a>
            <h4 class="text-gray-900">Edit Returned <span class="font-weight-bold">Project QCP Building</span></h4>
        </div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="" method="get" class="mx-5 mt-2 px-5 text-left">
            <div class="form-group row">
                <div class="form-row col-sm-12 px-0">
                    <div class="form-group col-sm-3 my-auto">
                        <label for="jumlahFoto" class="align-middle mt-2 text-gray-900">Jumlah Foto</label>
                    </div>
                    <div class="form-group col-sm-5 my-auto">
                        <input type="number" inputmode="numeric" value="" min="0" max="15" class="form-control rounded-sm" id="jumlahFoto" name="jumlahFoto" placeholder="Masukan Jumlah Foto OPL Yang Diperlukan">
                    </div>
                    <div class="form-group my-auto">
                        <button type="submit" value="gambar" name="submit" class="rounded-circle px-0 ml-4 form-control btn btn-success"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <form class="mx-5 mt-2 mb-5 px-5 text-left" method="post" action="/QCP/Building/UpdateProject/<?= $building['id']; ?>" enctype="multipart/form-data">
            <?php csrf_field(); ?>

            <?php $jumlahFoto = $inputFoto ?>
            <?php for ($i = 1; $i <= $jumlahFoto; $i++) : ?>
                <div id="inputImage">
                    <div class="media mb-4">
                        <div class="d-block my-auto col-sm-3 border-0" id="row">
                            <img src="/img/default.jpg" id="img" class="img-thumbnail col-sm-12 p-0 sebelum-preview<?= $i; ?> rounded" alt="Generic placeholder image">
                        </div>
                        <div class="media-body mx-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-gray-900 font-weight-bold align-middle my-3">Gambar <?= $i; ?></h5>
                                <div class="custom-file col-sm-9 my-2">
                                    <input type="file" accept="image/*" class="custom-file-input" id="foto_sebelum<?= $i; ?>" name="foto_sebelum<?= $i; ?>" value="<?= old('foto_sebelum'); ?>" onchange="preview_sebelum<?= $i; ?>()">

                                    <label class="custom-file-label" id="label_sebelum<?= $i; ?>" name="label_sebelum<?= $i; ?>" for="foto_sebelum<?= $i; ?>">Choose image / Drop image here</label>
                                </div>
                            </div>
                            <textarea class="form-control mt-2 rounded bg-light" rows="6" id="ket_foto<?= $i; ?>" placeholder="Keterangan Foto <?= $i; ?>" name="ket_foto<?= $i; ?>" value="<?= old('ket_foto'); ?>"></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

            <div class="form-group">
                <label class="text-gray-900" for="nama">Nama Project</label>
                <input type="text" class="form-control rounded-sm <?php if (session('validation.nama')) : ?>is-invalid<?php endif ?>" id="nama" name="nama" value="<?= $building['nama_project']; ?>" placeholder="Nama Project" autofocus>
                <div class="invalid-feedback">
                    <?= session('validation.nama') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900" for="sasaran">Sasaran KPI</label>
                <input type="text" class="form-control rounded-sm <?php if (session('validation.sasaran')) : ?>is-invalid<?php endif ?>" id="sasaran" name="sasaran" value="<?= $building['sasaran_kpi']; ?>" placeholder="Sasaran KPI">
                <div class="invalid-feedback">
                    <?= session('validation.sasaran') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="department" class=" text-gray-900">Daftar Bagian</label>
                <div class="input-group">
                    <select class="<?php if (session('validation.department')) : ?>is-invalid<?php endif ?> custom-select rounded-sm" id="department" name="department">
                        <option selected disabled hidden>Choose...</option>
                        <?php foreach ($department as $d) : ?>
                            <option value="<?= $d['id'];  ?>" <?= $building['bagian'] == $d['id'] ? 'selected' : '' ?>><?= $d['nama_distribusi'];  ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('validation.department') ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900" for="start">Waktu Project</label>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control rounded-sm <?php if (session('validation.start')) : ?>is-invalid<?php endif ?>" name="start" id="start" value="<?= date('Y-m-d', strtotime($building['start'])); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.start') ?>
                        </div>
                    </div>
                    <h5 class="my-auto font-weight-bold text-gray-900"> s/d </h5>
                    <div class="col">
                        <input type="date" class="form-control rounded-sm <?php if (session('validation.end')) : ?>is-invalid<?php endif ?>" name="end" value="<?= date('Y-m-d', strtotime($building['end'])); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.end') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="sebelum">
                    Sebelum Perbaikan
                </label>
                <br>
                <i class="text-gray-900 font-weight-normal">
                    (Jelaskan masalah/hambatan/data terukur yang terjadi sebelum perbaikan)
                </i>
                <textarea class="form-control rounded-sm mt-3 <?php if (session('validation.sebelum')) : ?>is-invalid<?php endif ?>" name="sebelum" id="sebelum" rows="6" placeholder="Keterangan Sebelum Perbaikan"><?= $building['sebelum']; ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.sebelum') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="solusi">
                    Solusi Perbaikan
                </label>
                <i class="text-gray-900 font-weight-normal">
                    (Jelaskan improvement yang dilakukan untuk menyelesaikan masalah/hambatan dari kondisi sebelum perbaikan)
                </i>
                <textarea class="form-control rounded-sm mt-3 <?php if (session('validation.solusi')) : ?>is-invalid<?php endif ?>" name="solusi" id="solusi" rows="5" placeholder="Keterangan Solusi Perbaikan"><?= $building['solusi']; ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.solusi') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="sesudah">
                    Sesudah Perbaikan
                    <br>
                    <i class="text-gray-900 font-weight-normal">
                        (Jelaskan kondisi setelah dilakukan perbaikan )
                    </i>
                </label>
                <textarea class="form-control rounded-sm <?php if (session('validation.sesudah')) : ?>is-invalid<?php endif ?>" name="sesudah" id="sesudah" rows="5" placeholder="Keterangan Setelah Perbaikan"><?= $building['sesudah']; ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.sesudah') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="hasil">
                    Hasil terukur yang didapat dan dampak QCDSMPE
                    <br>
                    <i class="text-gray-900 font-weight-normal">
                        (Jelaskan hasil terukur "measurable", Saving dari dampak improvement yang dilakukan dan dampak QCDSMPE lainnya)
                    </i>
                </label>
                <textarea class="form-control rounded-sm <?php if (session('validation.hasil')) : ?>is-invalid<?php endif ?>" name="hasil" id="hasil" rows="5" placeholder="Keterangan Hasil terukur yang didapat dan dampak QCDSMPE"><?= $building['hasil']; ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.hasil') ?>
                </div>
            </div>
            <button class="btn btn-primary px-sm-4" type="submit">Send &nbsp;&nbsp;<i class="fas fa-paper-plane"></i></button>
            <!-- <button class="btn btn-outline-info px-sm-4" type="reset">Draft &nbsp;&nbsp;<i class="fas fa-save" style="color: #86c9e4;"></i></i> -->
        </form>
    </div>
</div>

<?= $this->endSection(); ?>