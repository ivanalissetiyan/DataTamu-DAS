 $(document).on('click', '#btn-edit', function () {
     $('.modal-body #id-tamu').val($(this).data('id'));
     $('.modal-body #nama_tamu').val($(this).data('nama_tamu'));
     $('.modal-body #asal').val($(this).data('asal'));
     $('.modal-body #tujuan').val($(this).data('tujuan'));
 })