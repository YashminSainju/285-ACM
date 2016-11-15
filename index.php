<?php
include "../inc/database.php";



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACM Admin Page2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-default navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Admin Portal</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Hi, Dr. Pao<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a>Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Dashboard </h2>
                <p class="text-center">Control Panel</p>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-user icon"></i>
                        <h3 class="name">Members </h3>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <!--<li role="presentation"><a href="#">Member 1</a></li>
                                <li role="presentation"><a href="#">Member 2</a></li>
                                <li role="presentation"><a href="#">Member 3</a></li>-->
                                <?php
                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-list-alt icon"></i>
                        <h3 class="name">Job Postings</h3>
                        <form method="post">
                            <div class="form-group has-success">
                                <input class="form-control" type="text" name="Job Title" placeholder="Job Title">
                            </div>
                            <div class="form-group has-error"></div>
                            <div class="form-group">
                                <textarea class="form-control input-lg" rows="14" name="Job Description" placeholder="Job Description"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Add </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 item">
                    <div class="box"><i class="glyphicon glyphicon-flag icon"></i>
                        <h3 class="name">Report Issues</h3>
                        <form method="post">
                            <div class="form-group has-success"></div>
                            <div class="form-group has-error"></div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                        </form>
                        <form method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="14" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Send </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>