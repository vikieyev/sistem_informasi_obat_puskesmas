<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Tambah Produk</h4></center>
<hr>
<div id="ac">
<span>Barcode : </span><input type="text" style="width:265px; height:30px;" name="kode_barcode" ><br>
<span>Merek : </span><input type="text" style="width:265px; height:30px;" name="code" ><br>
<span>Nama Produk : </span><input type="text" style="width:265px; height:30px;" name="gen" Required/><br>
<span>Deskripsi : </span><textarea style="width:265px; height:50px;" name="name"> </textarea><br>
<span>Tanggal Masuk: </span><input type="date" style="width:265px; height:30px;" name="date_arrival" /><br>
<span>Tanggal Expired : </span><input type="date" value="<?php echo date ('M-d-Y'); ?>" style="width:265px; height:30px;" name="exdate" /><br>
<span>Harga Jual : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" Required><br>
<span>Harga Kulak : </span><input type="text" id="txt2" style="width:265px; height:30px;" name="o_price" onkeyup="sum();" Required><br>
<span>Profit : </span><input type="text" id="txt3" style="width:265px; height:30px;" name="profit" readonly><br>
<span>Supplier : </span>
<select name="supplier" style="width:265px; height:30px; margin-left:-5px;" >
	<?php
		session_start(); 
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM supliers where nama_toko = :nama_toko ");
		$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++)
		{
	?>
        <option value="<?php echo $row['suplier_name']; ?>" > <?php echo $row['suplier_name']; ?> </option>
    <?php 
		}
	?>
</select><br>
<span>Qty : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br>
<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan</button>
</div>
</div>
</form>
