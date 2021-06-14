	<?php $sql = "select * from opinie";
       $result = $connect->prepare($sql);
      	$result->execute();
	$row_count = $result->rowCount();
	$total_pages = ceil($row_count/$perpage);
	
	if ($page>1) {
			echo "   <a href='index.php?page=".($page-1)."'>prev</a>" ;

				
	}
	for($i=1; $i<$total_pages+1; $i++) {
       	echo "   <a href='index.php?page=".$i."'>".$i."</a>" ;
		}
if ($page<$total_pages) {
			echo "   <a href='index.php?page=".($page+1)."'>next</a>" ;}

?>
