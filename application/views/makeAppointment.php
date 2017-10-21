<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Make an Appointment</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h2>Channel Details</h2>
    <hr>
<!--    <div class="form-group">-->
<!--        <label class="control-label" for="disabledInput">Disabled input</label>-->
<!--        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">-->
<!--    </div>-->
    <div class="col-md-6">
        <div class=" form-group">
            <label class="control-label" for="date">Date</label>
            <input type="text" class="form-control" id="date">
        </div>
        <div class=" form-group">
            <label class="control-label" for="time">Time</label>
            <input type="text" class="form-control" id="time">
        </div>
        <div class=" form-group">
            <label class="control-label" for="number">Appointment #</label>
            <input type="text" class="form-control" id="number">
        </div>
    </div>

    <div class="clearfix"></div>

    <h2>Patient Details</h2>
    <hr>
    <div class="col-md-9">
        <form class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name*</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nic" class="col-lg-2 control-label">National ID No*</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nic">
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-lg-2 control-label">Area</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="area">
                    </div>
                </div>
                <div class="form-group">
                    <label for="telno" class="col-lg-2 control-label">Telephone*</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="telno">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nationalty</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="local" value="local" checked="">
                                Local
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="foreign" value="foreign">
                                Foreign
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> I accept the terms and conditions
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</div>
</body>
</html>