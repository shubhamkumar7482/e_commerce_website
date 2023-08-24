<?php 
include('header.php');
?>
<?php
$banner_link='';
$image='';
$msg='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$image_required='';
	$res=mysqli_query($con,"select * from banner where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$banner_link=$row['banner_link'];
		$image=$row['image'];
	}else{
		header('location:banner.php');
		die();
	}
}



if(isset($_POST['submit'])){

	$banner_link=get_safe_value($con,$_POST['banner_link']);
	
	$msg="";
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
			    $image=$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../banner-images/'.$image);
				mysqli_query($con,"update banner set banner_link='$banner_link',image='$image' where id='$id'");
			}else{
				mysqli_query($con,"update banner set banner_link='$banner_link' where id='$id'");
			}
		}else{
			$image=$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'../banner-images/'.$image);
			mysqli_query($con,"insert into banner(banner_link,image,status) values('$banner_link','$image','1')");
		}
// 		header('location:banner.php');
		
		?>
		<script>
		    window.location.href='banner.php';
		</script>
		<?php 
		die();
	}
}
?>

 <div class="container">
     <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3 pt-2">
                    <h2 class="card-title ml-3">Add New Slider </h2>
                    <div class="card-body">
                       <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="form-control" <?php echo  $image_required?> value="<?php echo $image?>">
                        <div>
                            <?php
								if($image!=''){ ?>
                            <img src="../banner-images/<?php echo $image?>"/ style="width: 250px; height: 150px; ">
                            
								<?php } ?>
                        </div>
                                    <label class="mt-3">Banner Link</label>
                                    <input type="text" name="banner_link"  class="form-control" placeholder="Enter Banner Link" value="<?php echo $banner_link?>">
                                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add Slider</button>
                       </form>
                       

                    </div>
                </div>
           
            </div>
        </div>

        <!-- Button trigger modal -->

    </section>
 </div>
<?php include('footer.php')?>