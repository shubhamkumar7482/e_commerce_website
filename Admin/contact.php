<?php 
include('header.php');

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Subcribers </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Email#</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    $sql = "SELECT * FROM subcribers";
                                    $result = mysqli_query($con,$sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        
                                    
                                    <tr>
                                    <td class="serial"><?php echo $i++;?></td>
                                    <td><?php echo $row['email'];?></td>

                                    <td>
                                        <?php echo $row['created_at'];?>
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