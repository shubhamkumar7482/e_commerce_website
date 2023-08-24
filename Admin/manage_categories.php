<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<?php 
include('header.php');
$categories='';
$msg='';

if (isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];

    }else{
        header('location:categories.php');
        die();
    }
    
}

if (isset($_POST['submit'])){
    $categories=get_safe_value($con,$_POST['categories']);
    $slug=get_safe_value($con,$_POST['slug']);
    $res=mysqli_query($con,"select * from categories where categories='$categories'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if (isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
                
            }else{
                $msg="Categories already exist";
            }
       

        }else{
            $msg="Categories already exist";
       
        }
    }
    if($msg==''){
        if (isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update categories set categories = '$categories',slug='$slug' where id = '$id'");
    
        }else{
            mysqli_query($con,"insert into categories(categories,slug,status) values ('$categories','$slug','1')");
        }
        
        
        ?>
        <script>
            window.location.href='categories.php';
        </script>
        <?php 
        die();
    }
}





?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form action="" method="post">
                        <div class="card-body card-block">
                            <div class="form-group"><label for="categories"
                                    class=" form-control-label">Categories</label>
                                <input type="text" name="categories" placeholder="Enter your Categories name"
                                    class="form-control" required value="<?php echo $categories?>" id="categories">
                                <input type="hidden" name="slug" id="slug">
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


<script>
        // for Auto slug 

        $(document).on('keyup', "#categories", function() {
            var Text = $(this).val();
            var myurl = changeurl(Text);
            $("#slug").val(myurl);
        });

        function changeurl(str) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            return str;
        }

    </script>