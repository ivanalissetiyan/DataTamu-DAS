<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

<div class="card">
    <img class="card-img-top" src="holder.js/100x180/" alt="">

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

 

   