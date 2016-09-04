<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<title>PJs Code</title>
<style>
body{padding:5% 10%; line-height:20px; font-family:calibri;font-size:16px; text-align:center;}
.loading{max-width:100px; margin:20px;}
</style>
</head>
<body>
<div><h3>PHP simaple ajax pagination</h1></div>
<div>
<div id="target-content" ><img src="loading.gif" class="loading"></div>

<?php
include('config.php'); 
$limit = 3;
$sql = "SELECT COUNT(id) FROM employee";  
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>
<div align="center">
<ul class='pagination text-center' id="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>  
</div>
</div>
</body>
<script>
jQuery(document).ready(function() {
jQuery("#target-content").load("pagination.php?page=1");
    jQuery("#pagination li").live('click',function(e){
    e.preventDefault();
        jQuery("#target-content").html('<img src="loading.gif" class="loading">');
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("pagination.php?page=" + pageNum);
    });
    });
</script>