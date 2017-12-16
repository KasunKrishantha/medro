<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Medro Dental Surgery</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><?= anchor('welcome', 'Make an Appointment')?></li>
                <li><?= anchor('welcome/manageAppointments', 'Manage Appointments')?></li>
                <li><?= anchor('welcome/manageStock', 'Add Stock')?></li>
                <li><?= anchor('welcome/viewStock', 'View Stock')?></li>
                <li><?= anchor('welcome/loadAddSchedule', 'Add Schedule')?></li>
                <li><?= anchor('welcome/viewPatients', 'View Patients')?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>