<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid mb-5 justify-content-center">

    <div class="card p-5">

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('/QCP/Building'); ?>" type="button" class="btn btn-outline-primary mb-5"><i class="fas fa-chevron-circle-left"></i>&nbsp; List QCP Building</a>
            <h4 class="text-gray-900">Add New <span class="font-weight-bold">Project QCP Building</span></h4>
        </div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="" method="get" class="mx-5 mt-2 px-5 text-left">

            <div class="form-group row">
                <div class="form-row col-sm-12 px-0">
                    <div class="form-group col-sm-3">
                        <label for="jumlahFoto" class="align-middle mt-2 text-gray-900 font-weight-bold">Jumlah Foto OPL</label>
                    </div>
                    <div class="form-group col-sm-5">
                        <input type="number" min="0" max="5" class="form-control rounded-sm" id="jumlahFoto" name="jumlahFoto" placeholder="Masukan Jumlah Foto OPL Yang Diperlukan" value="<?= $inputFoto; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="gambar" name="submit" class="rounded-circle px-0 ml-4 form-control btn btn-success"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <form class="mx-5 mt-2 mb-5 px-5 text-left" method="post" action="/QCP/Building/SaveProject" enctype="multipart/form-data">
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
                                <div class="custom-file col-sm-10 my-2">
                                    <input type="file" accept="image/*" class="custom-file-input" id="foto_sebelum<?= $i; ?>" name="foto_sebelum<?= $i; ?>" value="<?= old('foto_sebelum' . $i); ?>" onchange="preview_sebelum<?= $i; ?>()">

                                    <label class="custom-file-label" id="label_sebelum<?= $i; ?>" name="label_sebelum<?= $i; ?>" for="foto_sebelum<?= $i; ?>">Choose image / Drop image here</label>
                                </div>
                            </div>
                            <textarea class="form-control mt-2 rounded bg-light" rows="6" id="ket_foto<?= $i; ?>" placeholder="Keterangan Foto <?= $i; ?>" name="ket_foto<?= $i; ?>" value="<?= old('ket_foto' . $i); ?>"></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

            <div class="form-group">
                <label class="text-gray-900" for="nama">Nama Project</label>
                <input type="text" class="form-control rounded-sm <?php if (session('validation.nama')) : ?>is-invalid<?php endif ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Project" autofocus>
                <div class="invalid-feedback">
                    <?= session('validation.nama') ?>
                </div>
                <input type="hidden" class="form-control" id="counterCPR" name="counterCPR" value="<?= $countCPRno + 1; ?>">
                <input type="hidden" class="form-control" id="jumlahFileFoto" name="jumlahFileFoto" value="<?= $inputFoto; ?>">
            </div>
            <div class="form-group">
                <label class="text-gray-900" for="sasaran">Sasaran KPI</label>
                <input type="text" class="form-control rounded-sm <?php if (session('validation.sasaran')) : ?>is-invalid<?php endif ?>" id="sasaran" name="sasaran" value="<?= old('sasaran'); ?>" placeholder="Sasaran KPI">
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
                            <option value="<?= $d['id'];  ?>" <?= old('department') == $d['id'] ? 'selected' : '' ?>><?= $d['nama_distribusi'];  ?></option>
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
                        <input type="date" class="form-control rounded-sm <?php if (session('validation.start')) : ?>is-invalid<?php endif ?>" name="start" id="start" value="<?= old('start'); ?>">
                        <div class="invalid-feedback">
                            <?= session('validation.start') ?>
                        </div>
                    </div>
                    <h5 class="my-auto font-weight-bold text-gray-900"> s/d </h5>
                    <div class="col">
                        <input type="date" class="form-control rounded-sm <?php if (session('validation.end')) : ?>is-invalid<?php endif ?>" name="end" value="<?= old('end'); ?>">
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
                <!-- <div id="inputImage">
                    <div class="media mb-4">
                        <div class="d-block my-auto col-sm-3 border-0 form-gambar" id="row">
                            <label for="file-input" class="drop-container mt-3">
                                <span class="drop-title">Drop photos here</span>
                                or
                                <input type="file" multiple accept="image/*" id="file-input">
                            </label>
                        </div>
                        <div class="media-body mx-3"> -->
                <textarea class="form-control rounded-sm mt-3 <?php if (session('validation.sebelum')) : ?>is-invalid<?php endif ?>" name="sebelum" id="sebelum" rows="6" placeholder="Keterangan Sebelum Perbaikan"><?= old('sebelum'); ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.sebelum') ?>
                </div>
                <!-- </div>
                    </div>
                </div> -->
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="solusi">
                    Solusi Perbaikan
                </label>
                <br>
                <!-- <div id="inputImage">
                    <div class="media mb-4">
                        <div class="d-block my-auto col-sm-3 border-0" id="row">
                            <img src="/img/default.jpg" id="img" class="img-thumbnail col-sm-12 p-0 sebelum-preview  rounded" alt="Generic placeholder image">
                            <div class="custom-file col my-2">
                                <input type="file" accept="image/*" class="custom-file-input" id="foto_sebelum " name="foto_sebelum " value="<?= old('foto_sebelum'); ?>" onchange="preview_sebelum ()">
                                <label class="custom-file-label" id="label_sebelum " name="label_sebelum " for="foto_sebelum ">Choose image / Drop image here</label>
                            </div>
                        </div>
                        <div class="media-body mx-3"> -->
                <i class="text-gray-900 font-weight-normal">
                    (Jelaskan improvement yang dilakukan untuk menyelesaikan masalah/hambatan dari kondisi sebelum perbaikan)
                </i>
                <textarea class="form-control rounded-sm mt-3 <?php if (session('validation.solusi')) : ?>is-invalid<?php endif ?>" name="solusi" id="solusi" rows="5" placeholder="Keterangan Solusi Perbaikan"><?= old('solusi'); ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.solusi') ?>
                </div>
                <!-- </div>
                    </div>
                </div> -->
            </div>
            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="sesudah">
                    Sesudah Perbaikan
                    <br>
                    <i class="text-gray-900 font-weight-normal">
                        (Jelaskan kondisi setelah dilakukan perbaikan )
                    </i>
                </label>
                <textarea class="form-control rounded-sm <?php if (session('validation.sesudah')) : ?>is-invalid<?php endif ?>" name="sesudah" id="sesudah" rows="5" placeholder="Keterangan Setelah Perbaikan"><?= old('sesudah'); ?></textarea>
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
                <textarea class="form-control rounded-sm <?php if (session('validation.hasil')) : ?>is-invalid<?php endif ?>" name="hasil" id="hasil" rows="5" placeholder="Keterangan Hasil terukur yang didapat dan dampak QCDSMPE"><?= old('hasil'); ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.hasil') ?>
                </div>
            </div>

            <div class="form-group">
                <label class="text-gray-900 font-weight-bold" for="changecontrol">
                    Nomor Change Control
                    <br>
                    <i class="text-gray-900 font-weight-normal">
                        (Jika terdapat perubahan signifikan yang terjadi,apabila tidak ada change control maka diketik "NA")
                    </i>
                </label>
                <input value="<?= old('changecontrol'); ?>" class="form-control rounded-sm <?php if (session('validation.changecontrol')) : ?>is-invalid<?php endif ?>" name="changecontrol" id="changecontrol" rows="5" placeholder="Nomor Change Control"></input>
                <div class="invalid-feedback">
                    <?= session('validation.changecontrol') ?>
                </div>
            </div>
            <button class="btn btn-primary px-sm-4" type="submit">Send &nbsp;&nbsp;<i class="fas fa-paper-plane"></i></button>
            <!-- <button class="btn btn-outline-info px-sm-4" type="reset">Draft &nbsp;&nbsp;<i class="fas fa-save" style="color: #86c9e4;"></i></i> -->
        </form>
    </div>
</div>

<?= $this->endSection(); ?>