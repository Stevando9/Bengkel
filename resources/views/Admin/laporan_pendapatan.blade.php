<x-header-admin>Laporan Pendapatan</x-header-admin>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Pendapatan</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <x-card-pendapatan></x-card-pendapatan>

                    <!-- Content Row -->                        
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
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Pendapatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Pembayaran</th>
                                            <th>Nama Lengkap</th>
                                            <th>Total Harga</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Pembayaran</th>
                                            <th>Nama Lengkap</th>
                                            <th>Total Harga</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $beli)
                                        <tr>
                                            <td>{{ $beli->kode_pembayaran }}</td>                                    
                                            <td>{{ $beli->user->nama_lengkap}}</td>
                                            <td>Rp. {{ number_format($beli['totalHarga']) }}</td>
                                            <td>{{ $beli->metode_pembayaran }}</td>
                                            <td>
                                                {{-- <a type='button' data-target="#updateModal" onclick="loadData({{ $jas->kode_jasa }})" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>   --}}                                              
                                                <a href="/Admin/hapusJasa/{{$beli['kode_pembayaran']}}" class="btn btn-sm btn-danger shadow-sm">
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

            

            <!-- Create Modal Box -->
            <div class="modal fade" id="addJasaModal" tabindex="-1" aria-labelledby="addJasaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addJasaModalLabel">Tambah Jasa Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('tambahJasa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Kode Jasa</label>
                                    <input type="text" name="kode_jasa" class="form-control" placeholder="format: Jxxx" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Jasa</label>
                                    <input type="text" name="nama_jasa" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="number" name="biaya" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Jasa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<x-footer-admin></x-footer-admin>