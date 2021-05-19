 $(document).on('click', '#btn-edit', function () {
     $('.modal-body #id-tamu').val($(this).data('id'));
     $('.modal-body #nama_tamu').val($(this).data('nama_tamu'));
     $('.modal-body #asal').val($(this).data('asal'));
     $('.modal-body #tujuan').val($(this).data('tujuan'));
 })

//  Sweet Alert 2
// const swal = $('.swal').data('swal'); 
// if (swal) {
//     Swal.fire({
//         title: 'Data berhasil',
//         text: swal,
//         icon: 'success'

// //         title: 'Sweet!',
// //   text: 'Modal with a custom image.',
// //   images: '/assets/img/profile/success.png">',
// //   imageWidth: 400,
// //   imageHeight: 200,
// //   imageAlt: 'Custom image',


//     })
// }

// Swweet Alert 2
const swal = $('.swal').data('swal'); 
if (swal) {
    Swal.fire({
        title: 'Data berhasil',
        text: swal,
        icon: 'success'

    })
}
  
  $(document).on('click', '.btn-hapus', function(e) {
        // hentikan default
        e.preventDefault(); 
        const href = $(this).attr('href');


        Swal.fire({
        title: 'Apakah anda yakin?',
       
        text: "Data yang telah dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        confirmButtonText: 'Hapus',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        showCancelButton: true,
        // background: url("/assets/img/profile/dinna.jpg")
        imageUrl: ("/assets/img/profile/delete.png"),
        imageWidth: 200,
        imageHeight: 100
       
    
   
   
   
       
      
  
      }).then((result) => {
        if (result.value) {
         document.location.href = href; 
          
        }
      })

  })