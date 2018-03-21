<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Stock</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <h2>Stock</h2>
    <hr>
    <div>
			
					<h3 class="page-header"> View Stock Data</h3>
												  	
				
				
			</div>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>No</th>
            <th>Drug Code</th>
            <th>Drug Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($stock_details)):?>
            <?php $count=0;
   foreach ( $stock_details as $row)
   {
	   $count++;?>
       <tr>
   	<td>
  	<?php echo $count;  ?>
   	</td>
   	<td>
   	<?php echo $row['drug_code'];  ?>
   	</td>
   	<td>
   	<?php echo $row['drug_name'];  ?>
  	</td>
   	<td>
   	<?php echo $row['brand'];  ?>
   	</td>
   	<td>
   	<?php echo $row['category'];  ?>
  	</td>
  	<td>
   	<?php echo $row['quantity'];  ?>
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
</body>
</html>
