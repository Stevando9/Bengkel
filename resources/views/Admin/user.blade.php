<x-header-admin>User</x-header-admin>

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
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user['id']}}</td>
                                            <td>{{$user['nama_lengkap']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['no_telpon']}}</td>
                                            <td>Jl. Jayapura, Kraton</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<x-footer-admin></x-footer-admin>