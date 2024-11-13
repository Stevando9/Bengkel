<x-header-admin>produk</x-header-admin>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
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
                            <a data-target="#addProductModal" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                            </a>
                        </div>
                    </div>
                        
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Produk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($produk as $prod)
                                        <tr>
                                            <td>{{$prod['kategori_id']}}</td>
                                            <td>{{$prod['kode_produk']}}</td>
                                            <td>{{$prod['nama_produk']}}</td>
                                            <td>{{$prod['stok']}}</td>
                                            <td>Rp. {{ number_format($prod['harga'])}}</td>
                                            <td>{{$prod['gambar']}}</td>
                                            <td>
                                            
                                                <a href="#" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                                <a href="/Admin/hapus/{{$prod['kode_produk']}}" class="btn btn-sm btn-danger shadow-sm">
                                                    <i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>
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

    <!-- Modal Box -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tambahProduk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Produk</label>
                            <input type="text" name="kode_produk" class="form-control" placeholder="Bxxx" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori:</label>
                            <select id="kategori" name="kategori">
                                <option value="">--Pilih Disini--</option>
                                @foreach ($kategori as $kat)
                                <option value="{{ $kat['kategori_id'] }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <link href="{{ asset('vendor/admin/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/admin/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/admin/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}"></script>

</body>

</html>