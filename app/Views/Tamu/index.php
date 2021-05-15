<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

<div class="card">
    <div class="card-header">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
       <i class="class fa fa-plus">Tambah Data</i>
     </button>
    </div>

    <table class="table table-striped">
       <thead>
           <tr>
               <th>Id</th>
               <th>Nama Tamu</th>
               <th>Asal</th>
               <th>Tujuan</th>
           </tr>
       </thead>
       <tbody>
                <?php $i = 1; ?>
                <?php foreach($tamu->getResultArray() as $row) : ?>
           <tr>
               <td scope="row"> <?= $i; ?> </td>
               <td><?= $row['nama_tamu']; ?></td>
               <td><?= $row['asal'];  ?></td>
               <td><?= $row['tujuan']; ?></td>
           </tr>
               
                <?php $i++; ?>
           <?php endforeach; ?>

       </tbody>
   </table>

    <div class="card-body">
    </div>
</div>


   

</div>
<!-- /.container-fluid -->
 </div>
<!-- End of Main Content -->

 <!-- Button trigger modal -->

 
 <!-- Modal -->
 <div class="modal fade" id="modalTambah">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                     </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form action="<?= base_url('tamu/tambah'); ?>" method="post">
                     
                     <div class="form-group mb-0">
                       <label for="nama_tamu"></label>
                       <input type="text" name="nama_tamu" id="nama_tamu" class="form-control" placeholder="Masukkan nama tamu">
                     </div>
                     <div class="form-group mb-0">
                       <label for="asal"></label>
                       <input type="text" name="asal" id="asal" class="form-control" placeholder="Masukkan asal">
                     </div>
                     <div class="form-group mb-0">
                       <label for="tujuan"></label>
                       <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukkan tujuan">
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit " class="btn btn-primary">Tambah Data</button>
             </div>
         </div>
         </form>
     </div>
 </div>
 
 <script>
     $('#exampleModal').on('show.bs.modal', event => {
         var button = $(event.relatedTarget);
         var modal = $(this);
         // Use above variables to manipulate the DOM
         
     });
 </script>

   