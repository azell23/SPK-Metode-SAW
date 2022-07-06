<?php
include "koneksi.php";
$slq="select `db_spk`.`tbl_alternatif`.`id_alternatif` AS `id_alternatif`,`db_spk`.`tbl_alternatif`.`nama` AS `nama`,`db_spk`.`tbl_nilai`.`c1` AS `c1`,`db_spk`.`tbl_nilai`.`c2` AS `c2`,`db_spk`.`tbl_nilai`.`c3` AS `c3`,`db_spk`.`tbl_nilai`.`c4` AS `c4`,`db_spk`.`tbl_nilai`.`c5` AS `c5`,`db_spk`.`tbl_nilai`.`id_nilai` AS `id_nilai` from (`db_spk`.`tbl_alternatif` left join `db_spk`.`tbl_nilai` on((`db_spk`.`tbl_alternatif`.`id_alternatif` = `db_spk`.`tbl_nilai`.`id_alternatif`)))";
$hasil=mysqli_query($koneksi,$slq);
?>
<div class="container my-4">
 <?php
 if (isset($_GET['pesan'])) {
 ?>
 <div class="alert alert-info alert-dismissible fade show" role="alert">
   <strong>Pesan : </strong> Nilai berhasil diperbarui.
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div> 
 <?php
 }
 ?>
 <h1>Tabel Kriteria</h1>
 <table class="table table-bordered my-4">
  <thead>   
   <tr style="font-weight: bold">
    <td width="5%">No.</td>
    <td width="18%">Nama</td>
    <td width="13%">C1 (Rata-rata Raport)</td>
    <td width="13%">C2 (Sikap)</td>
    <td width="13%">C3 (Absensi)</td>
    <td width="13%">C4 (Ekstrakulikuler)</td>
    <td width="13%">C5 (Prestasi Kejuaraan)</td>
    
   </tr>
  </thead>
  <tbody>
   <?php
   $no=1;
   $i=0;
   while ($row=mysqli_fetch_array($hasil)) { 
   ?>
   <tr>
    <td><?php echo $no++?></td>
    <td><?php echo $row['nama']?></td>
    <form action="penilaian/aksi_penilaian.php" method="POST">
    <td>
     <input type="hidden" value="<?php echo $row['id_alternatif'] ?>" name="id_alternatif<?php echo $i;?>">
     <input type="hidden" value="<?php echo $row['id_nilai'] ?>" name="id_nilai<?php echo $i;?>">
     <input required="" class="form-control" type="text" value="<?php echo $row['c1']?>" name="c1<?php echo $i;?>">
    </td>
    <td><input required="" class="form-control" type="text" value="<?php echo $row['c2']?>" name="c2<?php echo $i;?>"></td>
    <td><input required="" class="form-control" type="text" value="<?php echo $row['c3']?>" name="c3<?php echo $i;?>"></td>
    <td><input required="" class="form-control" type="text" value="<?php echo $row['c4']?>" name="c4<?php echo $i;?>"></td> 
    <td><input required="" class="form-control" type="text" value="<?php echo $row['c5']?>" name="c5<?php echo $i;?>"></td>   
   </tr>
   <?php
   $i++;
   }
   ?>
   <tr>
    <td colspan="6">
     <input type="hidden" name="jumlah" value="<?php echo $i?>">
     <input type="submit" value="simpan" class="btn btn-success" name="simpan">
    </td>
   </tr>
   </form>
  </tbody>
 </table>
 <h3>Keterangan :</h3>
 <p>1. Rata-rata Raport ( <b>Sangat baik</b> : 
81-100; <b>Baik</b> : 71-80,99; 
<b>Cukup</b> : 60-70,99; <b>Kurang</b> : 
rata-rata kurang dari 60)</p>
<p>2. Sikap ( <b>Sangat baik</b> : 
81-100; <b>Baik</b> : 71-80,99; 
<b>Cukup</b> : 60-70,99; <b>Kurang</b> : 
rata-rata kurang dari 60)</p>
<p>3. Absensi ( <b>Sangat baik</b> : 
81-100; <b>Baik</b> : 71-80,99; 
<b>Cukup</b> : 60-70,99; <b>Kurang</b> : 
rata-rata kurang dari 60)</p>
<p>4. Ekstrakulikuler ( <b>Sangat baik</b> : 
81-100; <b>Baik</b> : 71-80,99; 
<b>Cukup</b> : 60-70,99; <b>Kurang</b> : 
rata-rata kurang dari 60)</p>
<p>5. Prestasi Kejuaraan ( <b>Baik</b> : 3; 
<b>Cukup</b> : 2; <b>Kurang</b> : 1)</p>
</div>
