<?php
// include database configuration file
include ('dbConfig.php');

// initializ shopping cart class
include ('cart.php');
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}
// set customer ID in session
$_SESSION['sessCustomerID'] = 22	;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 100% ; float: left;}
    .shipAddr{width: 100%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th><h1>Product</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Quantity</h1></th>
            <th><h1>Subtotal</h1></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><h1><?php echo $item["name"]; ?></h1></td>
            <td><h1><?php echo '$'.$item["price"].' USD'; ?></h1></td>
            <td><h1><?php echo $item["qty"]; ?></h1></td>
            <td><h1><?php echo '$'.$item["subtotal"].' USD'; ?></h1></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr> 
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><h2><strong>Total <?php echo '$'.$cart->total().'USD'; ?></strong></h2></td>
            <?php } ?> 
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h2>Shipping Details</h2>
        <h1 style="color: gold;">Name</h1><h2></br><?php echo $custRow['username']; ?></h2>
        <h1  style="color: gold;">Email</h1><h2></br><?php echo $custRow['email']; ?></h2>
        <h1  style="color: gold;">Phone</h1><h2></br><?php echo $custRow['phone']; ?></h2>
        <h1 style="color: gold;">Address</h1><h2></br><?php echo $custRow['address']; ?></h2>
    </div>
    <div class="footBtn">
        <a href="page2.html" class="btn btn-warning"><h2><i class="glyphicon"></i> Continue Shopping</h2></a>
       <a href="delivery.php" class="btn btn-warning"><h2>ADDRESS</h2></a>
    </div>
</div>
</body>
</html>