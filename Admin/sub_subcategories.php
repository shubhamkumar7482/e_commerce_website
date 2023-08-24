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
        $update_status="update sub_subcategories set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
        
    }

    if($type=='delete'){

        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from sub_subcategories where id='$id'";
        mysqli_query($con,$delete_sql);
        
    }
}

$sql="select sub_subcategories.*,categories.categories,sub_categories.sub_categories from sub_subcategories,categories,sub_categories where categories.id=sub_subcategories.categories and sub_categories.id=sub_subcategories.sub_categories order by sub_subcategories asc";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">sub_subcategories </h4>
                        <h4 class="box-link"><a href="manage_sub_subcategories.php" style="color:black;">Add sub_subcategories</a> </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">#ID</th>
                                        <th>Main Categories</th>
                                        <th>Sub categories</th>
                                        <th>Sub Subcategories</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    
                                    while($row=mysqli_fetch_assoc($res)) { ?>
                                        
                                    
                                    <tr>
                                    <td class="serial"><?php echo $i++?></td>
                                    <td><?php echo $row['categories']?></td>
                                    <td><?php echo $row['sub_categories']?></td>
                                    <td><?php echo $row['sub_subcategories']?></td>
                                    <td>
                                        <?php 
                                        if ($row['status']==1){
                                            echo"<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span> &nbsp";
                                        }else{
                                            echo"<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span> &nbsp";
                                        }
                                        echo"<span class='badge badge-edit'><a href='manage_sub_subcategories.php?type=edit&id=".$row['id']."'>Edit</a></span> &nbsp";
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