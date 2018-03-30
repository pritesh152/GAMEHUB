<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array(); 

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'mypro');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address = mysqli_real_escape_string($db , $_POST['address']);
  $phone = mysqli_real_escape_string($db , $_POST['phone']); 
 // form validation: ensure that the form is correctly filled
   if (empty($username)) { array_push($errors, "Username is required"); }
   $email =test_input($_POST["email"]);
   if (!filter_var ($email, FILTER_VALIDATE_EMAIL)){$emailErr = "Invalid email address.";}
   if (empty($phone)) { array_push($errors, "Phone is required"); }
   if  (empty($address)) { array_push($errors, "Address is required"); }
   if (empty($password_1)) { array_push($errors, "Password is required"); }
   if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
    if($phone < 1111111111){array_push($errors, "DIGITS ARE LESS THAN 10");}
	if($cardNumber < 1111111111111111) {array_push($errors, "NOT A VALID CARD NUMBER");}
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO customers (username, email, password , address , phone) 
  			  VALUES('$username', '$email', '$password' , '$address', '$phone')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }

}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 0) 
	{
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
		}
	
	}
}
?>
