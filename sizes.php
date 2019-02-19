
<?php

include("auth.php");
require('db.php');
//count query for 10 inch
$query = "SELECT COUNT(item_price) as size  FROM order_detail where SUBSTRING(item_price, 4, 5)=10 ORDER BY id ASC";  
$result = mysqli_query($connect, $query); 
//count query for 14 inch 
$querys = "SELECT COUNT(item_price) as size  FROM order_detail where SUBSTRING(item_price, 4, 5)=14 ORDER BY id ASC"; 
$results = mysqli_query($connect, $querys);  
//count query for 18 inch
$queryss = "SELECT COUNT(item_price) as size  FROM order_detail where SUBSTRING(item_price, 4, 5)=18 ORDER BY id ASC";
$resultss = mysqli_query($connect, $queryss); 
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

   <div id="table">  
        <table class="table table-bordered">  
           <tr >  
                <th width="10%">10 Inch</th>   
                <th width="10%">14 Inch</th>   
                <th width="10%">18 Inch</th>     
           </tr>  
           <tr>  
                <td><?php $row = mysqli_fetch_assoc($result); echo $row["size"]; ?></td>  
                <td><?php $rows = mysqli_fetch_assoc($results); echo $rows["size"]; ?></td>  
                <td><?php $rowss = mysqli_fetch_assoc($resultss); echo $rowss["size"]; ?></td> 
           </tr>  
        </table>  
    </div>  
</div>


</body>
</html>
