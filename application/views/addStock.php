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

    <div class="col-md-9">
        <?= form_open('welcome/addStock', ['class'=>'form-horizontal']);?>
        <fieldset>
            <h2>Add Stock</h2>
            <div class="text-success">
                <?php if($msg = $this->session->flashdata('msg')):?>
                    <?php echo $msg;?>
                <?php endif;?>
            </div>
            <hr>
            <div class=" form-group">
                <label class="col-lg-2 control-label" for="date">Date Added</label>
                <div class="col-lg-5">
                    <?=form_input(['name'=>'date', 'class'=>'form-control', 'id'=>'date']);?>
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

</div>
</body>
</html>
