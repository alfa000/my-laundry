$(document).ready( function () {
    $('.datatables').DataTable();

    $(document).on('click', ".btn-hapus", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: "Yakin hapus data ini?",
            text: "Data yang terhapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url : url,
                    type : "POST",
                    data :{
                        '_method' : 'DELETE',
                        '_token' : $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function (body) {
                        $('.overlay-layer').removeClass('d-none');
                    },
                    success: function (res) {
                        Swal.fire("Data Bershasil Dihapus!", "", "success");
                        location.href = "";
                    },
                    error:function (xhr) {
                        Swal.fire("Data ini tidak bisa dihapus",  "warning");
                    }
                });
            }
        });
    });

    $('[data-toggle="tooltip"]').tooltip()
});
