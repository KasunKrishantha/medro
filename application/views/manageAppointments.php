<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Manage Appointments</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h2>Appointments</h2>
    <hr>
    <form class="form-inline">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" placeholder="YYYY-MM-DD">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
    <hr>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Patient Name</th>
            <th>Telephone</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Manasha Wijesurendra</td>
            <td>0771234567</td>
            <td>mana@gmail.com</td>
            <td>
                <a href="manageAppointments.php" class="btn btn-sm btn-primary">Postpone</a>
                <a href="manageAppointments.php" class="btn btn-sm btn-danger">Cancel</a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>