<?php include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Make an Appointment</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">

    <h2>Available Time</h2>
    <hr>
    <div class="text-success">
        <?php if($msg = $this->session->flashdata('msg')):?>
            <?php echo $msg;?>
        <?php endif;?>
    </div>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Appointment Date</th>
            <th>Status</th>
            <th>Time</th>
            <th>Appointment #</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($schedule)):?>
            <?php foreach ($schedule as $s):?>
        <tr>
            <td><?= $s->date?></td>
            <td><?= $s->time?></td>
            <td class="success"><?= $s->status?></td>
            <td><?= $s->max_number?></td>
            <td><?php echo anchor('welcome/makeAppointment', 'Book Now', ['class' => 'btn btn-primary']); ?></td>
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