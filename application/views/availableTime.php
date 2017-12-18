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
            <th>Time</th>
            <th>Status</th>
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

            <?php if ($s->status == "Full"): ?>
                <td class="danger"><?= $s->status?></td>
            <?php else: ?>
                <td class="success"><?= $s->status?></td>
            <?php endif; ?>

            <?php if ($s->next_number == -1): ?>
                <td>-</td>
            <?php else: ?>
                <td><?= $s->next_number?></td>
            <?php endif; ?>

            <?php if ($s->next_number != -1): ?>
                <td><?php echo anchor("welcome/makeAppointment/{$s->id}", 'Book Now', ['class' => 'btn btn-primary']); ?></td>
            <?php endif; ?>

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