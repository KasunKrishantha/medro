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
    <div class="col-md-10">
        <h2>Stock Available</h2>
    </div>
    <div class="col-md-2">
        <br>
        <a class="btn btn-primary" href="#">Add New Medication</a>
    </div>
    <div class="clearfix"></div>
    <hr>

    <div class="col-md-6">

    <h3 class="text-info">Analgesics</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Date Added</th>
            <th>Drug</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($analgesics)):?>
            <?php foreach ($analgesics as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>

    <h3 class="text-info">Anesthetics</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Date Added</th>
            <th>Drug</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($anesthetic)):?>
            <?php foreach ($anesthetic as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>

    <h3 class="text-info">Pain Killers</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Last Updated</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($pain)):?>
            <?php foreach ($pain as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>
    </div>

    <div class="col-md-6">
    <h3 class="text-info">Antifungals</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Date Added</th>
            <th>Drug</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($antifungals)):?>
            <?php foreach ($antifungals as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>

    <h3 class="text-info">Antibiotics</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Date Added</th>
            <th>Drug</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($antibiotics)):?>
            <?php foreach ($antibiotics as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>

    <h3 class="text-info">Other</h3>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Date Added</th>
            <th>Drug</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($other)):?>
            <?php foreach ($other as $s):?>
                <tr>
                    <td><?= $s->date?></td>
                    <td><?= $s->drug?></td>
                    <td><?= $s->quantity?></td>
                    <td><a class="btn btn-info btn-xs" href="">Update Quantity</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>No record found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <br>
    </div>
</div>
</body>
</html>
