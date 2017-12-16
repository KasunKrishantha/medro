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
    <h2>All Patients</h2>
    <hr>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Name</th>
            <th>NIC</th>
            <th>Area</th>
            <th>Telephone</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($patients)):?>
            <?php foreach ($patients as $p):?>
                <tr>
                    <td><?= $p->name?></td>
                    <td><?= $p->nic?></td>
                    <td><?= $p->area?></td>
                    <td><?= $p->telno?></td>
                    <td><?= $p->email?></td>
                    <td><a class="btn btn-primary btn-xs" href="#">View</a></td>
                    <td><a class="btn btn-info btn-xs" href="#">Edit</a></td>
                </tr>
            <?php endforeach; ?>
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
