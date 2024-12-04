console.log("File main.js berhasil dimuat");
console.log("loadData tersedia:", typeof loadData === 'function');

document.addEventListener('DOMContentLoaded', function () {
    window.loadData=function (url) {
        console.log("loadData called with kode_jasa:", url);
        $.ajax({
            url: url, // Endpoint untuk mengambil data
            method: 'get',
            success: function(data) {
                $('#dataNamaJasa').val(data.nama_jasa);
                $('#dataBiaya').val(data.biaya);
                $('#updateForm').attr('action', `/Admin/editJasa/${kode_jasa}`);
                // Buka modal setelah data tersedia
                $('#updateModal').modal('show');
                },
                error: function(error) {
                    console.error('Error:', error);
            }
        });
    }    
});