<?php
include('config.php');

$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM employee ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysql_query ($sql);  

?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>id</th>  
<th>First_name</th>
<th>last_name</th>
<th>job_title</th>
<th>salary</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysql_fetch_assoc($rs_result)) {  
?>  
            <tr>  
            <td><?php echo $row["id"]; ?></td>  
            <td><?php echo $row["first_name"]; ?></td>  
			<td><?php echo $row["last_name"]; ?></td>  
			<td><?php echo $row["job_title"]; ?></td>  
			<td><?php echo $row["salary"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>