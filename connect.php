<?php
/* Database config */
// $db_host		= '194.233.70.182';
// $db_user		= 'ullql3vr_rko';
// $db_pass		= '6B[2u&wz~B#u';
// $db_database	= 'ullql3vr_rko';

$db_host		= 'localhost';
$db_user		= 'pos';
$db_pass		= 'yestha1987';
$db_database	= 'rko';

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>