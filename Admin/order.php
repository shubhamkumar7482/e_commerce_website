<?php 

include('header.php');



?>

<div class="content pb-0">

    <div class="orders">

        <div class="row">

            <div class="col-xl-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="box-title">Orders </h4>

                    </div>

                    <div class="card-body--">

                        <div class="table-stats order-table ov-h">

                            <table class="table">

                                <thead>

                                    <tr>

                                        <th class="serial">#</th>

                                        <th>Order#</th>

                                        <th>Invoice#</th>

                                        <th>QTY</th>

                                        <th>Amount</th>

                                        <th>Order Date</th>

                                        <th>payment Mode</th>

                                        <th>Status</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                    $i=1;
                                    $sql = "SELECT * FROM orders order by order_id desc";
                                    $result = mysqli_query($con,$sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                       
                                    ?> 
                                    <tr>
                                    <td class="serial"><?php echo $i++;?></td>
                                    <td><?php echo $row['order_id'];?></td>
                                    <td><?php echo $row['invoice_id'];?></td>
                                    <td><?php echo $row['total_item']?></td>
                                    <td>&#x20b9; <?php echo $row['total_pay']?></td>
                                    <td><?php echo date("d/m/Y H:i A", strtotime($row['order_time'])); ?></td>
                                    <td>
                                        <?php 
                                        if ($row['payment_mode']=='online'){
                                            echo"<span class='badge badge-warning'>Online</a></span> &nbsp";
                                        }else if ($row['payment_mode']==1){
                                            echo"<span class='badge badge-info'>cod</a></span> &nbsp";
                                        }

                                         ?>

                                    </td>

                                    <td>

                                        <?php 

                                       

                                        if ($row['order_status']==1 && empty($row['is_paid'])){

                                            echo"<span class='badge badge-complete'>order received</a></span> &nbsp";

                                        }else if (!empty($row['is_paid']) && $row['is_paid']!='-1'){

                                            echo"<span class='badge badge-success'>Paid</a></span> &nbsp";

                                        }else if ($row['order_status']==2){

                                            echo"<span class='badge badge-info'>Confirmed</a></span> &nbsp";

                                        }

                                        else if ($row['order_status']==3){

                                            echo"<span class='badge badge-danger'>Cancelled</a></span> &nbsp";

                                        }

                                        else if ($row['order_status']==4){

                                            echo"<span class='badge badge-success'>Delivered</a></span> &nbsp";

                                        }

                                        else{

                                            echo"<span class='badge badge-pending'>Proccess</a></span> &nbsp";



                                        }   

                                            

                                        ?>

                                    

                                    </td>

                                    <td>
                                        <?php if ($row['order_status']!=3){ ?>
                                        <a href="order-status.php?orderid=<?php echo $row['order_id'];?>&&status=2 " class="btn btn-sm btn-success">Confirm</a>

                                        <a href="order-status.php?orderid=<?php echo $row['order_id'];?>&&status=3" class="btn btn-sm btn-danger">Cancelled</a>

                                        <a href="order-status.php?orderid=<?php echo $row['order_id'];?>&&status=4" class="btn btn-sm btn-primary">Delivered</a>

                                        <?php } ?>
                                        <a href="../invoice.php?invoice_id=<?php echo $row['invoice_id']; ?>" class="btn btn-sm btn-info" target="_blank">View</a>

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