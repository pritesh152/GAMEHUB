<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Address</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Please confirm your Delivery Address</h2>
  </div>
	
  <form method="post" action="payment.php">
  	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="caddress">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="change_address">CHANGE ADDRESS</button>
  	</div>
  </form>
</body>
</html>