
<?php

include("auth.php");
require('db.php');
 $query = "SELECT * FROM customer_info ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  

?>


<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

</head>
<body>

<?php include("navbar.php"); ?>

<div class="jumbotron" >
  <h1 class="display-4"><p>Welcome <?php echo $_SESSION['username']; ?>!</p></h1>
  <a href="logout.php">Logout</a>
  <hr class="my-4">

</div>



</body>
</html>

