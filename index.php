
<html>
    <head>
        <script src="headers/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="headers/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="headers/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="headers/validate.js" type="text/javascript"></script>
        <link href="headers/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="headers/dist/sweetalert.min.js" type="text/javascript"></script>
        <link href="headers/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="spinner" class="col-xs-10 text-center spinner" style ="display:none; position:fixed; padding-top: 250px; ">
            <i class="fa fa-spinner fa-spin fa-3x"></i> <div class="font">Loading...</div> 
        </div>
        <div id="result" class="container">
            <h1 class="col-xs-offset-3">Email Validation Script</h1>
            <form method="post" action="validate.php" >
                <div class="col-xs-10">
                    <label for="input_email">Inputs</label>
                    <textarea  rows="6" class="form-control" id="input_email" name="input_email" placeholder="Enter email address one at a line"></textarea>
                </div>
                <div class="col-xs-10">
                    <label for="validated">Validated</label>
                    <textarea rows="6" class="form-control" id="validated" name="validated"></textarea>
                </div>
                <div class="col-xs-10">
                    <label for="failed">Failed</label>
                    <textarea  rows="6" class="form-control" id="failed" name="failed"></textarea>
                </div>
            </form>
            <div class="col-xs-offset-4 col-xs-6" style="padding-top: 10px">
                <button id="submit_email" class="btn btn-success">Validate</button>
            </div>

        </div>
    </body>
</html>
