<x-header-admin>Jasa</x-header-admin>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Jasa</h1>
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
                            <a data-target="#addJasaModal" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
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
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Jasa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Jasa</th>
                                            <th>Tipe Jasa</th>
                                            <th>Harga</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Jasa</th>
                                            <th>Tipe Jasa</th>
                                            <th>Harga</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($jasa as $jas)
                                        <tr>
                                            <td>{{ $jas['kode_jasa'] }}</td>
                                            <td>{{ $jas['nama_jasa'] }}</td>
                                            <td>Rp. {{ number_format($jas['biaya']) }}</td>
                                            <td>
                                                {{-- <a type='button' data-target="#updateModal" onclick="loadData({{ $jas->kode_jasa }})" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>   --}}
                                                    <button type="button" data-toggle="modal" data-target="#updateModal-{{ $jas->kode_jasa }}" class="btn btn-sm btn-warning shadow-sm">
                                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</button>                                                  
                                                <a href="/Admin/hapusJasa/{{$jas['kode_jasa']}}" class="btn btn-sm btn-danger shadow-sm">
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

            <!-- Update Modal -->
            @foreach ($jasa as $jas)
            <div class="modal fade" id="updateModal-{{ $jas->kode_jasa }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel-{{ $jas->kode_jasa }}">Update Jasa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  action="{{ route('updateJasa', ['kode_jasa' => $jas->kode_jasa]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="dataId">
                        <div class="mb-3">
                            <label for="nama_jasa" class="form-label">Nama Jasa</label>
                            <input type="text" class="form-control" id="nama_jasa" name="nama_jasa" value="{{ $jas->nama_jasa }}" required>
                          </div>
                          <div class="mb-3">
                            <label for="biaya" class="form-label">Biaya</label>
                            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $jas->biaya }}" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
                </div>
            </div> 
            @endforeach           

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