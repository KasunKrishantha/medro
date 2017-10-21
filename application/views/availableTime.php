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
        <tr>
            <td>2017-10-22</td>
            <td class="success">Available</td>
            <td>15:00</td>
            <td>5</td>
            <td><a href="makeAppointment.php" class="btn btn-primary">Book Now</a></td>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>