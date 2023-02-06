<?php 
	$namaHOST = 'localhost';
	$namaUSER = 'root';
	$katalaluan = '' ;  //tanpa katalaluan -kosongkan quote
	$namaDB = 'dbase_homestay';

	$connect = mysqli_connect(
                            $namaHOST,
                            $namaUSER,
                            $katalaluan,
                            $namaDB,3307 );
	if(!$connect){
		echo "Capaian Ke Pangkalan Data Gagal";
	}else{
             //echo "Capaian Ke Pangkalan Data Berjaya";
	}
 ?>

