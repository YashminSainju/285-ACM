<?php
    include 'database.php';
        $result = $db->query('SELECT * FROM jobs');
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $count = $result->rowCount();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $jobList[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'contact' => $row['contact'],
            );

        }

    $myData = array('jobList' => $jobList, 'totalCount' => $count);

    echo json_encode($myData);


?>
