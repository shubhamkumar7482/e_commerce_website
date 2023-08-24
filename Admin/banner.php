<?php 
include('header.php');
?>

<?php 
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update banner set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from banner where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from banner order by id asc";
$res=mysqli_query($con,$sql);
?>

 <div class="container">
     <section class="section">
        <div class="row">
            <div class="col-lg-12">
            
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Slider Lists &nbsp;&nbsp;
                            <!-- Button trigger modal -->
                           <a href="manage_banner.php" class="btn btn-primary">Add Silder</a>
                        </h3>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Banner</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                       
                                        <td><img src="../banner-images/<?php echo $row['image']; ?>" width="100"></td>
                                         <td><?php echo $row['banner_link']; ?></td>
                                         <td>
            								<?php
            								if($row['status']==1){
            									echo "<span class='badge bg-success p-2'><a href='?type=status&operation=deactive&id=".$row['id']."' class='text-light'>Active</a></span>&nbsp;";
            								}else{
            									echo "<span class='badge bg-info p-2'><a href='?type=status&operation=active&id=".$row['id']."' class='text-light'>Deactive</a></span>&nbsp;";
            								}
            								echo "<span class='badge bg-info p-2'><a href='manage_banner.php?id=".$row['id']."' class='text-light'>Edit</a></span>&nbsp;";
            								
            								echo "<span class='badge bg-danger p-2'><a href='?type=delete&id=".$row['id']."' class='text-light'>Delete</a></span>";
            								
            								?>
            							   </td>

                                    </tr>

                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
              
            </div>
        </div>

        <!-- Button trigger modal -->

    </section>
 </div>
<?php include('footer.php')?>