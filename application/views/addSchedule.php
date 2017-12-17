<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Schedule</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <div class="col-md-6">
        <?= form_open('welcome/addSchedule', ['class'=>'form-horizontal']);?>
        <fieldset>
            <h2>Enter Operating Dates & Times</h2>
            <div class="text-success">
                <?php if($msg = $this->session->flashdata('msg')):?>
                    <?php echo $msg;?>
                <?php endif;?>
            </div>
            <hr>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Date</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'date', 'class'=>'form-control', 'id'=>'date']);?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Time</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'time', 'class'=>'form-control', 'id'=>'time']);?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-lg-2 control-label" for="status">Status</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'status', 'class'=>'form-control', 'id'=>'status']);?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-lg-2 control-label" for="number">Appointment limit</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'max_number', 'class'=>'form-control', 'id'=>'max_number']);?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <?=anchor('welcome', 'Cancel', ['class'=>'btn btn-default']);?>
                    <?=form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary'])?>
                </div>
            </div>
        </fieldset>
        <?= form_close();?>
    </div>

    <div class="col-md-6">
        <h2>Schedule</h2>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Appointment Limit</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($schedule)):?>
                <?php foreach ($schedule as $s):?>
                    <tr>
                        <td><?= $s->date?></td>
                        <td><?= $s->time?></td>
                        <td><?= $s->status?></td>
                        <td><?= $s->max_number?></td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No record found!</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</div>
</body>
</html>