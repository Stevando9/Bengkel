<x-header-admin></x-header-admin>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <x-card-pendapatan></x-card-pendapatan>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                            </a>
                        </div>
                    </div>
                        
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>12342</td>
                                            <td>Mansbawar</td>
                                            <td>Mans@gmail.com</td>
                                            <td>08754664323</td>
                                            <td>Jl. Jayapura, Kraton</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <tr>
                                                <td>12342</td>
                                                <td>Marty</td>
                                                <td>Marty@gmail.com</td>
                                                <td>08754664323</td>
                                                <td>Jl. Jayapura, Kraton</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                                </td>
                                            </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/admin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/admin/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/admin/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/admin/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/admin/demo/chart-pie-demo.js')}}"></script>

</body>

</html>