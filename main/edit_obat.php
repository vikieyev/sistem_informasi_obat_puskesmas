<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM master_obat WHERE no_obat= :no_obat");
	$result->bindParam(':no_obat', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_edit_obat.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Obat</h4></center>
<hr>
<div id="ac">

<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Nama Obat : </span><input type="text" style="width:265px; height:30px;"  name="nama_obat" value="<?php echo $row['nama_obat']; ?>"/><br>
<span>Satuan : </span><input type="text" style="width:265px; height:30px;"  name="satuan" value="<?php echo $row['satuan']; ?>" Required/><br>
<span>Sumber Anggaran : </span><input type="text" style="width:265px; height:30px;"  name="sumber_anggaran" value="<?php echo $row['sumber_anggaran']; ?>"/><br>
<span>No Batch : </span><input type="text" style="width:265px; height:30px;"  name="no_batch" value="<?php echo $row['no_batch']; ?>" /><br>
<span>Keterangan : </span><textarea style="width:265px; height:50px;" name="keterangan" ><?php echo $row['keterangan']; ?> </textarea><br>
<span>Tanggal Terima: </span><input type	="date" style="width:265px; height:30px;" name="tanggal_terima" value="<?php echo $row['tanggal_terima']; ?>" /><br>
<span>Tanggal Expired ED : </span><input type	="date" style="width:265px; height:30px;" name="ED" value="<?php echo $row['ED']; ?>" /><br>
<span>Jumlah Terima : </span><input type="number" style="width:265px; height:30px;" id="txt1" name="jumlah_terima" value="<?php echo $row['jumlah_terima']; ?>" onkeyup="sum();" Required/><br>
<br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan Perubahan</button>
</div>
</div>
</form>
<?php
}
?>