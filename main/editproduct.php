<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Produk</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Barcode : </span><input type="text" style="width:265px; height:30px;"  name="kode_barcode" value="<?php echo $row['kode_barcode']; ?>"/><br>
<span>Merek : </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" Required/><br>
<span>Nama Produk : </span><input type="text" style="width:265px; height:30px;"  name="gen" value="<?php echo $row['gen_name']; ?>" /><br>
<span>Deskripsi : </span><textarea style="width:265px; height:50px;" name="name" ><?php echo $row['product_name']; ?> </textarea><br>
<span>Tanggal Masuk: </span><input type	="date" style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['date_arrival']; ?>" /><br>
<span>Tanggal Expired : </span><input type	="date" style="width:265px; height:30px;" name="exdate" value="<?php echo $row['expiry_date']; ?>" /><br>
<span>Harga Jual : </span><input type="text" style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>
<span>Harga Kulak : </span><input type="text" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>
<span>Profit : </span><input type="text" style="width:265px; height:30px;" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>

<span>Sisa Qty: </span><input type="number" style="width:265px; height:30px;" min="0" name="qty" value="<?php echo $row['qty']; ?>" /><br>
<span>Qty: </span><input type="number" style="width:265px; height:30px;" min="0" name="sold" value="<?php echo $row['qty_sold']; ?>" /><br>
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
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan Perubahan</button>
</div>
</div>
</form>
<?php
}
?>