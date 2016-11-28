<?php
/**
 * Created by PhpStorm.
 * User: Yashmin
 * Date: 11/28/2016
 * Time: 3:15 AM
 */
include "inc/database.php";

$start=0;
$limit=5;

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}


$query1 = $db->query("SELECT id,title,description,contact FROM jobs");
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
$rows=$query1->rowCount();
$total=ceil($rows/$limit);
?>
<div class="row">
    <div class="col col-xs-4">
    </div>
    <div class="col col-xs-8">
        <ul class="pagination hidden-xs pull-right">
            <?php
            if(isset($id)){
                for($i=1;$i<=$total;$i++)
                {
                    if($i==$id) { echo "<li class='selected'>".$i."</li>"; }

                    else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
                }
            ?>

        </ul>
        <ul class="pagination visible-xs pull-right">
            <li><a href="#">«</a></li>
            <?php
                if($id>1)
                {
                    echo "<a href='?id=".($id-1)."' class='button'>«</a>";
                }
                if($id!=$total)
                {
                    echo "<a href='?id=".($id+1)."' class='button'>»</a>";
                }
                }
            ?>
        </ul>
    </div>
</div>

}
