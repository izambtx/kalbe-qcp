<?= $this->extend('header/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid mb-5 justify-content-center">

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>

    <div class="card">

        <!-- Page Heading -->
        <div class="row my-4 mx-3">
            <div class="col-auto mr-auto my-auto">

            </div>
            <div class="col-auto">
                <div class="input-wrapper">
                    <button class="icon-search">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="25px" width="25px">
                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"></path>
                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#fff" d="M22 22L20 20"></path>
                        </svg>
                    </button>
                    <input placeholder="search.." class="input-search" name="text" type="text">
                </div>
            </div>
        </div>
        <table class="table table-hover text-gray-900 text-center">
            <thead>
                <tr>
                    <td class="font-weight-bold" scope="col">No.</td>
                    <td class="font-weight-bold" scope="col">Nama Project</td>
                    <td class="font-weight-bold" scope="col">Pembuat</td>
                    <td class="font-weight-bold" scope="col">Status</td>
                    <td class="font-weight-bold" scope="col">Tanggal Dibuat</td>
                    <td class="font-weight-bold" scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + ($perPage * ($currentPage - 1)); ?>
                <?php foreach ($lainlain as $b) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $b['nama_project']; ?></td>
                        <td><?= $b['username']; ?></td>
                        <?php if ($b['status'] == 'Created') : ?>
                            <td class="align-middle"><span class="badge badge-primary"><?= $b['status'];  ?></span></td>
                        <?php elseif ($b['status'] == 'Updated') : ?>
                            <td class="align-middle"><span class="badge badge-warning"><?= $b['status'];  ?></span></td>
                        <?php elseif ($b['status'] == 'Approved') : ?>
                            <td class="align-middle"><span class="badge badge-success"><?= $b['status'];  ?></span></td>
                        <?php elseif ($b['status'] == 'Returned') : ?>
                            <td class="align-middle"><span class="badge badge-warning"><?= $b['status'];  ?></span></td>
                        <?php elseif ($b['status'] == 'Rejected') : ?>
                            <td class="align-middle"><span class="badge badge-danger"><?= $b['status'];  ?></span></td>
                        <?php endif; ?>
                        <td><?= date('d M Y', strtotime($b['created_at'])); ?></td>
                        <td>
                            <a href="/QCP/Approver/Lainlain/Details/<?= $b['id']; ?>">
                                <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                <lord-icon src="https://cdn.lordicon.com/mrjuyheh.json" trigger="hover" colors="outline:#000000,primary:#000000,secondary:#000000,tertiary:#ffffff" style="width:25px;height:25px">
                                </lord-icon>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>