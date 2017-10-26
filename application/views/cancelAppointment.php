<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Postpone Appointment</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">

    <div class="col-md-12">
        <?= form_open('welcome/cancel', ['class'=>'form-horizontal']);?>
        <fieldset>
            <h2 class="pull-right">Cancel Appointment</h2>
            <h3>Channel Details</h3>
            <hr>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Date</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'date', 'class'=>'form-control', 'id'=>'date'])?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="time">Time</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'time', 'class'=>'form-control', 'id'=>'time'])?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="number">Appointment #</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'number', 'class'=>'form-control', 'id'=>'number'])?>
                </div>
            </div>
            <!--            <hr>-->
            <h3>Patient Details</h3>
            <hr>

            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name*</label>
                <div class="col-md-5">
                    <?=form_input(['name'=>'name', 'class'=>'form-control', 'id'=>'name'])?>
                </div>
                <div class="col-md-5">
                    <?=form_error('name', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="nic" class="col-lg-2 control-label">National ID No*</label>
                <div class="col-md-5">
                    <?=form_input(['name'=>'nic', 'class'=>'form-control', 'id'=>'nic'])?>
                </div>
                <div class="col-md-5">
                    <?=form_error('nic', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-lg-2 control-label">Area</label>
                <div class="col-md-5">
                    <?=form_input(['name'=>'area', 'class'=>'form-control', 'id'=>'area'])?>
                </div>
            </div>
            <div class="form-group">
                <label for="telno" class="col-lg-2 control-label">Telephone*</label>
                <div class="col-md-5">
                    <?=form_input(['name'=>'telno', 'class'=>'form-control', 'id'=>'telno'])?>
                </div>
                <div class="col-md-5">
                    <?=form_error('telno', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-md-5">
                    <?=form_input(['name'=>'email', 'class'=>'form-control', 'id'=>'email'])?>
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

</div>
</body>
</html>