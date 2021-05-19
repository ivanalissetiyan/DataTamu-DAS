<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    

    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

   
    <div class="row">
        <div class="col-md-6">
            <?php 
                if (session()->get('err')) {
                    echo "<div class='alert alert-danger p-0 pt-2' role='alert'>" . session()->get('err') . "</div>";
                    session()->remove('err');
                }
            ?>
        </div>
    </div>

<div class="card">
    <div class="card-header">
    <div class="row">
        <div class="col-md">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
        <i class="class fa fa-plus">Tambah Data</i>
        </button>
        </div>
         <div class="col-md">
           <button onclick="window.print()" class="btn btn-outline-secondary shadow float-right"> Print <i class="fa fa-print"></i> </button>
         
        </div>
    </div>

    </div>

    <table class="table table-striped">
       <thead>
           <tr>
               <th>Id</th>
               <th>Nama Tamu</th>
               <th>Asal</th>
               <th>Tujuan</th>
               <th>Opsi</th>
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
               <td>
                    <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" 
                    data-id="<?= $row['id']; ?>"
                    data-nama_tamu="<?= $row['nama_tamu']; ?>"
                    data-asal="<?= $row['asal']; ?>"
                    data-tujuan="<?= $row['tujuan']; ?>"
                    ><i class="fa fa-edit"></i> </button>
                    <!-- <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i> </button> -->
                    <a href="/tamu/hapus/<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-hapus"> <i class="fa fa-trash-alt"></i> </a>

               </td>
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

 
 <!-- Modal box tambah tamu-->
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
                 <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
             </div>
         </div>
         </form>
     </div>
 </div>

  <!-- Modal box edit tamu-->
  <div class="modal fade" id="modalUbah">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                     </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form action="<?= base_url('tamu/ubah'); ?>" method="post">
                     <input type="hidden" name="id" id="id-tamu">
                     <div class="form-group mb-0">
                       <label for="nama_tamu"></label>
                       <input type="text" name="nama_tamu" id="nama_tamu" class="form-control" value="<?= $row['nama_tamu'] ?>">
                     </div>
                     <div class="form-group mb-0">
                       <label for="asal"></label>
                       <input type="text" name="asal" id="asal" class="form-control" placeholder="Masukkan asal" value="<?= $row['asal'] ?>">
                     </div>
                     <div class="form-group mb-0">
                       <label for="tujuan"></label>
                       <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Masukkan tujuan" value="<?= $row['tujuan'] ?>">
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
             </div>
         </div>
         </form>
     </div>
 </div>



<!-- Modal Hapus Data Tamu -->
<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/tamu/hapus/<?= $row['id']; ?>" class="btn btn-primary">Yakin</a>
            </div>
        </div>
    </div>
</div>


 

   