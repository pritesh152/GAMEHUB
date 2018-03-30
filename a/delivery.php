<?php require ('server2.php') ?>
<!DOCTYPE html>
<html>
<head>Confirm your Delivery Address</head>
<body>
<form method="POST" action="delivery.php">
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address">
  	</div>
	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="number" name="phone">
  	</div>
	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user2">Update</button>
  	</div>
</form>
</body>
</html>
