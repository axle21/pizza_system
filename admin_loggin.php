<?php
require('db.php');
session_start();
if (isset($_POST['username'])){
       
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($connect,$username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($connect,$password);
  
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
  $result = mysqli_query($connect,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['username'] = $username;
            // Redirect user to index.php
      header("Location: admin.php");
         }else{
  echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='admin_loggin.php'>Login</a></div>";
  }
    }else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>



</head>
<body>

<div class="jumbotron container">
  <h1 class="display-5">Admin Page!</h1>
  <hr class="my-4">
  <p class="lead">

      <div class="form">
  <h1>Log In</h1>
  <form action="" method="post" name="login">
  <input type="text" name="username" placeholder="Username" required />
  <input type="password" name="password" placeholder="Password" required />
  <input name="submit" type="submit" value="Login" />
  </form>
</div>
<?php 
} ?>
</div>






</body>
</html>