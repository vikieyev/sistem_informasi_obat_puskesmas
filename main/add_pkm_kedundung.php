<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_pkm_kedundung.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Tambah Obat</h4></center>
<hr>
<div id="ac">
<span>Nama Obat : </span>
<select name="no_obat" style="width:265px; height:30px; margin-left:-5px;" >
	<?php
		session_start(); 
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM master_obat order by nama_obat asc");
		//$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++)
		{
	?>
        <option value="<?php echo $row['no_obat']; ?>" > <?php echo $row['nama_obat']."|". $row['no_batch'] ."|" . $row['satuan'] . "|" . $row['jumlah_terima'] . "|" . $row['ED'] ; ?> </option>
    <?php 
		}
	?>
</select><br>
<span>Nama PKM: </span><input type="text" id="txt1" style="width:265px; height:30px;" name="nama_pkm"  Required><br>
<!--- 
<span>Tanggal Terima: </span><input type="date" value="<?php echo date ('Y-M-d'); ?>" style="width:265px; height:30px;" name="tgl_terima" Required/><br>
--->
<span>Alokasi PKM Persen: </span><input type="number" id="txt1" style="width:265px; height:30px;" name="jumlah" onkeyup="sum();" Required><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan</button>
</div>
</div>
</form>
