<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    // ...
    include('conn.php');
    $rs = mysqli_query($conn,"select count(*) from student");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];
    $offset=($page-1)*$rows;
    $rs = mysqli_query($conn,"select * from student limit $offset,$rows");
    
    $items = array();
    while($row = mysqli_fetch_object($rs)){
        array_push($items, $row);
    }
    $result["rows"] = $items;
    
    echo json_encode($result);
	// $sql="select * from Student";
	// $rs = mysqli_query($conn,$sql);
	// $result = array();
	// while($row = mysqli_fetch_object($rs)){
 //    	array_push($result, $row);
	// }
	// 	echo json_encode($result);
?>