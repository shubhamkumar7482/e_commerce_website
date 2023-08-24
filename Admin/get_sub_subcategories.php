
<?php 
	require('connection_inc.php');
require('function_inc.php');

$sub_categories_id = get_safe_value($con,$_POST['sub_categories_id']);
$sql =  mysqli_query($con,"SELECT * FROM sub_subcategories WHERE categories='$sub_categories_id'");
if (mysqli_num_rows($sql)>0) {
	
		$html = "";
		while($row= mysqli_fetch_assoc($sql)){
			$html.="<option value=".$row['id'].">".$row['sub_subcategories']."</option>";
			
		}
		echo $html;
}else{

	echo "<option>No Sub Subcategories Found</option>";
}
?>

