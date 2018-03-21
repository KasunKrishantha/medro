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
    <h2></h2>
    <hr>
    <div>
			
					<h3 class="page-header"> Expences By Month</h3>
												  		
				
			</div>
<table>
    <tr>
    <td width="50%">
    <!--<select name="month">
  		<option value=1>January</option>
  		<option value=2>February</option>
  		<option value=3>March</option>
  		<option value=4>April</option>
        <option value=5>May</option>
  		<option value=6>June</option>
  		<option value=7>July</option>
  		<option value=8>Auguest</option>
        <option value=9>September</option>
  		<option value=10>October</option>
  		<option value=11>November</option>
  		<option value=12>December</option>
        
	</select>-->
    <strong>Year:</strong>
    </td>
    
    <td width="80%">
    
    
    <!--<select name="year">
    	<option value=2015>2015</option>
        <option value=2016>2016</option>
        <option value=2017>2017</option>
    </select>-->
    
    <?php echo $expences_year; ?>
    
    </td>
    
    
    </tr>
    
    </table><br>
    <table>
    <tr>
    <td width="50%">
    <!--<button type="submit" form="" value="Get_Expences">Get Expences</button>-->
    <strong>Month:</strong>
    </td>
    <td width="80%">
    <?php echo $expences_month; ?>
    </td>
    </tr>
    </table><br>
    
    <table>
    <tr>
    
    <td width="50%">
    Electricity Bill: 
    </td>
    
    
    
    <td width="80%">
    <input type="text" name="electricity_bill" value="<?php echo $expences_details['electricity_bill'];?>" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Water Bill:
    </td>
    <td width="80%">
    <input type="text" name="water_bill" value="<?php echo $expences_details['water_bill'];?>" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Rental:
    </td>
    <td width="80%">
    <input type="text" name="rental" value="<?php  echo $expences_details['rental'];?>" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Other:
    </td>
    <td width="80%">
    <input type="text" name="other" value="<?php  echo $expences_details['other'];?>" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Total:
    </td>
    <td width="80%">
    <?php $total=$expences_details['other']+$expences_details['rental']+$expences_details['water_bill']+$expences_details['electricity_bill'] ?>
    <input type="text" name="total" value="<?php echo $total?>"class="field left" readonly >
    </td>
    </tr>
    </table>
    
    
</div>
</body>
</html>
