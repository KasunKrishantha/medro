<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Patient Profile</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <h2>My Profile</h2>
    <hr>
    
    <div class="column middel_left">
    
    <table>
    <tr>
    
    <td width="15%">
    <strong>Name :</strong> 
    </td>
    
     <td width="80%">
    <?php  //print_r( $user_details);?>
      <?php  echo $user_details['first_name'] ." ".$user_details['last_name']; ?> 
    </td>
    </tr>
    </table><br>
    
    <table>
    
     <tr>
    
    <td width="15%">
    <strong>Address :</strong>
    </td>
   
     <td width="80%">
      <?php  echo $user_details['address'] ; ?>
    </td>
    </tr>
    </table><br>
    
    <table>
     <tr>
    
    <td width="15%">
    <strong>Contact Number :</strong>
    </td>
    
     <td width="80%">
     <?php  echo $user_details['contact_no'] ; ?>
    </td>
    </tr>
    
    
    </table>
    
       
  </div>
  <br>
  <br>
  
  <div>
  
  <h4>
   <strong>
   Appoinments
   </strong>
   
   </h4>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>No</th>
            <th>Appoinment Date</th>
            <th>Appoinment Time</th>
            <th>Number</th>
            
        </tr>
        </thead>
        <tbody>
        <?php if(count($user_appoinments)):?>
            <?php $count=0;
   foreach ( $user_appoinments as $row)
   {
	   $count++;?>
       <tr>
   	<td>
  	<?php echo $count;  ?>
   	</td>
   	<td>
   	<?php echo $row['date'];  ?>
   	</td>
   	<td>
   	<?php echo $row['time'];  ?>
  	</td>
   	<td>
   	<?php echo $row['number'];  ?>
   	</td>
  	
   	</tr>
   <?php   
	  
   }
   
   ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
    <br>
    <br>
    
    <div class="column middel_left">
   
   <h4>
   <strong>
   Treatements
   </strong>
   
   </h4>
   
   <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Treatement Name</th>
            <th>Result</th>
            <th>Dentist Name</th>
            
        </tr>
        </thead>
        <tbody>
        <?php if(count($user_treatements)):?>
            <?php $count=0;
   foreach ( $user_treatements as $row)
   {
	   $count++;?>
       <tr>
   	<td>
  	<?php echo $count;  ?>
   	</td>
   	<td>
   	<?php echo $row['date'];  ?>
   	</td>
   	<td>
   	<?php echo $row['treatment_name'];  ?>
  	</td>
   	<td>
   	<?php echo $row['result'];  ?>
   	</td>
   	<td>
   	<?php echo $row['first_name'];  ?>
  	</td>
  	
   	</tr>
   <?php   
	  
   }
   
   ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    
    </div>
    <br>
    <br>
    
    <div class="column middel_left">
   
   <h4>
   <strong>
   Payments
   </strong>
   
   </h4>
   
   <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Payment Name</th>
            <th>Fee</th>
            
        </tr>
        </thead>
        <tbody>
        <?php if(count($user_payments)):?>
            <?php $count=0;
   foreach ( $user_payments as $row)
   {
	   $count++;?>
       <tr>
   	<td>
  	<?php echo $count;  ?>
   	</td>
   	<td>
   	<?php echo $row['date'];  ?>
   	</td>
   	<td>
   	<?php echo $row['payment_name'];  ?>
  	</td>
   	<td>
   	<?php echo $row['fee'];  ?>
   	</td>
   	
  	
   	</tr>
   <?php   
	  
   }
   
   ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
   </table>
   </div>
</div>
</body>
</html>
