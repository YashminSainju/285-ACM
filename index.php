<?php
    include_once 'inc/database.php';
    include_once 'inc/functions.php';

    sec_session_start();

    if (login_check($db) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
?>

<!DOCTYPE html>
<html lang="en"  ng-app="routerApp">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACM</title>
	 <!-- Bootstrap core CSS 
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
     
	
	 <!-- JS (load angular, ui-router, and our custom js file) -->
    <script src="http://code.angularjs.org/1.2.13/angular.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
    <script src="script.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="resources/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="resources/css/Social-Icons.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/Team-Clean.css">
    <link rel="stylesheet" href="resources/css/Team-Grid.css">
    <script type="text/JavaScript" src="inc/js/sha512.js"></script>
    <script type="text/JavaScript" src="inc/js/forms.js"></script>
	
</head>

<body>
<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
?>
    <div>
        <nav class="navbar navbar-inverse navigation-clean-button">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" ui-sref="#">ACM </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li ><a ui-sref="home">Home </a></li>
                        <li ><a href="https://www.acm.org">About </a></li>
						<li ><a ui-sref="calendar">Calendar </a></li>
                        <li ><a ui-sref="slugo">SLUGO </a></li>
						<li ><a ui-sref="jobs">Job Offers </a></li>
						<li ><a ui-sref="admin">Administrators </a></li>
						<li> <?php
                            if (login_check($db) == true) {
                                echo '<p> logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>
                                <p>Log out <a href="inc/logout.php">Log out</a>.</p>';
                            }else{
                                echo "
                                <form action='inc/process_login.php' method='post' name='login_form'>
                                Email: <input type='text' name='email' style='color: #000; font-size: 15px;' />
                                Password: <input type='password' name='password' id='password' style='color: #000; font-size: 15px;/>
                                <p class='navbar-text navbar-right actions'><input type='button' class='glyphicon glyphicon-log-in btn btn-success' value='Login' onclick='formhash(this.form, this.form.password);' /></p>
                                <p> <a href='register.php'>register</a></p>
                            </form>";
                            }
                            ?></li>
                    </ul>
                    <!--<p class="navbar-text navbar-right actions"><a class="navbar-link login" ui-sref="#"><span class="glyphicon glyphicon-log-in"></span> Log In</a>-->

                    </p>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="container"> <!-- angular insertion -->
		
		<!-- THIS IS WHERE WE WILL INJECT OUR CONTENT ============================== -->
			<div ui-view></div>
		
	</div>
	
    <footer>
        <p class="text-center" class="text-muted">ACM · Southeastern Louisiana University</p>
    </footer>
    <div class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Title</h4></div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script src="resources/js/jquery.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
</body>

</html>
