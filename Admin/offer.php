<?php 
include('header.php');

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
        $update_status="update offers_heading set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
        
    }

    if($type=='delete'){

        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from offers_heading where id='$id'";
        mysqli_query($con,$delete_sql);
        
    }
}

$sql="select offers_heading.* from offers_heading";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <hbutton class="box-link btn  p-2" style="background-color:#f56b23;"><a href="offers.php" style="color:#fff;">Add New Offer</a> </hbutton>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                      
                                        <th>ID</th>
                                        <th>Heading Name</th>
                                       
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    
                                    while($row=mysqli_fetch_assoc($res)) { ?>
                                        
                                    
                                    <tr>
                                    <td class="serial"><?php echo $i++;?></td>
                                    <td><?php echo $row['heading']?></td>
                                    <td>
                                        <?php 
                                        if ($row['status']==1){
                                            echo"<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span> &nbsp";
                                        }else{
                                            echo"<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span> &nbsp";
                                        }
                                        echo"<span class='badge badge-edit'><a href='offers.php?type=edit&id=".$row['id']."'>Edit</a></span> &nbsp";
                                        echo"<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span> &nbsp";
                                            
                                            
                                        ?>
                                    
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>