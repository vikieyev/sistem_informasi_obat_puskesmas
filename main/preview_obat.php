<?php
	session_start();
	require_once ('auth.php');
?>

<!DOCTYPE html>
<html>
<head>

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
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
$invoice = "";
$kode_obat=$_GET['kode_obat'];
include('../connect.php');
/*
$result = $db->prepare("SELECT a.*,b.* FROM master_obat a join pkm_kedundung b on a.no_obat = b.kode_obat WHERE b.kode_obat = :kode_obat");
$result->bindParam(':kode_obat', $kode_obat);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	
	$no = $row['no'];
	$nama_pkm = $row['nama_pkm'];
	$kode_obat = $row['kode_obat'];
	$no_batch = $row['no_batch'];
	$tgl_terima = $row['tgl_terima'];
	$nama_obat = $row['nama_obat'];
	
	$satuan = $row['satuan'];
	$jml_terima =  $row['jumlah_terima'];
	$jml_pkm = $row['jumlah'];
	
	$jml = $row['jumlah']; $tp=$row['jumlah_terima']; $tot_persen=$jml*$tp/100; echo round($tot_persen);
	
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
*/
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
<?php include('sidebar_new.php');?>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             
        </div><!--/span-->
		 
	<div class="span10">
	<a href="preview_kecil.php?invoice=<?php echo $invoice; ?>"> <button class="btn btn-default"><i class="icon-arrow-left"></i> Kembali</button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center>
		<div style="font:bold 25px 'Aleo';"><?php echo $kode_obat ?></div>
	</center>
	
	</div>
	
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th> PKM </th>
				<th> KODE OBAT </th>
				<th> NO BATCH </th>
				<th> SATUAN </th>
				<th> TANGGAL TERIMA </th>
				<th> PERENCANAAN </th>
				<th> PERSEN </th>
				<!-- <th> Note </th> -->
				<th> ALOKASI </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$kode_obat=$_GET['kode_obat'];
					$no_batch=$_GET['no_batch'];
					if(is_null($kode_obat)){
						$kode_obat = "null";
					}
					//include('../connect.php');
					$result = $db->prepare("SELECT a.*,a.tanggal_terima as tgl_terima_obat,a.satuan as satuan_obat,a.no_batch as no_batch_obat,b.* FROM master_obat a join pkm_kedundung b on a.nama_obat = b.nama_obat WHERE b.nama_obat = :nama_obat and a.no_batch = :no_batch");
					$result->bindParam(':nama_obat', $kode_obat);
					$result->bindParam(':no_batch', $no_batch);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['nama_pkm']; ?></td>
				<td><?php echo $row['no_obat']; ?></td>
				<td><?php echo $row['no_batch_obat']; ?></td>
				<td><?php echo $row['satuan_obat']; ?></td>
				<td><?php echo $row['tgl_terima_obat']; ?></td>
				<td><?php echo $row['jumlah_terima']; ?></td>
				<td>
				<?php
				$ppp=$row['jumlah'];
				echo $ppp . " %" ;
				?>
				</td>
				<!-- <td>
				<?php $jml = $row['jumlah']; $tp=$row['jumlah_terima']; $tot_persen=$jml*$tp/100; echo round($tot_persen); ?>
				</td> -->
				<td>
				<?php $jml = $row['jumlah']; $tp=$row['jumlah_terima']; $tot_persen=$jml*$tp/100; echo round($tot_persen); ?>
				</td>
				</tr>
				<?php
					}
				?>
			
				
				<?php $pt = "" ;if($pt=='cash'){
				?>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Cash :&nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
						
		</tbody>
	</table>
	
	</div>
	</div>
	</div>
	</div>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>


