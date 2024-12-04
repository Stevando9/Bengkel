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
                                            <td>{{ $prod->kategori->nama_kategori ?? 'Kategori tidak ditemukan'}}</td>
                                            <td>{{$prod['kode_produk']}}</td>
                                            <td>{{$prod['nama_produk']}}</td>
                                            <td>{{$prod['stok']}}</td>
                                            <td>Rp. {{ number_format($prod['harga'])}}</td>
                                            <td>{{$prod['gambar']}}</td>
                                            <td>
                                            
                                                <a href="#" data-toggle="modal" data-target="#updateModal-{{ $prod->kode_produk }}" class="btn btn-sm btn-warning shadow-sm">
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

            @foreach ($produk as $prod)
            <div class="modal fade" id="updateModal-{{ $prod->kode_produk }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel-{{ $prod->kode_produk }}">Update Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  action="{{ route('updateProduk', ['kode_produk' => $prod->kode_produk]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="dataId">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="{{ $prod->nama_produk }}" required>
                          </div>
                          <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}" {{  $prod->kategori->kategori_id == $item->kategori_id ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $prod->stok }}" required>
                          </div>
                          <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $prod->harga }}" required>
                          </div>
                          <div class="form-group">
                            <label>Gambar Produk</label>                            
                            <input type="file" name="gambar" class="form-control-file">
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