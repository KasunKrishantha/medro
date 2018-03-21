<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
    background-color: #f1f1f1;
    padding: 20px;
    text-align: center;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
	text-align: right;

}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
}

table {
	
    border-collapse: collapse;
    width:auto;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}


/* Left and right column */
.column.side {
    width: 10%;
}

.column.middel_left {
    width: 80%;
}
.column.middel_right {
    width: 75%;
}

/* Middle column */
.column.middle {
    width: 80%;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .column.side, .column.middle {
        width: 100%;
    }
}

/* Style the footer */
.footer {
    background-color: #f1f1f1;
    padding: 10px;
    text-align: center;
}


#tretments {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 95%;
}

#tretments td, #tretments th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tretments tr:nth-child(even){background-color: #f2f2f2;}

#tretments tr:hover {background-color: #ddd;}

#tretments th {
    padding-top: 8px;
    padding-bottom: 8px;
    text-align: left;
    background-color: #036;
    color: white;
}


</style>
</head>
<body>

<section id="container" class="">
     
      
    <section id="container" class="">
    <?php $this->load->view('header'); ?>
        
    <!--header end-->

      <!--sidebar start-->
      <?php $this->load->view('navigation'); ?>
      
      
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-home"></i> View Patient Details</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-table"></i>Patient Profile</li>
                        <li><i class="fa fa-th-list"></i>View Patient Profile</li>
												  	
					</ol>
				</div>
			</div>
            
            <div class="column middel_left">
            <section class="panel">
    
    <table>
    <tr>
    
    <td width="15%">
    Name 
    </td>
    
     <td width="80%">
    <?php  //print_r( $user_details);?>
      <?php  echo $user_details['first_name'] ." ".$user_details['last_name']; ?> 
    </td>
    </tr>
    
    <!-- <tr>
    
    <td width="15%">
    Age
    </td>
   
     <td width="80%">
      <?php  //echo $user_details['contact_no'] ; ?> 
    </td>
    </tr>-->
    
     <tr>
    
    <td width="15%">
    Address
    </td>
   
     <td width="80%">
      <?php  echo $user_details['address'] ; ?>
    </td>
    </tr>
    
     <tr>
    
    <td width="15%">
    Contact Number
    </td>
    
     <td width="80%">
     <?php  echo $user_details['contact_no'] ; ?>
    </td>
    </tr>
    
    
    </table>
    
       
  </div>
  
  <div class="column middel_left">
   
   <h3>
   <strong>
   Appoinments
   </strong>
   
   </h3>
   <table id ="tretments"> 
   
   <tr>
   <th>
   No
   </th>
   
   <th>
   Appoinment Date
   </th>
   <th>
    Appoinment Time
   </th>
    <th>
    Dentist Name
   </th>
   </tr>
   
   
   
   
   </table>
   </div>
  
   <div class="column middel_left">
   
   <h3>
   <strong>
   Treatements
   </strong>
   
   </h3>
   <table id ="tretments"> 
   
   <tr>
   <th>
   No
   </th>
   <th>
   Date
   </th>
   <th>
   Treatment Name
   </th>
   <th>
   Result
   </th>
   <th>
   Dentist Name
   </th>
   </tr>
   
   <?php
   $count=0;
   foreach ( $user_treatements as $row)
   {
	   $count++;
	  ?>
      
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
   
   
   </table>
   </div>
   
   <div class="column middel_left">
   
   <h3>
   <strong>
   Payments
   </strong>
   
   </h3>
   <table id ="tretments"> 
   
   <tr>
   <th>
   No
   </th>
   <th>
   Date
   </th>
   <th>
   Payment Name
   </th>
   <th>
   Fee
   </th>
  
   </tr>
   
   <?php
   $count=0;
   foreach ( $user_payments as $row)
   {
	   $count++;
	  ?>
      
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
   
   
   
   
   </table>
   </div>
  
    
    
  </div>
  <div class="column side">
    
  </div>
  </section>
</div>
    </section>
</section>



