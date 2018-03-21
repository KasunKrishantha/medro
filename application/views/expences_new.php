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
			
					<h3 class="page-header"> Expences By Monthggg</h3>
												  	
				
				
			</div>
            <form name="postdata" action="<?php echo base_url('expences_controller/get_relevent_data')?>" method="post">
<table>
    <tr>
   
    <td width="80%">
    <select name="month">
  		<option value="January">January</option>
  		<option value="February">February</option>
  		<option value="March">March</option>
  		<option value="April">April</option>
        <option value="May">May</option>
  		<option value="June">June</option>
  		<option value="July">July</option>
  		<option value="Auguest">Auguest</option>
        <option value="September">September</option>
  		<option value="October">October</option>
  		<option value="November">November</option>
  		<option value="December">December</option>
        
	</select>
    </td>
    
    <td width="80%">
    
    
    <select name="year">
    	<option value=2015>2015</option>
        <option value=2016>2016</option>
        <option value=2017>2017</option>
    </select>
    
    </td>
   
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    <button name="submit" type="submit"  value="Get_Expences">Get Expences</button>
    </td>
    
    
    </tr>
  
    </table><br>
       </form>
    <table>
    <tr>
    
    <td width="50%">
    Electricity Bill: 
    </td>
    
    
    
    <td width="80%">
    <input type="text" name="electricity_bill" value="" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Water Bill:
    </td>
    <td width="80%">
    <input type="text" name="water_bill" value="" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Rental:
    </td>
    <td width="80%">
    <input type="text" name="rental" value="" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Other:
    </td>
    <td width="80%">
    <input type="text" name="other" value="" class="field left" readonly>
    </td>
    </tr>
    </table><br>
    <table>
    <tr>
    <td width="50%">
    Total:
    </td>
    <td width="80%">
    <input type="text" name="total" value=""class="field left" readonly >
    </td>
    </tr>
    </table>
    
    
</div>
</body>
</html>
