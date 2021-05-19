<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Tamu.xls");

?>

<html>
    <body>
    <table border="1">
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
    </body>
</html>