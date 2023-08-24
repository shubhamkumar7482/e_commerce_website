<?php
include('header.php');
$heading='';
$msg='';

if (isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from offers_heading where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $heading=$row['heading'];

    }else{
        header('location:offer.php');
        die();
    }
    
}

if (isset($_POST['submit'])){
    $heading=get_safe_value($con,$_POST['heading']);

    $res=mysqli_query($con,"select * from offers_heading where heading='$heading'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if (isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
                
            }else{
                $msg="Offers Heading already exist";
            }
       

        }else{
            $msg="Offers Heading already exist";
       
        }
    }
    if($msg==''){
        if (isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update offers_heading set heading = '$heading' where id = '$id'");
    
        }else{
            mysqli_query($con,"insert into offers_heading(heading, status) values ('$heading','1')");
        }
       
        
        ?>
        <script>
            window.location.href='offer.php';
        </script>
        <?php
        die();
    }
}



?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Offer Heading</label>
                                <input type="text" class="form-control" name="heading" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Offer Heading" value="<?php echo $heading?>">
                            </div>
                            <button type="submit" name="submit" class="btn" style="background-color:#f56b23; color:#fff;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
