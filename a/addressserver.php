<?php

$address = "";

$db = mysqli_connect('localhost', 'root', '', 'mypro');

if(isset ($_POST[caddress])){
	
	$address = mysqli_real_escape_string($db, $_POST['address']);

	}


?>