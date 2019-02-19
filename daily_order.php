
<?php

include("auth.php");
require('db.php');
$query = "SELECT * FROM customer_info where queue=1 ORDER BY id ASC";  
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

   <div id="employee_table">  
        <table class="table table-bordered">  
           <tr >  
                <th width="15%">Customer Name</th>   
                <th width="10%">Email</th>    
                <th width="5%">Contact</th>     
                <th width="25%">Address</th>
                <th width="15%">Order Details</th> 
           </tr>  
           <?php  
           while($row = mysqli_fetch_array($result))  
           {  
           ?>  
           <tr>  
                <td><?php echo $row["full_name"]; ?></td>  
                <td><?php echo $row["email"]; ?></td>  
                <td><?php echo $row["contact"]; ?></td>  
                <td><?php echo $row["complete_address"]; ?></td>  
                <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
           </tr>  
           <?php  
           }  
           ?>  
        </table>  
    </div>  



</div>


 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
			        <h2 class="modal-title" id="exampleModalLabel">Order Detail</h2>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			     </div>  
                <div class="modal-body" id="customer_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  


</body>
</html>


<script type="text/javascript">

	      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"order_detail.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#customer_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      }); 

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>