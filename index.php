


<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>


	<style type="text/css">
		#container {
		    display: flex;
		    flex-direction: row;     
		    justify-content: center; 
		    align-items: center;     
		    
		}
		img{
			height: 400px;
			width: 400px;
			padding-left: : 50px;
			padding-right: 50px;
		}
	</style>

</head>
<body>

<div class="jumbotron" >
  <h1 class="display-4">Select Your Order Here</h1>
  <hr class="my-4">
	<div id="container" align="center"><!-- flex container -->

    <div class="box" id="classic">
    	<a href="classic.php"><img src="./asset/classic.png">
        <h3>Classic Pizza</h3></a>
    </div>

    <div class="box" id="specialty"><!-- flex item -->
    	<a href="specialty.php"><img src="./asset/specialty.png">
        <h3>Specialty Pizza</h3></a>
    </div>

</div>
</div>






</body>
</html>