<?php
//ob_start();
	//Start session
	session_start();

?>
<!DOCTYPE html>
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
    
      .sidebar-nav {
        padding: 9px 0;

        /* Fullscreen Button 
		------------------------------*/

		#fullscreen-button {
			position: absolute;
			top:  15px;
			right:  15px;
			background: rgba(0,0,0,0.05);
			border:  0;
			width:  40px;
			height:  40px;
			border-radius: 50%;
			box-sizing: border-box;
			transition:  transform .3s;
			font-size: 0;
			opacity: 1;
			pointer-events: auto;
			cursor:  pointer;
		}

		#fullscreen-button:hover {
			transform: scale(1.125);
		}

		#fullscreen-button span {
			width:  4px;
			height:  4px;
			border-top:  2.5px solid #111; /* color */
			border-left:  2.5px solid #111; /* color */
			position: absolute;
			outline: 1px solid transparent;
			-webkit-backface-visibility: hidden;
			transform: translateZ(0);
			will-change: transform;
			-webkit-perspective: 1000;
			transition:  .3s;
			transition-delay: .75s;
		}

		#fullscreen-button span:nth-child(1) {
			top: 11px;
			left: 11px;
		}

		#fullscreen-button span:nth-child(2) {
			top: 11px;
			left: 22px;
			transform: rotate(90deg);
		}

		#fullscreen-button span:nth-child(3) {
			top: 22px;
			left: 11px;
			transform: rotate(-90deg);
		}

		#fullscreen-button span:nth-child(4) {
			top: 22px;
			left: 22px;
			transform: rotate(-180deg);
		}


		/* Fullscreen True
		------------------------------*/

		[fullscreen] #fullscreen-button span:nth-child(1) {
			top: 22px;
			left: 22px;
		}

		[fullscreen] #fullscreen-button span:nth-child(2) {
			top: 22px;
			left: 11px;
		}

		[fullscreen] #fullscreen-button span:nth-child(3) {
			top: 11px;
			left: 22px;
		}

		[fullscreen] #fullscreen-button span:nth-child(4) {
			top: 11px;
			left: 11px;
		}

		/* Dark Style
		------------------------------*/

		[light-mode=dark] {
			background: #111;
			color:  #fff;
		}

		[light-mode=dark] #fullscreen-button {
			background: rgba(255,255,255,.05);
		}


		[light-mode=dark] #fullscreen-button span {
			border-top:  2.5px solid #fff;
			border-left:  2.5px solid #fff;
		}

      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
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
<?php
	require_once('auth.php');
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
</head>


<body light-mode="dark">

<?php 
	include('navfixed.php');
?>
<?php include('sidebar_new.php')?>
<?php
	$position=$_SESSION['SESS_LAST_NAME'];
	if($position=='Cashier') {
	//header("location: sales.php?id=cash&invoice=.$finalcode.");
	//echo "<html><meta http-equiv='refresh' content='0; URL=sales.php?id=cash&invoice=$finalcode'></html>";
			
?>
<!-- <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a> -->

<!-- <a href="../index.php">Logout</a> -->
<?php
}

if($position=='admin') {
?>
	
	<div class="container-fluid" >
      <div class="row-fluid">
	<div class="span2">
	
	<!---
          <div class="well sidebar-nav">
                     <ul class="nav nav-list">
              <li class="active"><a  href="#"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Barang/Jasa</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Pelanggan</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Lap. Penjualan</a>                </li>
			<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				</ul>                               
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active"><a onclick="toggle_fullscreen()" href="#">Fullscreen F11</a></li>
			</ul>
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center><?php echo $_SESSION['SESS_FIRST_NAME'] ?> </center></font>
<div id="mainmain">


<a href="masterobat.php"><i class="icon-list-alt icon-2x"></i><br> Master Obat</a>
<a href="puskesmas_kedundung.php"><i class="icon-list-alt icon-2x"></i><br> PKM </a>
<a href="laporan_obat.php?d1=0"><i class="icon-list-alt icon-2x"></i><br> LAPORAN ALL </a>
<!---
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Penjualan</a>               
      
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Pelanggan</a>     
<a href="supplier.php"><i class="icon-group icon-2x"></i><br> Suppliers</a>
<a href="kasir.php"><i class="icon-group icon-2x"></i><br> Daftar User</a>     
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Lap. Penjualan</a>
--->
<a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a> 
<?php
}
?>

<div class="clearfix"></div>

</div>
</div>
</div>
</div>



</body>

<?php include('footer.php');?>

<script language="javascript" type="text/javascript">

	// Fullscreen button
	console.log("fullscreen button");
	//window.onload=create_fullscreen_button;
    if (document.fullscreenEnabled || document.webkitFullscreenEnabled || 
	  	document.msFullscreenEnabled ) {
		create_fullscreen_button();
	}

    function create_fullscreen_button() {

        let fullscreen_button = document.createElement("button");
        fullscreen_button.setAttribute('id','fullscreen-button');
        fullscreen_button.addEventListener("click", toggle_fullscreen);

        fullscreen_button.innerHTML  = `
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        `;

        document.body.appendChild(fullscreen_button);

    }


    function toggle_fullscreen() {

		if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) { 

			if (document.documentElement.requestFullscreen) {
			    document.documentElement.requestFullscreen()
			} else if (document.documentElement.mozRequestFullScreen) {
			    document.documentElement.mozRequestFullScreen()
			} else if (document.documentElement.webkitRequestFullscreen) {
			    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
			}

		document.body.setAttribute("fullscreen","") 

		} else {

			if (document.cancelFullScreen) {
			    document.cancelFullScreen()
			} else if (document.mozCancelFullScreen) {
			    document.mozCancelFullScreen()
			} else if (document.webkitCancelFullScreen) {
			    document.webkitCancelFullScreen()
			}

			document.body.removeAttribute("fullscreen") 

		}
		
	}


	function check_fullscreen() {

        // Because users can exit & enter fullscreen by other methods

        if (document.fullscreenElement || document.webkitIsFullScreen || document.mozFullScreen) { 
            document.body.setAttribute("fullscreen","") 
        }

        else  { 
            document.body.removeAttribute("fullscreen") 
        }
    }

    setInterval(function(){ check_fullscreen();}, 1000); 



</script>

<script>
/* Get the documentElement (<html>) to display the page in fullscreen */
var elem = document.documentElement;
var wscript = new ActiveXObject("WScript.Shell");
/* View in fullscreen */
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
    if (wscript !== null) {
             wscript.SendKeys("{F11}");
         }
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
    if (wscript !== null) {
             wscript.SendKeys("{F11}");
         }
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
    if (wscript !== null) {
             wscript.SendKeys("{F11}");
         }
  }
}

/* Close fullscreen */
function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
    document.msExitFullscreen();
  }
}

function mKeyF11(){
    var e = new Event('keypress');
    e.which = 122; // Character F11 equivalent.
    e.altKey=false;
    e.ctrlKey=false;
    e.shiftKey=false;
    e.metaKey=false;
    e.bubbles=true;
    document.dispatchEvent(e);
}

// function requestFullScreen() {
// 	var elemment = document.documentElement; // Make the body go full screen.
//     // Supports most browsers and their versions.
//     var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

//     if (requestMethod) { // Native full screen.
//         requestMethod.call(element);
//     } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
//         var wscript = new ActiveXObject("WScript.Shell");
//         if (wscript !== null) {
//             wscript.SendKeys("{F11}");
//         }
//     }
// }


//requestFullScreen(element);
</script>


</html>
