 <?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      require('db.php');
      $query = "SELECT * FROM order_detail WHERE customer_info_id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
             <tr>  
                 <th width="20%">Item Name</th>
                 <th width="10%">Quantity</th>  
                 <th width="30%">Toppings</th>  
            </tr> ';  

      foreach($result as $keys => $values)  
                     {   
           $output .= '  
              <tr>    
                 <td>'. $values["item_name"].'</td> 
                 <td>'. $values["quantity"].'</td> 
                 <td>'.$values["toppings"].'</td> 
              </tr>
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>