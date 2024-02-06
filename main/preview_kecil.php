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
function Clickheretoprint(divName)
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  //var content_vlue = document.getElementById("content").innerHTML;
  var content_vlue = document.getElementById(divName).innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
  // docprint.document.write('<head></head><body onLoad="self.print()" style="width: 100px; font-size: 12px; font-family: arial;">');          
  docprint.document.write('<style>table { font-size:10px;} body{ font-size:12px;}</style><body onLoad="self.print()">');
  docprint.document.write(content_vlue); 
   docprint.document.write('</body></html>' );
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

    .page-break { display: block; page-break-before: always;  }
    div.centerOnPrintedPage {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        margin: auto;
        width: 58mm;
    }
}
      #invoice-POS {
  /* box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.3); */

  padding: 0.1mm;
  margin: 0 auto ;
  
  width: 58mm;
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

<?php 
  include('navfixed.php'); 
?>
<?php include('sidebar_new.php');?>
  <div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
             
    </div>
    
    <div class="span10">
    <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>
    
<div id="content">
 <div class="centerOnPrintedPage">
  <div id="invoice-POS">
 
    <center>
      <?php echo $_SESSION['SESS_FIRST_NAME'] ?>
    </center>
    <?php
  // $resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
  // $resulta->bindParam(':a', $cname);
  // $resulta->execute();
  // for($i=0; $rowa = $resulta->fetch(); $i++){
  // $address=$rowa['address'];
  // $contact=$rowa['contact'];
  // }
  ?>
  
    <div id="bot">
 
            <div id="table">
                      <table>

              <tr class="tabletitle">
                <td>No.Nota :</td>
                <td><?php echo $invoice ?></td>
              </tr>
              <tr class="tabletitle">
                <td>Customer :</td>
                <td><?php echo $cname ?></td>
              </tr>
              <tr class="tabletitle">
                <td>Tgl :</td>
                <td><?php echo date("d-M-Y", strtotime($date )) ." ". date("H:i:s") ?></td>
              </tr>
              <tr class="tabletitle">
                <td>Kasir :</td>
                <td><?php echo  $_SESSION['SESS_USER_NAME']; ?></td>
              </tr>
            </table>

                        <table>
                            <tr class="tableitem">
                                <td class="itemtext"><b>Item</b></td>
                                <td class="itemtext"><b>Qty</b></td>
                                <td class="itemtext"><b>Harga</b></td>
                                <td class="itemtext"><b>S.Total</b></td>
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
        echo formatMoney($ppp);
        ?>
        </p>
        </td>
        
        <td><p class="itemtext">
        <?php
        $dfdf=$row['amount'];
        echo formatMoney($dfdf);
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
                    echo formatMoney($fgfg);
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
                  echo formatMoney($cash);
                  ?>
                                </p></td>
                            </tr>
                            <tr class="tableitem">
                                <td></td>
                                <td></td>
                                <td class="tableitem"><p class="itemtext">
                                  <?php
                    if($pt=='cash'){
                    echo 'Kembali:';
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
                    echo formatMoney($amount);
                    }
                  ?>
                                </p></td>
                            </tr>
 
                        </table>
                    </div><!--End Table-->
 
                    <div id="legalcopy">
                        <center><p class="legal"><b>Terima kasih!</b></center>
                        </p>
                    </div>
 
                </div><!--End InvoiceBot-->
    </div><!--End Invoice-->
   </div>
  </div>
 </div> <!--End Content-->
</div>
                  </br>
                  
<!-- <div class="pull-right" style="margin-right:100px;"> -->
<div class="center" style="margin-right:200px;">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
             
    </div>
    
    <div class="span10">
    <a onclick="printDiv('content')" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print dari PC</button></a>
     
    <a href="javascript:Clickheretoprint('content')" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print dari HP</button></a>
    <a href="preview.php?invoice=<?php echo $id; ?>" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Nota Besar</button></a>
    </div>  
</div>
</div>


