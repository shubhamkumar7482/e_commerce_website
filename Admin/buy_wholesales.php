<?php 
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from buy_wholesales where id='$id'";
        mysqli_query($con,$delete_sql);
        
    }

    
}

$sql="select * from buy_wholesales order by id asc";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Buy Wholesales </h4>
                        
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Mobile No.</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Date</th>
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {  ?>
                                    <tr>
                                    <td class="serial"><?php echo $i ++?></td>
                                    
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['mobile']?></td>
                                    <td><?php echo $row['product_name']?></td>
                                    <td><?php echo $row['qty']?></td>
                                    <td><?php echo $row['date']?></td>
                                    <td>
                                        <?php 
                                        
                                        echo"<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' class='text-light'>Delete</a></span> &nbsp";
                                            
                                            
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