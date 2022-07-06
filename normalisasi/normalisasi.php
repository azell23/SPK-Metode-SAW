<div class="container my-4">
<h1>Normalisasi</h1>
<?php
include "koneksi.php";
$sql="select * from tbl_nilai where skor IS NULL";
$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
if (!$hasil || mysqli_num_rows($hasil)>0) {
?>
 <a href="rangking/aksi_rangking.php"><input style="margin-bottom:5px " class="btn btn-primary" type="button" name="" value="Perbarui"></a>
<?php
}
$sql1="select max(c1) as max_c1, max(c2) as max_c2, max(c3) as max_c3,max(c4) as max_c4,max(c5) as max_c5 from tbl_nilai";
$hasil1=mysqli_query($koneksi,$sql1);
$row=mysqli_fetch_array($hasil1);
$max_c1=$row['max_c1'];
$max_c2=$row['max_c2'];
$max_c3=$row['max_c3'];
$max_c4=$row['max_c4'];
$max_c5=$row['max_c5'];


// $sql2=" select * from tbl_bobot";
// $hasil2=mysqli_query($koneksi,$sql2);
// $row2=mysqli_fetch_array($hasil2);
// $w1=$row2['w1'];
// $w2=$row2['w2'];
// $w3=$row2['w3'];
// $w4=$row2['w4'];
// $w5=$row2['w5'];



$sql3="select * from tbl_nilai";
$hasil3=mysqli_query($koneksi,$sql3);

$i=0;
?>
 <table class="table table-bordered">
  <thead>   
   <tr style="font-weight: bold">
    <td width="5%">No.</td>
    <td width="10%">Nama</td>
    <td width="15%">C1(Rata rata Raport)</td>
    <td width="15%">C2(Sikap)</td>
    <td width="15%">C3(Absensi)</td>
    <td width="15%">C4(Ekstrakulikuler)</td>
    <td width="15%">C5(Prestasi Kejuaraan)</td>
    
   </tr>
  </thead>
  <tbody>
   <?php
   $no=1;
   $i=0;
   
   while ($row=mysqli_fetch_array($hasil3)) { 
    $id_nilai[$i]=$row['id_nilai'];
    $myquery = "select * from tbl_alternatif where id_alternatif=".$row['id_alternatif'];
    $sqlku =mysqli_query($koneksi,$myquery);
    while ($row2=mysqli_fetch_array($sqlku)) { 
        $a1= $row2['nama'];

    $c1_normalisasi=round(($row['c1']/$max_c1),2);
    $c2_normalisasi=round(($row['c2']/$max_c2),2);
    $c3_normalisasi=round(($row['c3']/$max_c3),2);
    $c4_normalisasi=round(($row['c4']/$max_c4),2);
    $c5_normalisasi=round(($row['c5']/$max_c5),2);
   ?>
   <tr>

    <td><?php echo $no++?></td>
    <td><?php echo $a1 ?></td>
    <td><?php echo $c1_normalisasi?></td>
    <td><?php echo $c2_normalisasi?></td>
    <td><?php echo $c3_normalisasi?></td>
    <td><?php echo $c4_normalisasi?></td>
    <td><?php echo $c5_normalisasi?></td>
   </tr>
   <?php
   $i++;
   }
   ?>
   <?php
   $i++;
   }
   ?>
   
   </form>
  </tbody>
 </table>
</div>