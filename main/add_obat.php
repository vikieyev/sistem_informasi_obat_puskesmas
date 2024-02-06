<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_obat.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Tambah Obat</h4></center>
<hr>
<div id="ac">
	<span>Nama Obat : </span><input type="text" style="width:265px; height:30px;" name="nama_obat" Required><br>
	<span>Satuan : </span><input type="text" style="width:265px; height:30px;" name="satuan" Required><br>
	<span>No Batch : </span><input type="text" style="width:265px; height:30px;" name="no_batch" Required><br>
	<span>Sumber Anggaran : </span><input type="text" style="width:265px; height:30px;" name="sumber_anggaran" Required/><br>
	<span>Keterangan : </span><textarea style="width:265px; height:50px;" name="keterangan"> </textarea><br>
	<span>Tanggal Terima: </span><input type="date" value="<?php echo date ('Y-M-d'); ?>" style="width:265px; height:30px;" name="tanggal_terima" Required/><br>
	<span>Tanggal Expired ED : </span><input type="date" value="<?php echo date ('M-d-Y'); ?>" style="width:265px; height:30px;" name="ED" Required/><br>
	<span>Jumlah Terima : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="jumlah_terima" onkeyup="sum();" Required><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan</button>
</div>
</div>
</form>
