<?php include ('dbConfig.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Player Unknown's Battle Grounds</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 10px;}
    .cart-link{ width: 100%; text-align:right; display: block; font-size:50px; height:50%; }

    </style>
</head>
</head>
<body>
<div class="container">
    <h1><b></b></h1>
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM products WHERE id = 9");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
       
            <div class="thumbnail">
                <div class="caption">
				<h1 class="list-group-item-heading"><?php echo $row["name"]; ?></h1>
                    <image src="pubj.jpg">
					<h1 class="list-group-item-text"><?php echo $row["description"]; ?></h1>
                    <image src="images/bat/batman.jpeg" height="200px"></image>
					<h1>Platform : PC</h1>
					<h1>Series : Massively Multiplayer Competitive</h1>
					<h1>TYPE : Full Game</h1>
					<div class="row">
                        <div class="col-md-1">
                            <h1 class="lead"><big><big><?php echo '$'.$row["price"].' USD'; ?></h1>
                        </div>
                        <div class="col-md-1">
                            <h1><a class="btn btn-success" href="cartAction.php ? action=addToCart&id=<?php echo $row["id"]; ?>"><h3>Add to cart</h3></a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>
<center><button class="btn btn-primary" href="page1.html"><h2>BACK</h2></button></center>
</body>
</html>