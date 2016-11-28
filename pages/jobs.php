<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 10:43 AM
 */
include('../inc/database.php');
include('../inc/functions.php');
sec_session_start();
if(login_check($db) == true) {
?>

	
	<h1><span class="text-muted">Job Offers: Get Connected!</span></h1>
	
	<table width="100%" class="table table-striped">
	
	<tr>
	<th>Job Description</th>
	<th>Client</th>
	<th>Contact Information</th>
	
	</tr>
	<tr>
	
	
	<td> Wanted: PHP Programmer with experience in databases.</td>
	<td> Eric Wimbledon</td>
	<td> 123-456-7890 or <a>wimbleydoo@ajax.net</a></td>
	
	</tr>
	
	<tr>
	<td> Looking to Hire an IT guy for our company. Must be hip with the cool kids.</td>
	<td> Wiley Cambry</td>
	<td> 098-765-4321 or <a>acmehead@ajax.net</a></td>
	</tr>
	
	<tr>
	<td> We need someone to lead a group in one of our big upcoming projects. SELU graduate preferred. </td>
	<td> Santo Claro</td>
	<td> 123-123-4545 or <a>claros@ajax.net</a></td>
	
	</tr>

	
	<tr>
	<td> Wanted: .NET Programmer</td>
	<td> Erin Badmintone</td>
	<td> 876-543-0987 or <a>badmintone@ajax.net</a></td>
	
	</tr>
	<tr>
	<td> We need someone who specializes in sick memes, and coding C++ too I guess. </td>
	<td> Danko Memoire</td>
	<td> 673-123-7890 or <a>harambe@ajax.net</a></td>
	
	</tr>
	<tr>
	<td> Looking for an IT genius to work a ridiculous amount of hours for little to no pay. Head pats included for jobs well done. </td>
	<td> Anthony Bork</td>
	<td> 123-145-1245 or <a>doingmeafrightens@ajax.net</a></td>
	
	</tr>
	<tr>
	<td> We need extra people to work the support desk for the Christmas holidays. All our customers' computers are coming in covered in gravy and coupons this week for some reason. Please send help. </td>
	<td> Angela Doge</td>
	<td> 123-123-4545 or <a>doges@ajax.net</a></td>
	
	</tr>
	</table>
	<?php
} else {
	echo 'You are not authorized to access this page, please login.';
}?>
