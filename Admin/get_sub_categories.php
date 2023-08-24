
<?php 
	require('connection_inc.php');
require('function_inc.php');

$categories_id = get_safe_value($con,$_POST['categories_id']);
$sub_cat_id=get_safe_value($con,$_POST['sub_cat_id']);
$sql =  mysqli_query($con,"SELECT * FROM sub_categories WHERE categories='$categories_id'");
if (mysqli_num_rows($sql)>0) {
	$html='';
	while($row=mysqli_fetch_assoc($sql)){
		if($sub_cat_id==$row['id']){
			$html.="<option value=".$row['id']." selected>".$row['sub_categories']."</option>";
		}else{
			$html.="<option value=".$row['id'].">".$row['sub_categories']."</option>";
		}
	}
	echo $html;
}else{

	echo "<option>No Sub categories Found</option>";
}
?>

