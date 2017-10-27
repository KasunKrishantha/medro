<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Appointments</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <h2>Appointments</h2>
    <hr>
    <form class="form-inline">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" placeholder="YYYY-MM-DD">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
    <hr>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Patient Name</th>
            <th>Telephone</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>


        <?php
        if(isset($patients)){
            foreach ($patients as $patient){
        ?>
             <tr>
                 <td><?= $patient->name;?></td>
                 <td><?= $patient->telno;?></td>
                 <td><?= $patient->email;?></td>
                 <td>
                     <?=anchor("welcome/postpone/{$patient->nic}", 'Postpone', ['class'=>'btn btn-sm btn-primary']);?>
                     <?=anchor("welcome/cancel/{$patient->nic}", 'Cancel', ['class'=>'btn btn-sm btn-danger']);?>
                 </td>
             </tr>
        <?php
            }

        }else{
        ?>
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>
        <?php
        }
        ?>



        </tbody>
    </table>
</div>
</body>
</html>