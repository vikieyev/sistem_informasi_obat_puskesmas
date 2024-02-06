<html>
<head>
<!--
<meta name="viewport" content="width=device-width, initial-scale=1.0">
-->
<title>
SIMON KERJO
</title>
	<link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!--
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
-->
</head>
<?php 
 //session_start();
	$position=$_SESSION['SESS_LAST_NAME'];
	
?>
<body>
	
		<?php
			if($position=='admin') 
			{  
		?>	
			<div class="well sidebar-nav" >
			
				 <ul class="nav nav-list">
				 <li><a  href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
				 <li><a href="masterobat.php"><i class="icon-list-alt icon-2x"></i> Master Obat</a> </li>
				 <li><a href="puskesmas_kedundung.php"><i class="icon-list-alt icon-2x"></i> PKM </a> </li>
				 <li><a href="laporan_obat.php?d1=0"><i class="icon-list-alt icon-2x"></i> REPORT ALL </a> </li>
				 <!---
				<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>             
				
				<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Lap. Penjualan</a>                </li>
				<li><a href="customer.php"><i class="icon-group icon-2x"></i> Pelanggan</a>                                    </li>
				<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
				<li><a href="kasir.php"><i class="icon-group icon-2x"></i> Daftar User</a>                                    </li>
				<br>
				--->		
				<li>
				 <div class="hero-unit-clock">
			
				<form name="clock">
				<p style="color:white">Time: <br></p>
				&nbsp;<input style="width:150px;color:red" type="submit" class="trans" name="face" value="" disabled>
				</form>
			
				  </div>
				</li>
					</ul>                               
			</div><!--/.well -->
		<?php 
			}  
		?>

		<?php
			if($position=='Cashier') 
			{  
		?>	
			<div class="well sidebar-nav" >
			
				 <ul class="nav nav-list">
				  
				<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>             
						
				<li>
				 <div class="hero-unit-clock">
			
				<form name="clock">
				<p style="color:white">Time: <br></p>
				&nbsp;<input style="width:150px;color:red" type="submit" class="trans" name="face" value="" disabled>
				</form>
			
				  </div>
				</li>
					</ul>                               
			</div><!--/.well -->
		<?php 
			}  
		?>
</body>

</html>