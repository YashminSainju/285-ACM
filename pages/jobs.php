<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/27/2016
 * Time: 10:43 AM
 */
include('../inc/database.php');
include('../inc/functions.php');
/*sec_session_start();
if(login_check($db) == true) {*/
	$query1 = $db->query("SELECT id,title,description,contact FROM jobs");
?>

	
	<h1><span class="text-muted">Job Offers: Get Connected!</span></h1>
	
	<table width="100%" class="table table-striped">
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Contact Info</th>
		</tr>
		<?php
			while($query2 = $query1->fetch(PDO::FETCH_ASSOC)) {
				echo "
					<tr>
						<td>" . $query2['title'] . "</td>
                        <td>" . $query2['description'] . "</td>
                        <td>" . $query2['contact'] . "</td>
					</tr>";
			}
		?>
	</table>
	<?php
/*} else {
	echo 'You are not authorized to access this page, please login.';
}
	?>*/
