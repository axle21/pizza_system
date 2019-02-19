<?php
session_start();  
 require('db.php');
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>    $_POST["hidden_price"] ,  
                     'item_quantity'          =>     $_POST["quantity"] ,
                     'item_toppings'         	  =>	 $_POST["toppings"] 
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="classic.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'             =>     $_GET["id"],  
                'item_name'           =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'       =>     $_POST["quantity"],
                'item_toppings'       =>	 $_POST["toppings"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="classic.php"</script>';  
                }  
           }  
      }  
 }  

 //save to database header for customer

 if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $full_name = $_POST['name'];
    $contact = $_POST['contact'];
    $complete_address = $_POST['address'];
 
    $sql = "INSERT INTO customer_info (email, full_name, contact, complete_address) VALUES ('$email', '$full_name', '$contact', '$complete_address')";
    

    if($connect->query($sql) === TRUE) {
      //get the last id
      $last_id = $connect->insert_id;
        if(!empty($_SESSION["shopping_cart"]))  
        {
      
          foreach($_SESSION["shopping_cart"] as $keys => $values) 
           {
            //save to database header for customer Order
              $connect->query("INSERT INTO order_detail (customer_info_id,item_name,item_price,quantity,toppings) VALUES ('$last_id','".$values['item_name']."','".$values['item_price']."','".$values['item_quantity']."','".implode(",", $values["item_toppings"])."')");
          }
        }
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
  //destroy session
  session_destroy();

  //send email to customer and admin
  $email_query = "SELECT id FROM customer_info where customer_info.id = $last_id   ";  
  $result = mysqli_query($connect, $email_query);
  $row = mysqli_fetch_assoc($result);  

  $to      = "$row , pizza@example.com";
  $subject = 'Pizza';
  $message = 'Your Order has been confirmed , please wait it on your doorstep';
  $headers = 'From: pizza@example.com' . "\r\n" .
      'Reply-To: pizza@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);

  header('Location: order_confirm.php');

}
 ?>  

<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

<div class="container" >
  <h1 class="display-4">Select Your Order Here</h1>
  <hr class="my-4">

  <div class="container" style="width:700px;">  
                <!-- Select All From Product -->
                <?php  
                $query = "SELECT * FROM tbl_product where tbl_product.type = 1 ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     	
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="classic.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                           <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                           <h4 class="text-info"><?php echo $row["name"]; ?></h4>    
                               <!-- Select All From Product_Price -->
                            <?php
                            echo '<select name="hidden_price" class="form-control" id="size"><option selected="true" disabled="disabled">Select Pizza size</option>';
							$sqli = "SELECT * FROM tbl_product_price where product_id ='".$row["id"]. "';";
							$results = mysqli_query($connect, $sqli);
							while ($rows = mysqli_fetch_array($results)) {
							echo '<option value="'.$rows["price"]. $rows["size"].'">'. $rows["size"].'" '.$rows["price"].'</option>';
							}
							echo '</select>';
              // $connect->close();
							?> 
							<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
							<input type="text" name="quantity" class="form-control" value="1" /> 
							<p>Add Toppings</p>
							<select name="toppings[]" data-style="btn-default" class="selectpicker form-control" multiple>
								<option disabled><b>Prices :</b> 10" 35, 14" 45, 18" 60</option>
						        <option>Cheese </option>
						        <option>Bacon</option>
						        <option>Ground Beef</option>
						        <option>Ham</option>
                    <option>Italian Sausage</option>
                    <option>Peperoni</option>
                    <option>Salami</option>
                    <option>Capers</option>
                    <option>Roasted Garlic</option> 
                    <option>Mushroom</option>
						    </select>
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?> 

  <div style="clear:both"></div>  
  <br />  
  <h3>Order Details</h3>  
      <div class="table-responsive">  
          <table class="table table-bordered">  
            <tr>  
                 <th width="20%">Item Name</th>
                 <th width="10%">Quantity</th>  
                 <th width="30%">Toppings</th> 
                 <th width="15%">Toppings Price</th> 

              
                 <th width="15%">Price</th>  
                 <th width="15%">Total</th>  
                 <th width="5%">Action</th>  
            </tr>  
                <?php   
                if(!empty($_SESSION["shopping_cart"]))  
                {  
                     $total = 0;  
                     foreach($_SESSION["shopping_cart"] as $keys => $values)  
                     {  
                ?>  
            <tr>    
                 <td><?php echo $values["item_name"]; ?></td> 
                 <td><?php echo $values["item_quantity"]; ?></td>  
                 <td><?php echo implode(",", $values["item_toppings"]); ?></td> 
                 <td>
                 <?php 
                 $topping_count = substr_count( implode(",", $values["item_toppings"]), ",") +1 ;
                 $size= substr($values["item_price"], 3, 4);
                 $sizes = 0;
                 if ($size == 10) {
                 	$sizes = 35;
                 } elseif($size==14){
                 	$sizes = 45;
                 }elseif($size==18 ){
                 	$sizes = 60;
                 }
                 echo $topping_count * $sizes;
                 ?>
                 </td>
                 <td>$ <?php echo substr($values["item_price"], 0, 3); ?></td>  
                 <td>$ <?php  
                 $count_toppings = number_format($values["item_quantity"] * substr($values["item_price"], 0, 3) , 2); 
                 echo $count_toppings + $topping_count * $sizes;
                 ?></td>  
                 <td><a href="classic.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
            </tr>  
                <?php  
                          $total = $total + ($values["item_quantity"] * substr($values["item_price"], 0, 3)) + $topping_count * $sizes ;  
                     }  
                ?>  
                <tr>    
                     <td colspan="5" align="right">Total</td>  
                     <td align="right">$ <?php echo number_format( $total , 2); ?></td>  
                     <td></td>  
                </tr>  
                <?php  
                }  
                ?>  
          </table>  

      </div>  
      <butto style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Check Out</button>
  </div>  
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Customer Detail</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" name="email" required>
      </div>
    
     <div class="form-group">
        <label for="exampleFormControlInput1">Fullname</label>
        <input type="text" class="form-control" name="name" required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Contact Number</label>
        <input type="number" class="form-control" name="contact" required>
      </div>


      <div class="form-group">
        <label for="exampleFormControlTextarea1">Complete Address</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Proceed To Order</button>


    </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>