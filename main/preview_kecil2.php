<!DOCTYPE html>
<html>
<head>
<?php require_once ('auth.php');?>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 100px; font-size: 3px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
}
}
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

<style>
@media print {
    .page-break { display: block; page-break-before: always; }
}
      #invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 40px;
  width: 150px;
  /* background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat; */
  background-size: 150px 40px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  /* background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat ; */
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}
 
    </style>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
<body>

<?php include('navfixed.php');?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice"><i class="icon-shopping-cart icon-2x"></i> Sales</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
		<!--	<li><a href="sales_inventory.php"><i class="icon-table icon-2x"></i> Product Inventory</a>                </li> --->
				<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="ok" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>           
          </div><!--/.well -->
        </div><!--/span-->
		
	<div class="span10">
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>

<div id="content">

	<div id="invoice-POS">
 
    <center>
      <h2><?php echo $_SESSION['SESS_FIRST_NAME'] ?></h2>
      <!-- <div class="logo"></div> -->
    <!---  <div class="info"> 
        <h2>SistemIT.com</h2>
      </div>
      --->
      <!--End Info-->
    </center><!--End InvoiceTop-->
 <!---
    <div id="mid">
      <div class="info">
        <h2>Info Kontak</h2>
        <p> 
           Alamat : Pekanbaru RIAU</br>
            Email  : xxxxxx@gmail.com</br>
            Telephone   : 08521361xxxx</br>
        </p>
      </div>
    </div>
    --->
    <!-- End Invoice Mid -->
    <?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
  
    <div id="bot">
 
                    <div id="table">
                    	<table>

							<tr class="tabletitle">
								<td>OR No. :</td>
								<td><?php echo $invoice ?></td>
							</tr>
							<tr class="tabletitle">
								<td>Date :</td>
								<td><?php echo $date ?></td>
							</tr>
						</table>

                        <table>
                            <tr class="tableitem">
                                <td class="itemtext"><h2>Item</h2></td>
                                <td class="itemtext"><h2>Qty</h2></td>
                                <td class="itemtext"><h2>Price</h2></td>
                                <td class="itemtext"><h2>Sub T</h2></td>
                            </tr>
                            </tr>

                            <?php
								$id=$_GET['invoice'];
								$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
								$result->bindParam(':userid', $id);
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
							?>
 							<tr class="service">
				
				<td class="tableitem"><p class="itemtext"><?php echo $row['gen_name']; ?></p></td>
				<td><p class="itemtext"><?php echo $row['qty']; ?></p></td>
				<td><p class="itemtext">
				<?php
				$ppp=$row['price'];
				echo $ppp;
				?>
				</p>
				</td>
				
				<td><p class="itemtext">
				<?php
				$dfdf=$row['amount'];
				echo $dfdf;
				?>
				</p>
				</td>
				</tr>
				<?php
					}
				?>
                            
 
                            <tr class="tableitem">
                                <td></td>
                                <td></td>
                                <td class="tableitem"><p class="itemtext">Total:</p></td>
                                <td class="payment"><p class="itemtext">
                                	<?php
										$sdsd=$_GET['invoice'];
										$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
										$resultas->bindParam(':a', $sdsd);
										$resultas->execute();
										for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfg=$rowas['sum(amount)'];
										echo $fgfg;
										}
										?>
                                </p></td>
                            </tr>
                            <tr class="tableitem">
                                <td></td>
                                <td></td>
                                <td class="tableitem"><p class="itemtext">Cash:</p></td>
                                <td class="tableitem"><p class="itemtext">
                                	<?php
									echo $cash;
									?>
                                </p></td>
                            </tr>
                            <tr class="tableitem">
                                <td></td>
                                <td></td>
                                <td class="tableitem"><p class="itemtext">
                                	<?php
										if($pt=='cash'){
										echo 'Change:';
										}
										if($pt=='credit'){
										echo 'Due Date:';
										}
									?>&nbsp;
                                </p></td>
                                <td class="tableitem"><p class="itemtext">
                                	<?php
										function formatMoney($number, $fractional=false) {
											if ($fractional) {
												$number = sprintf('%.2f', $number);
											}
											while (true) {
												$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
												if ($replaced != $number) {
													$number = $replaced;
												} else {
													break;
												}
											}
											return $number;
										}
										if($pt=='credit'){
										echo $cash;
										}
										if($pt=='cash'){
										echo $amount;
										}
									?>
                                </p></td>
                            </tr>
 
                        </table>
                    </div><!--End Table-->
 
                    <div id="legalcopy">
                        <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong>
                        </p>
                    </div>
 
                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
	</div>
<div class="pull-right" style="margin-right:100px;">
		<a onclick="printDiv('content')" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>


