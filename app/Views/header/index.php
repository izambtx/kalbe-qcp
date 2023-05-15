<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT. Kalbe Farma Tbk</title>

    <link rel="icon" type="img/x-icon" href="/img/favicon.ico">
    <!-- Custom fonts for this template-->
    <link href="<?php base_url(); ?>/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <link type="text/css" href="<?php base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top" onload="autoClick();">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light bg-white accordion shadow-no-bottom" style="z-index: 1;" id="accordionSidebar">
            <div class="sticky-top text-gray-900">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand rounded-bottom-lg d-flex align-items-center justify-content-center" href="<?= base_url(); ?>/">
                    <div class="sidebar-brand-icon">
                        <img draggable="false" src="/img/Logo Kalbe trans kecil.png" class="img-thumbnail bg-transparent border-0" style="height:3em;">
                    </div>

                    <div class="sidebar-brand-text mx-3">Dashboard</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <img class="img-profile rounded-circle mx-auto d-block w-25" src="<?php base_url(); ?>/img/<?= user()->user_image; ?>">
                <a class="nav-link text-center text-gray-900" href="<?= base_url('/view_profile'); ?>" role="button">
                    <h6 class="mr-2 d-none d-lg-inline text-gray-900 font-weight-bold"><?= user()->fullname; ?></h6>
                    <i class="fas fa-cog"></i>
                </a>

                <?php if (in_groups('user') || in_groups('admin') || in_groups('supervisor')) : ?>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    </hr>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Form Create
                    </div>

                    <!-- Nav Item - Add OPL Menu -->
                    <li class="nav-item rounded">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-file-medical"></i>
                            <span>Form QCP</span>
                        </a>
                        <div id="collapseUtilities" class="collapse pb-1" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="py-2 collapse-inner rounded" style="background-color: #eaeaea;">
                                <h6 class="collapse-header text-gray-900">Kategori :</h6>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Building">Building</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Facility">Facility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Utility">Utility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Lainlain">Lain-lain</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if (in_groups('user') || in_groups('supervisor')) : ?>

                    <!-- Nav Item - Rewrite OPL Menu -->
                    <li class="nav-item rounded">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <i class="fas fa-inbox"></i>
                            <span>Status QCP</span>
                        </a>
                        <div id="collapseThree" class="collapse pb-1" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="py-2 collapse-inner rounded" style="background-color: #eaeaea;">
                                <h6 class="collapse-header text-gray-900">Kategori :</h6>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Updated/Building">Building</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Updated/Facility">Facility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Updated/Utility">Utility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Updated/Lainlain">Lain-lain</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Realisasi OPL Menu -->
                    <!-- <li class="nav-item rounded">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fab fa-readme"></i>
            <span>Pengaktifan (Closing)</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="background-color: #eaeaea;">
                <h6 class="collapse-header text-gray-900">Kategori :</h6>
                <a class="collapse-item" href="<?= base_url(); ?>">Pintu Emergency</a>
                <a class="collapse-item" href="<?= base_url(); ?>">Hydrant</a>
                <a class="collapse-item" href="<?= base_url(); ?>">Smoke/Heat Detector</a>
                <a class="collapse-item" href="<?= base_url(); ?>">Fire Alarm</a>
            </div>
        </div>
    </li> -->
                <?php endif; ?>

                <?php if (in_groups('supervisor') || in_groups('senior')) : ?>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    </hr>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Approval
                    </div>

                    <!-- Nav Item - Approve OPL Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-file-signature"></i>
                            <span>Form QCP</span>
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="py-2 collapse-inner rounded" style="background-color: #eaeaea;">
                                <h6 class="collapse-header text-gray-900">Kategori :</h6>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Approver/Building">Building</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Approver/Facility">Facility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Approver/Utility">Utility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/Approver/Lainlain">Lain-lain</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Approve OPL Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-history"></i>
                            <span>History OPL</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="py-2 collapse-inner rounded" style="background-color: #eaeaea;">
                                <h6 class="collapse-header text-gray-900">Kategori :</h6>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/HistoryApprover/Building">Building</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/HistoryApprover/Facility">Facility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/HistoryApprover/Utility">Utility</a>
                                <a class="collapse-item" href="<?= base_url(); ?>/QCP/HistoryApprover/Lainlain">Lain-lain</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if (in_groups('admin')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin'); ?>">
                            <i class="fas fa-users-cog"></i>
                            <span>Users Management</span></a>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Support
                </div>

                <!-- Nav Item - Tutorial & Penjelasan -->
                <li class="nav-item rounded">
                    <a class="nav-link" target="_blank" href="https://drive.google.com/file/d/11Xy3_-1odYtHfRpp1cqlDWI_lBszjw1E/view">
                        <i class="fas fa-video"></i>
                        <span>Tutorial & Penjelasan</span>
                    </a>
                </li>

                <!-- Nav Item - LOGOUT -->
                <li class="nav-item">
                    <a class="nav-link text-white rounded" data-toggle="modal" data-target="#logoutModal" style="background-color: #9c2727;" href="">
                        <i class="fas fa-door-open" style="color: #ffffff;"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center mt-4">
                    <button class="rounded-circle border-0 bg-gradient-seablue" id="sidebarToggle"></button>
                </div>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eaeaea;">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-gradient-seablue topbar mb-5 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <h3 class="font-weight-bold text-white my-auto ml-4">
                    <span class=""><?= $title; ?></span>
                </h3>

                <!-- Topbar Navbar -->
                <!-- <ul class="navbar-nav ml-auto mr-5"> -->

                <!-- Nav Item - Alerts -->
                <!-- <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/msetysan.json" trigger="hover" colors="primary:#ffffff" state="hover" style="width:25px;height:25px">
                            </lord-icon> -->
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-merah badge-counter">3+</span>
                        </a> -->
                <!-- Dropdown - Alerts -->
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li> -->

                <!-- Nav Item - Messages -->
                <!-- <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-merah badge-counter">7</span>
                    </a> -->
                <!-- Dropdown - Messages -->
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>
                </ul> -->

            </nav>
            <!-- End of Topbar -->

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content'); ?>
                <!-- /.container-fluid -->




            </div>
            <!-- End of Main Content -->
        </div>

    </div>
    <!-- End of Content Wrapper -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; qcp.kalbe.site 2023</span>
                <span class="d-flex justify-content-end">V1.0</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <div class="loader-wrapper row align-items-center justify-content-center">
        <div class="loader">
            <div class="loadingio-spinner-dual-ball-zisduoz9m6">
                <div class="ldio-i4x5zbgnet">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <span>Loading...</span>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded">
                <button class="close d-flex justify-content-end mt-3 mr-3" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <img class="img-profile rounded-circle mx-auto d-block w-25" src="<?php base_url(); ?>/img/logout.gif">
                <div class="modal-body h4 text-center mb-0 font-weight-bold text-gray-900">Ready to Leave?</div>
                <h6 class="text-center mt-0 mb-4">You are going to logout from here</h6>
                <a class="btn btn-danger py-2 rounded mx-5 mt-2" href="<?= base_url('logout'); ?>">Yes, Logout</a>
                <button class="btn text-danger border-0 py-2 rounded mx-5 mt-2 mb-4" type="button" data-dismiss="modal">Keep Login</button>
            </div>
        </div>
    </div>

    <script src="<?php base_url(); ?>/js/script.js"></script>
    <script src="<?php base_url(); ?>/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php base_url(); ?>/js/sweetalert2.min.css">

    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php base_url(); ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php base_url(); ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php base_url(); ?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?php base_url(); ?>/js/demo/chart-bar-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="<?php base_url(); ?>/js/myalert.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>
    <script>
        $(document).ready(function() {
            $("#downloadQCP").click(function() {
                domtoimage.toBlob(document.getElementById('contentQCP')).then(function(blob) {
                    window.saveAs(blob, "ImageQCP.png")
                })
                let timerInterval
                Swal.fire({
                    title: 'Downloading Content...',
                    html: 'Loading in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('Closed by the timer')
                    }
                })
            })
        })
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#distribusi').change(function(e) {
                var distribusi = $("#distribusi").val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Users/distribusiUsers'); ?>",
                    data: {
                        distribusi: distribusi
                    },
                    success: function(response) {
                        $("#users").html(response);
                    }
                })
            })
        });
    </script> -->

    <script>
        const tombolError = document.querySelector('#tombolError');
        tombolError.addEventListener('click', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data QCP Yang Akan di Export Masih Kosong',
                showConfirmButton: false,
                timer: 2500,
                customClass: 'animated tada rounded-md'
            });
        });
    </script>
    <script>
        const tombolSuccess = document.querySelector('#tombolSuccess');
        tombolSuccess.addEventListener('click', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data QCP Yang Akan di Export Masih Kosong',
                showConfirmButton: false,
                timer: 2500,
                customClass: 'animated tada rounded-md'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', 'nav ol li', function() {
            $(this).addClass('active bg-success rounded-sm px-2').siblings().removeClass('active bg-success rounded-sm px-2')
        })
    </script>

    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <script>
            function preview_sebelum<?= $i; ?>() {
                counter += 1;
                const foto_sebelum = document.querySelector('#foto_sebelum<?= $i; ?>');
                const foto_sebelum_label = document.querySelector('#label_sebelum<?= $i; ?>');
                const foto_sebelum_preview = document.querySelector('.sebelum-preview<?= $i; ?>');

                foto_sebelum_label.textContent = foto_sebelum.files[0].name;

                const file_foto_sebelum = new FileReader();
                file_foto_sebelum.readAsDataURL(foto_sebelum.files[0]);

                file_foto_sebelum.onload = function(e) {
                    foto_sebelum_preview.src = e.target.result;
                }
            }
        </script>
    <?php endfor; ?>
    <script>
        function preview_sesudah() {
            const foto_sesudah = document.querySelector('#foto_sesudah');
            const foto_sesudah_label = document.querySelector('#label_sesudah');
            const foto_sesudah_preview = document.querySelector('.sesudah-preview');

            foto_sesudah_label.textContent = foto_sesudah.files[0].name;

            const file_foto_sesudah = new FileReader();
            file_foto_sesudah.readAsDataURL(foto_sesudah.files[0]);

            file_foto_sesudah.onload = function(e) {
                foto_sesudah_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function preview_foto3() {
            const foto3 = document.querySelector('#foto3');
            const foto3_label = document.querySelector('#label_foto3');
            const foto3_preview = document.querySelector('.foto3-preview');

            foto3_label.textContent = foto3.files[0].name;

            const file_foto3 = new FileReader();
            file_foto3.readAsDataURL(foto3.files[0]);

            file_foto3.onload = function(e) {
                foto3_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        function preview_foto4() {
            const foto4 = document.querySelector('#foto4');
            const foto4_label = document.querySelector('#label_foto4');
            const foto4_preview = document.querySelector('.foto4-preview');

            foto4_label.textContent = foto4.files[0].name;

            const file_foto4 = new FileReader();
            file_foto4.readAsDataURL(foto4.files[0]);

            file_foto4.onload = function(e) {
                foto4_preview.src = e.target.result;
            }
        }
    </script>
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>

</body>

</html>