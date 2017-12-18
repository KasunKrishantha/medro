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

    <div class="col-md-6">
        <?= form_open("welcome/postponeAppointment/{$data['appointment']->id}", ['class'=>'form-horizontal']);?>

        <fieldset>

            <div class="text-success">
                <?php if($msg = $this->session->flashdata('msg')):?>
                    <?php echo $msg;?>
                <?php endif;?>
            </div>
            <h3>Channel Details</h3>
            <hr>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Date</label>
                <div class="col-lg-8">
                    <?=form_input(['name'=>'date', 'class'=>'form-control', 'id'=>'date', 'value'=>set_value('date', $data['appointment']->date)]);?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="time">Time</label>
                <div class="col-lg-8">
                    <?=form_input(['name'=>'time', 'class'=>'form-control', 'id'=>'time', 'value'=>set_value('time', $data['appointment']->time)])?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="number">Appointment #</label>
                <div class="col-lg-8">
                    <?=form_input(['name'=>'number', 'class'=>'form-control', 'id'=>'number', 'value'=>set_value('number', $data['appointment']->number)])?>
                </div>
            </div>
<!--            <hr>-->
            <h3>Patient Details</h3>
            <hr>

            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name*</label>
                <div class="col-md-8">
                    <?=form_input(['name'=>'name', 'class'=>'form-control', 'id'=>'name' ,'disabled'=>"", 'value'=>set_value('name', $data['patient']->name)])?>
                </div>
                <div class="col-md-8">
                    <?=form_error('name', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="nic" class="col-lg-2 control-label">National ID No*</label>
                <div class="col-md-8">
                    <?=form_input(['name'=>'nic', 'class'=>'form-control', 'id'=>'nic', 'disabled'=>"",'value'=>set_value('nic', $data['patient']->nic)])?>
                </div>
                <div class="col-md-8">
                    <?=form_error('nic', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="area" class="col-lg-2 control-label">Area</label>
                <div class="col-md-8">
                    <?=form_input(['name'=>'area', 'class'=>'form-control', 'id'=>'area', 'disabled'=>"", 'value'=>set_value('area', $data['patient']->area)])?>
                </div>
            </div>
            <div class="form-group">
                <label for="telno" class="col-lg-2 control-label">Telephone*</label>
                <div class="col-md-8">
                    <?=form_input(['name'=>'telno', 'class'=>'form-control', 'id'=>'telno', 'disabled'=>"", 'value'=>set_value('telno', $data['patient']->telno)])?>
                </div>
                <div class="col-md-8">
                    <?=form_error('telno', '<div class="text-danger">', '</div>');?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-md-8">
                    <?=form_input(['name'=>'email', 'class'=>'form-control', 'id'=>'email', 'disabled'=>"", 'value'=>set_value('email', $data['patient']->email)])?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <?=anchor('welcome/manageAppointments', 'Cancel', ['class'=>'btn btn-default']);?>
                    <?=form_submit(['name'=>'submit', 'type'=>'hidden', 'value'=>'Submit', 'class'=>'btn btn-primary'])?>
                </div>
            </div>
        </fieldset>
        <?= form_close();?>
    </div>

    <div class="col-md-6">
<!--        <h2 class="pull-right">Postpone Appointment</h2>-->
        <br><br><br>
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
            <?php if(count($data['schedule'])):?>
                <?php foreach ($data['schedule'] as $s):?>
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

                            <td><?php echo anchor("welcome/postponeAppointment/{$data['appointment']->id}/{$s->id}", 'Select', ['class' => 'btn btn-primary']); ?></td>
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

</div>
</body>
</html>