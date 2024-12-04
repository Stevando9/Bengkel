<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Cahaya Gunung Licin 2024</span>
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

<!-- Modal Profile -->
<style>
    .image-circle {
        width: 150px;        /* Ukuran lingkaran */
        height: 150px;       /* Ukuran lingkaran */
        border-radius: 50%;  /* Membuat gambar berbentuk lingkaran */
        overflow: hidden;    /* Memotong gambar yang melebihi batas lingkaran */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .image-circle img {
        width: 100%;         /* Lebar gambar mengikuti lebar kontainer */
        height: 100%;        /* Tinggi gambar mengikuti tinggi kontainer */
        object-fit: cover;   /* Memastikan gambar tetap proporsional dan terpotong dengan baik */
    }
</style>
<div class="modal fade" id="adminProfileModal" tabindex="-1" aria-labelledby="adminProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminProfileModalLabel">Profil Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <div class="image-circle">
                        <img src="{{ asset('img/user/' . Auth::user()->foto) }}" alt="Profile Photo">
                    </div>
                </div>
                <div class="mb-3">
                    <strong>Nama Lengkap:</strong>
                    <p>{{ Auth::user()->nama_lengkap }}</p>
                </div>
                <div class="mb-3">
                    <strong>Email:</strong>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="mb-3">
                    <strong>No. Telepon:</strong>
                    <p>{{ Auth::user()->no_telpon ?? 'Belum ditambahkan' }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
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
            <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
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