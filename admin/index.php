<?php
session_start();
include '../koneksi/koneksi.php';

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>"; 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fanatic Petshop</title>

    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Fanatic Petshop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=kategori">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=produk">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pembelian">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pembelian</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pelanggan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=logout">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php

                        if(isset($_GET['halaman']))
                        {
                            if($_GET['halaman']=="kategori")
                            {
                                include 'kategori.php';
                            }
                            elseif($_GET['halaman']=="tambah_kategori")
                            {
                                include 'tambah/tambah_kategori.php';
                            }
                            elseif($_GET['halaman']=="edit_kategori")
                            {
                                include 'edit/edit_kategori.php';
                            }
                            elseif($_GET['halaman']=="hapus_kategori")
                            {
                                include 'hapus/hapus_kategori.php';
                            }
                            elseif($_GET['halaman']=="produk")
                            {
                                include 'produk.php';
                            }
                            elseif($_GET['halaman']=="tambah_produk")
                            {
                                include 'tambah/tambah_produk.php';
                            }
                            elseif($_GET['halaman']=="detail_produk")
                            {
                                include 'detail/detail_produk.php';
                            }
                            elseif($_GET['halaman']=="hapus_foto")
                            {
                                include 'hapus/hapus_foto.php';
                            }
                            elseif($_GET['halaman']=="edit_produk")
                            {
                                include 'edit/edit_produk.php';
                            }
                            elseif($_GET['halaman']=="hapus_produk")
                            {
                                include 'hapus/hapus_produk.php';
                            }
                            elseif($_GET['halaman']=="pembelian")
                            {
                                include 'pembelian.php';
                            }
                            elseif($_GET['halaman']=="detail_pembelian")
                            {
                                include 'detail/detail_pembelian.php';
                            }

                            elseif($_GET['halaman']=="logout")
                            {
                                include 'logout.php';
                            }
                            elseif($_GET['halaman']=="pelanggan")
                            {
                                include 'pelanggan.php';
                            }
                        }
                        else
                        {
                            include 'dashboard.php';
                        }

                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function(){
            $(".btn-tambah").on("click", function(){
                $(".input-foto").append("<input type='file' name='foto[]' class='form-control'>");
            })
        })
    </script>

</body>

</html>