<x-header-admin>Settings</x-header-admin>
<style>
    .form-container {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 10px;
      max-width: 500px;
      margin: 50px auto;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .upload-placeholder {
      width: 100px;
      height: 100px;
      border: 2px dashed #ccc;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #999;
      margin: 0 auto 20px;
      font-size: 14px;
      cursor: pointer;
    }

    .upload-placeholder img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Memastikan gambar tetap rapi tanpa melar */
    border-radius: 50%; /* Menjaga gambar tetap berbentuk lingkaran */
    }

    .upload-placeholder div {
        text-align: center;
    }

    .upload-placeholder span {
      font-size: 24px;
    }

    .photo-upload {
            width: 100px;
            height: 100px;
            border: 1px dashed #ccc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
        }

        .photo-upload i {
            font-size:  24px;
            color: #ccc;
        }
</style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar-admin></x-navbar-admin>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
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

                    <div class="form-container">
                        <form action="{{ route('admin_update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <!-- Upload Photo -->
                          <div class="text-center mb-3">
                            <label for="photo-upload" class="upload-placeholder">
                            @if(Auth::user()->foto)
                              <img src="{{ asset('img/user/' . Auth::user()->foto) }}" alt="Profile Photo">
                            @else
                              <div>
                                <span>+</span>
                                <p class="mb-0">Upload your photo</p>
                              </div>
                            @endif
                            </label>
                            <input type="file" name="photo" id="photo-upload" class="d-none">
                          </div>
                    
                          <!-- Password -->
                          <div class="mb-3">
                            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru">
                          </div>
                    
                          <!-- Confirm Password -->
                          <div class="mb-3">
                            <label for="confirm-password" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Password Baru">
                          </div>                    
                    
                          <!-- Nomor Telepon -->
                          <div class="mb-3">
                            <label for="nomor-telpon" class="form-label">Nomor Telepon</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" value="{{ old('nomor_telpon', Auth::user()->no_telpon) }}" required>
                            </div>
                          </div>
                    
                          <!-- Buttons -->
                          <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-dark">BATAL</button>
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                          </div>
                        </form>
                      </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->            

<x-footer-admin></x-footer-admin>