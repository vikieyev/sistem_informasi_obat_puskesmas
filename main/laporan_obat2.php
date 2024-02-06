<?php
	session_start();
	require_once('auth.php');
	$jml_pkm = 0;
?>
<html>

<head>
<title>
POS
</title>
<link rel="shortcut icon" href="images/favicon.png">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<script language="javascript">
function Clickheretoprint_product_terlaris()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content_product_terlaris").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


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
</head>
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
<body>
<?php include('navfixed.php');?>
<?php include('sidebar_new.php')?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Laporan Obat
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Laporan Obat</li>
			</ul>

<!---
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>
</div>
--->

<form action="laporan_obat.php" method="get">
<center>
	<strong>
		Tgl Awal : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="<?php echo date("m/d/Y",strtotime(' -1 day')); ?>" /> Tgl Akhir: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="<?php echo date("m/d/Y",strtotime(' +1 day')); ?>" />
	</strong>
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">
 	<i class="icon icon-search icon-large"></i> Search
 </button>
 
</center>

</form>



<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Tanggal Terima from&nbsp;<?php echo date("d-M-Y", strtotime($_GET['d1'] ));?>&nbsp;to&nbsp;<?php echo date("d-M-Y", strtotime($_GET['d2'] ));?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="13%"> Nama Obat </th>
			<th width="13%"> No Batch </th>
			<th width="13%"> Tanggal Terima </th>
			<th width="20%"> ED </th>
			<th width="16%"> Satuan </th>
			<th width="18%"> Jumlah Terima </th>
			<?php
				include('../connect.php');
				$d1a=$_GET['d1'];
				$d2a=$_GET['d2'];
				$d1a = date("Y-m-d", strtotime($d1a));
				$d2a = date("Y-m-d", strtotime($d2a));
				
				$result = $db->prepare("SELECT * FROM pkm_kedundung WHERE tgl_terima BETWEEN :a AND :b ORDER by nama_obat ASC ");
				$result->bindParam(':a', $d1a);
				$result->bindParam(':b', $d2a);
				//$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']);
				$result->execute();
				$nama_pkm_tmp = "";
				for($i=0; $row = $result->fetch(); $i++){
					if($nama_pkm_tmp != $row['nama_pkm'] ){
						$nama_pkm_tmp = $row['nama_pkm'];
					
				?>
					<th width="13%"> <?php echo $row['nama_pkm'] . " Persen %"; ?> </th>
					<th width="13%"> <?php echo $row['nama_pkm'] . " Jumlah "; ?> </th>
					
				<?php
					}else{
							//break;
						}
					$jml_pkm = $jml_pkm + 1;
				}
				?>
				
		
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$d1 = date("Y-m-d", strtotime($d1));
				$d2 = date("Y-m-d", strtotime($d2));
				$result = $db->prepare("SELECT * FROM master_obat WHERE tanggal_terima BETWEEN :a AND :b  ORDER by nama_obat ASC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				//$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']);
				$result->execute();
				
				for($i=0; $row = $result->fetch(); $i++){
					// include('../connect.php');
					// $result2 = $db->prepare("select * from pkm_kedundung order by nama_pkm asc");
					// //$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']);
					// $result2->execute();
					// for($i2=0; $row2 = $result2->fetch(); $i2++){
						// if($row2['kode_obat'] == $row['no_obat']){
							
						
					
			?>
			
						<tr class="record">
							<td><?php echo $row['nama_obat']; ?></td>
							<td><?php echo $row['no_batch']; ?></td>
							<td><?php echo $row['tanggal_terima']; ?></td>
							<td><?php echo $row['ED']; ?></td>
							<td><?php echo $row['satuan']; ?></td>
							<td><?php $no_obat =$row['nama_obat']; echo $row['jumlah_terima']; ?></td>
							
								<?php
								include('../connect.php');
								$result2 = $db->prepare("SELECT * FROM pkm_kedundung where tgl_terima BETWEEN :a AND :b and nama_obat = :no_obat ORDER by nama_obat ASC ");
								$result2->bindParam(':no_obat', $no_obat);
								$result2->bindParam(':a', $d1);
								$result2->bindParam(':b', $d2);
								$result2->execute();
								
								$result3 = $db->prepare("SELECT * FROM pkm_kedundung where tgl_terima BETWEEN :a AND :b and nama_obat = :no_obat ORDER by nama_obat ASC ");
								$result3->bindParam(':no_obat', $no_obat);
								$result3->bindParam(':a', $d1);
								$result3->bindParam(':b', $d2);
								$result3->execute();
								$resnum = $result2;
								//$row3 = $result3->fetchAll();
								// try {
									// for($i3=0; $row3 = $result3->fetch(); $i3++){
										// echo $row3['nama_obat'];
									// }
									
								// }
								// catch(Exception $e) {
								  // echo 'Message: ' .$e->getMessage();
								// }
								
								if($result3->fetch(PDO::FETCH_NUM) > 0){
									//echo "ada";
								}else{
									for($p = 0; $p < $jml_pkm ; $p++){
										echo "<td > 0 %</td>";
										echo "<td > 0 </td>";
									}
									
								}
								for($i2=0; $row2 = $result2->fetch(); $i2++){
									// echo $row2['nama_obat'];
									// echo $no_obat;
									if($no_obat == $row2['nama_obat']){
										
									
									
								?>
									
									<td > <?php echo $row2['jumlah']. "%"; ?> </td>
									<td > <?php $jml = $row2['jumlah']; $tp=$row['jumlah_terima']; $tot_persen=$jml*$tp/100; echo round($tot_persen); ?> </td>
									
								<?php
									}else{
									echo "null";
								?>
									<td > <?php echo "0"; ?> </td>
									<td > <?php echo "0"; ?> </td>
								<?php
										
									}
								
								}
								?>
							
							
							
						</tr>
						
						
			<?php			
						// }
					// }
				}
			?>
			
			
	</tbody>
	<thead>
		
	</thead>

	</table>
	</br>
</div><!--  div content lap -->
	<div align="right"> 
	<a><button  style="width: 123px; height:35px;margin-top:-8px;margin-left:8px;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> <i class="icon-print"> </i>Print
</a></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>

</body>



<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>
</html>