<?php
session_start();
// include('func.php');
if(!isset($_SESSION['username']))
	echo "session expired";
else {
	include('func.php');
	display_admin_panel();
}