<?php 

include('header.php');

$color='';

$order_by='';

$msg='';



if (isset($_GET['id']) && $_GET['id']!=''){

    $id=get_safe_value($con,$_GET['id']);

    $res=mysqli_query($con,"select * from color where id='$id'");

    $check=mysqli_num_rows($res);

    if($check>0){

        $row=mysqli_fetch_assoc($res);

        $color=$row['color'];

        $order_by=$row['order_by'];



    }else{
 
        echo "<script>window.location = 'color.php';</script>";
       die();

    }

    

}



if (isset($_POST['submit'])){

    $color=get_safe_value($con,$_POST['color']);

    $order_by=get_safe_value($con,$_POST['order_by']);

    $res=mysqli_query($con,"select * from color where color='$color'");

    $check=mysqli_num_rows($res);



    if($check>0){

        if (isset($_GET['id']) && $_GET['id']!=''){

            $getData=mysqli_fetch_assoc($res);

                if($id==$getData['id']){

                

            }else{

                $msg="color already exist";

            }

       



        }else{

            $msg="color already exist";

       

        }

    }

    if($msg==''){

        if (isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update color set color = '$color', order_by = '$order_by' where id = '$id'");
        }else{
            mysqli_query($con,"insert into color(color,order_by,status) values ('$color','$order_by','1')");
        }

        echo "<script>window.location = 'color.php';</script>";
         die();
    }

}











?>

<div class="content pb-0">

    <div class="animated fadeIn">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header"><strong>color</strong><small> Form</small></div>

                    <form action="" method="post">

                        <div class="card-body card-block">

                            <div class="form-group"><label for="color"

                                    class=" form-control-label">color</label>

                                <input type="text" name="color" placeholder="Enter your color name"

                                    class="form-control" required value="<?php echo $color?>">



                            </div>



                            <div class="form-group"><label for="color"

                                    class=" form-control-label">OrderBy</label>

                                <input type="text" name="order_by" placeholder="Enter Order By Number"

                                    class="form-control" required value="<?php echo $order_by?>">



                            </div>

                            <button id="payment-button" name="submit" type="submit"

                                class="btn btn-md btn-block" style="background-color:#f56b23;">

                                <span id="payment-button-amount" class="text-light">Submit</span>

                            </button>

                            <div class="field_error"><?php echo $msg?></div>

                        </div>

                    </form>



                </div>

            </div>

        </div>

    </div>

</div>

<?php include('footer.php')?>