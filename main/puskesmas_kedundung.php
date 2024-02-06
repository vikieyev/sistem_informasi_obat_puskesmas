<?php 
session_start();
require_once('auth.php');
?>

<html>
<head>
<title>
SIMON KERJO
</title>


 <link href="css/bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png">
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
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
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

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
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

<body>
<?php include('navfixed.php');?>
<?php include('sidebar_new.php')?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-table"></i> PKM
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">PKM</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("select DISTINCT nama_pkm from pkm_kedundung");
				//$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']); //tambahan nama toko//
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM master_obat where jumlah_terima < 10 ");
				//$result->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']); //tambahan nama toko//
				$result->execute();
				$rowcount123 = $result->rowcount();

			?>
				<div style="text-align:center;">
			Jumlah PKM:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
</div>


<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search ..." autocomplete="off" />
<a rel="facebox" href="add_pkm_kedundung.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i>Tambah Obat</button></a><br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="5%"> No </th>
			<th width="15%"> Nama PKM </th>
			<th width="5%"> Kode Obat </th>
			<th width="5%"> No Batch </th>
			<th width="5%"> Tanggal Terima </th>
			<th width="15%"> Nama Obat </th>
			<th width="5%"> Satuan </th>
			<th width="5%"> Total Terima PKM </th>
			<th width="5%"> Persen </th>
			<th width="5%"> Jumlah Alokasi PKM</th>
			<th width="6%"> </th>
		</tr>
	</thead>
	<tbody>
		
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
				include('../connect.php');
				$nama_toko = $_SESSION['SESS_FIRST_NAME'];
				$result = $db->prepare("SELECT a.*,b.* FROM master_obat a join pkm_kedundung b on a.no_obat = b.kode_obat");
				//$result = $db->prepare("SELECT * FROM pkm_kedundung ORDER BY nama_obat ASC");
				//$result->bindParam(':nama_toko', $nama_toko); //tambahan nama toko//
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++)
				{
						//$total=$row['total'];
						$availableqty=$row['jumlah'];
						if ($availableqty < 10) {
						echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
						}
						else {
						echo '<tr class="record">';
						}
					?>
				

					<td><?php echo $row['no']; ?></td>
					<td><?php echo $row['nama_pkm']; ?></td>
					<td><?php echo $row['kode_obat']; ?></td>
					<td><?php echo $row['no_batch']; ?></td>
					<td><?php echo $row['tgl_terima']; ?></td>
					<td><?php echo $row['nama_obat']; ?></td>
					
					<td><?php echo $row['satuan']; ?></td>
					<td><?php echo $row['jumlah_terima']; ?></td>
					<td><?php echo $row['jumlah'] . " %"; ?></td>
					
					<td><?php $jml = $row['jumlah']; $tp=$row['jumlah_terima']; $tot_persen=$jml*$tp/100; echo round($tot_persen); ?></td>
					<td> <a rel="facebox">  </a> 
					<a href="#" id="<?php echo $row['no']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
					</tr>
					<?php
				}
			?>
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

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
 if(confirm("Sure you want to delete this Product? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_pkm_kedundung.php",
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
</body>
<?php include('footer.php');?>

</html>