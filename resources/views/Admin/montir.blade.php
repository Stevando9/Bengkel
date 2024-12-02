<x-header-admin>Montir</x-header-admin>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Montir</h1>
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
                            <a data-target="#addMontirModal" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
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
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Montir</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Montir</th>
                                            <th>Nama</th>
                                            <th>Pengalaman</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Montir</th>
                                            <th>Nama</th>
                                            <th>Pengalaman</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($montir as $tir)
                                        <tr>
                                            <td>{{ $tir['id'] }}</td>
                                            <td>{{ $tir['nama_montir'] }}</td>
                                            <td>{{ $tir['pengalaman'] }}</td>
                                            <td>
                                                <a href="#"  data-toggle="modal" data-target="#updateModal-{{ $tir->id }}" class="btn btn-sm btn-warning shadow-sm">
                                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                                <a href="/Admin/hapusMontir/{{$tir['id']}}" class="btn btn-sm btn-danger shadow-sm">
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

            <!-- Modal Box -->
            <div class="modal fade" id="addMontirModal" tabindex="-1" aria-labelledby="addMontirModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMontirModalLabel">Tambah Montir Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('tambahMontir') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Montir</label>
                                    <input type="text" name="nama_montir" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Pengalaman</label>
                                    <input type="text" name="pengalaman" class="form-control" required>
                                </div>                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            @foreach ($montir as $tir)
            <div class="modal fade" id="updateModal-{{ $tir->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel-{{ $tir->id }}">Update Jasa</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  action="{{ route('updateMontir', ['id' => $tir->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="dataId">
                        <div class="mb-3">
                            <label for="nama_montir" class="form-label">Nama Montir</label>
                            <input type="text" class="form-control" id="nama_montir" name="nama_montir" value="{{ $tir->nama_montir }}" required>
                          </div>
                          <div class="mb-3">
                            <label for="pengalaman" class="form-label">Pengalaman</label>
                            <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ $tir->pengalaman }}" required>
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

<x-footer-admin></x-footer-admin>            