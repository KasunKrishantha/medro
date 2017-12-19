<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Expenses</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <h3>Expenses By Month</h3>

    <div class="col-md-4">
        <?= form_open('welcome/expenses', ['class'=>'form-horizontal']);?>
        <fieldset>
            <div class="text-success">
                <?php if($msg = $this->session->flashdata('msg')):?>
                    <?php echo $msg;?>
                <?php endif;?>
            </div>
            <hr>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="year">Year</label>
                <div class="col-lg-5">
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

                </div>
            </div>

            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Drug</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'drug', 'class'=>'form-control', 'id'=>'drug']);?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Quantity</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'quantity', 'class'=>'form-control', 'id'=>'quantity']);?>
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

    <?php

    ?>
    <div class="col-md-8">
        <table class="table table-bordered table-striped table-bordered">
            <thead>
                <th>Year</th>
                <th>Month</th>
                <th>Electricity Bill</th>
                <th>Water Bill</th>
                <th>Rental</th>
                <th>Other</th>
                <th>Total</th>
            </thead>
            <tbody>
            <?php if(count($expenses)):?>
            <?php foreach ($expenses as $e):?>
                <tr>
                    <td><?=$e->year?></td>
                    <td><?=$e->month?></td>
                    <td><?=$e->electricity?></td>
                    <td><?=$e->water?></td>
                    <td><?=$e->rental?></td>
                    <td><?=$e->other?></td>
                    <td><?=$e->total?></td>
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