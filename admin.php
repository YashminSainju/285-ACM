<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 10:43 AM
 */
include('inc/database.php');
$query1 = $db->query("SELECT id,title,description,contact FROM jobs");
$userquery= $db->query("SELECT ID,FirstName,LastName,Email, Payment, class FROM users");
?>
<?php
//include "inc/functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACM Admin Page2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- custom CSS -->
    <style>
        .modal {
        }
        .vertical-alignment-helper {
            display:table;
            height: 100%;
            width: 100%;
            pointer-events:none;
        }
        .vertical-align-center {
            /* To center vertically */
            display: table-cell;
            vertical-align: middle;
            pointer-events:none;
            left:auto;
        }
        .modal-content {
            /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
            width:inherit;
            height:inherit;
            /* To center horizontally */
            margin: 0 auto;
            pointer-events:all;
        }
        body {
            overflow-y:scroll;
        }
        .modal-open .modal {
            overflow-y:scroll; /* Force a navbar on .modal */
        }

        .modal-open .topnavbar-wrapper {
            padding-right:17px; /* Noticed that right aligned navbar content got overlapped by the .modal scrollbar */
        }
        .modal-open[style] {
            padding-right: 0px !important;
        }
    </style>
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
<div class="features-boxed"></div>
<div></div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Members</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#add_new_record_modal">Create New</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <?php
                        while($userquery2 = $userquery->fetch(PDO::FETCH_ASSOC)){
                            echo "
                                        <tbody>
                                        <tr>
                                            <td align=\"center\">
                                                <a href = 'inc/members/useredit.php?id=".$userquery2['ID']."' class=\"btn btn-default\"><em class=\"fa fa-pencil\"></em></a>
                                                <a href = 'inc/members/userdelete.php?id=".$userquery2['ID']."' class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></a>
                                            </td>
                                            <td>".$userquery2['FirstName']."</td>
                                            <td>".$userquery2['LastName']."</td>
                                            <td>".$userquery2['Email']."</td>
                                            <td>".$userquery2['Payment']."</td>
                                            <td>".$userquery2['class']."</td>
                                        </tr>
                                        </tbody>
                                    ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Jobs Offers</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#add_new_job_modal">Create New</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="job_table">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Contact Info</th>
                        </tr>
                        </thead>
                        <?php
                        while($query2 = $query1->fetch(PDO::FETCH_ASSOC)){
                            echo "
                                        <tbody>
                                        <tr>
                                            <td align=\"center\">
                                                <a href = 'inc/jobs/edit.php?id=".$query2['id']."'class=\"btn btn-default\"><em class=\"fa fa-pencil\"></em></a>
                                                <a href = 'inc/jobs/delete.php?id=".$query2['id']."'class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></a>
                                            </td>
                                            <td>".$query2['title']."</td>
                                            <td>".$query2['description']."</td>
                                            <td>".$query2['contact']."</td>
                                        </tr>
                                        </tbody>
                                    ";
                        }
                        ?>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Page 1 of 5
                        </div>
                        <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div></div></div>

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Member</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" placeholder="First Name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" placeholder="Last Name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" placeholder="Email Address" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addRecord()">Add Member</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- // Modal -->
<!-- Modal - Add New Jobs -->
<div class="modal fade" id="add_new_job_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Job Posting</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="addjob">

                    <div class="form-group">
                        <label for="Jobtitle">Job Title</label>
                        <input type="text" id="title" placeholder="Job Title" class="form-control" maxlength="255" required/>
                    </div>

                    <div class="form-group">
                        <label for="Jobdescription">Description</label>
                        <textarea type="text" id="description" placeholder="Description" class="form-control" maxlength="255" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Jobcontact">Contact Info</label>
                        <input type="text" id="contact" placeholder="Contact Info" class="form-control" maxlength="100"required/>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert")">List Job</button>
                </div>
                <script>
                    $(document).ready(function(){
                        $('#addjob').on("submit", function(event){
                            event.preventDefault();
                            if($('#title').val() == "")
                            {
                                alert("Name of Job is required");
                            }
                            else if($('#description').val() == '')
                            {
                                alert("Description of Job is required");
                            }
                            else if($('#contact').val() == '')
                            {
                                alert("Contact Information is required");
                            }
                            else
                            {
                                $.ajax({
                                    url:"inc/jobs/add.php",
                                    method:"POST",
                                    data:$('#addjob').serialize(),
                                    beforeSend:function(){
                                        $('#insert').val("Inserting");
                                    },
                                    success:function(data){
                                        $('#addjob')[0].reset();
                                        $('#add_new_job_modal').modal('hide');
                                        $('#job_table').html(data);
                                    }
                                });
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>

<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_first_name">First Name</label>
                    <input type="text" id="update_first_name" placeholder="First Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_last_name">Last Name</label>
                    <input type="text" id="update_last_name" placeholder="Last Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_email">Email Address</label>
                    <input type="text" id="update_email" placeholder="Email Address" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<script src="inc/js/jquery-3.1.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Sidebar-Menu.js"></script>
<script src="resources/js/angular.min.js"></script>
<script type="text/javascript" src="inc/js/modals.js"></script>

</body>

</html>
