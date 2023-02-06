<!--Import Data Unit -->
<!--Bahagian Borang upload -->
<?php if(empty($_POST['import'])) { ?>
<h2>Kemudahan Import Data Unit Homestay</h2>
<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
	<label>Masukkan Data Jenis CSV Bagi Unit Homestay Sahaja</label>
	<fieldset>
	<input type="file" name="file" id="file">
	<input type="submit" name="import" value="Upload Fail CSV">
	</fieldset>
</form>
<!-- Bahagian Pemprosesan Import -->
<?php }else{
	//Terima kiriman fail dari Borang Import
	$faildata=$_FILES['file']['tmp_name'];
	   $bukafail=fopen($faildata, "r");
	   //banyak data-data yang tersimpan hendak dibuka
	   while(($GETdata = fgetcsv($bukafail,1000, ",")) !== FALSE){
	   //Sambung ke Pangkalan Data DBMS
	   include 'capaian.php';
	   //Query masukan data
	   $SQL="insert into unit(kodunit,namaunit,harga,kodstatus)
	   		values('".$GETdata[0]."','".$GETdata[1]."','".$GETdata[2]."','".$GETdata[3]."');";
	   $simpan=mysqli_query($connect,$SQL);
	   		if($simpan){
	   			echo "Import Berjaya -";
	   		}else{
	   			echo "Import Gagal -";
	   		}
	   } 
	   
	   fclose($bukafail);
} 
?>