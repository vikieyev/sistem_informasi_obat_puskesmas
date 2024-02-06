<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savekasir.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Tambah User</h4></center>
<hr>
<div id="ac">
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" required/><br>
<span>Password : </span><input type="text" style="width:265px; height:30px;" name="password" required/><br>
<span>Posisi : </span><select name="posisi" style="width:265px; height:30px; margin-left: 0px;" ><option value="Cashier"> Kasir </option> <option value="admin"> Admin </option> </select><br>
</br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan</button>
</div>
</div>
</form>