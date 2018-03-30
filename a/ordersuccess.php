<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Success</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Order Status</h1>
    <h1>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></h1>
	<h1><a href="page2.html">THANK YOU</a></h1>
</div>
</body>
</html>