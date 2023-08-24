<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<?php 
include('header.php');
$sub_categories='';
$categories='';
$msg='';

if (isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from sub_categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $sub_categories=$row['sub_categories'];

    }else{
        header('location:sub_categories.php');
        die();
    }
    
}

if (isset($_POST['submit'])){
     $categories=get_safe_value($con,$_POST['categories']);
    $sub_categories=get_safe_value($con,$_POST['sub_categories']);
    $slug=get_safe_value($con,$_POST['slug']);
    $res=mysqli_query($con,"select * from sub_categories where sub_categories='$sub_categories'");
    if($msg==''){
        if (isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update sub_categories set categories = '$categories', sub_categories = '$sub_categories',slug='$slug' where id = '$id'");
    
        }else{
            mysqli_query($con,"insert into sub_categories(categories,sub_categories,slug,status) values ('$categories','$sub_categories','$slug','1')");
        }
        
        ?>
        <script>
            window.location.href='sub_categories.php';
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
                    <div class="card-header"><strong>Sub Categories</strong><small> Form</small></div>
                    <form action="" method="post">
                        <div class="card-body card-block">
                            <div class="form-group"><label for="categories"
                                    class=" form-control-label">Categories</label>
                               <select name="categories" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $res=mysqli_query($con,"select id, categories from categories order by categories asc");
                                        while ($row=mysqli_fetch_assoc($res)){
                                            
                                                if ($row['id'] == categories) {
                                                    echo "<option selected value=".$row['id'].">".$row[
                                                    'categories']."</option>";
                                                }else{
                                                echo "<option selected value=".$row['id'].">".$row[
                                                    'categories']."</option>";
                                                }
                                        }
                                        ?>
                               </select>

                            </div>

                            <div class="form-group"><label for="sub_categories"
                                    class=" form-control-label">Sub Categories</label>
                                <input type="text" name="sub_categories" placeholder="Enter your Sub Categories Name"
                                    class="form-control" required value="<?php echo $sub_categories?>" id="sub_categories">
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

        $(document).on('keyup', "#sub_categories", function() {
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