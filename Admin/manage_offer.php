<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<?php 
include('header.php');
$categories='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$image2= '';
$short_desc='';
$prod_desc='';
$msg='';

$image_required='required';

if (isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    // Edit Section
    if($check>0){
       
        $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $mrp=$row['mrp'];
        $price=$row['price'];
        $qty=$row['qty'];
        $short_desc=$row['short_desc'];
        $prod_desc=$row['prod_desc'];

    }else{
        header('location:product.php');
        die();
    }
    
}

if (isset($_POST['submit'])){
    $categories=get_safe_value($con,$_POST['categories']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $prod_desc=get_safe_value($con,$_POST['prod_desc']);
    $res=mysqli_query($con,"select * from product where name='$name'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if (isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
                
            }else{
                $msg="Product already exist";
            }
       

        }else{
            $msg="Product already exist";
       
        }
    }

    if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
        if($_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
        if($_FILES['image2']['type']!=''){
            if($_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
            $msg="Please select only png,jpg and jpeg image formate";
        }
    }
	}


    if($msg==''){
        if (isset($_GET['id']) && $_GET['id']!=''){
            if($_FILES['image']['name']!=''){
                $image= $name.rand(1111,9999).'_' .$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'../product-images/'.$image);
                $image2= $name.rand(1111,9999).'_' .$_FILES['image']['name'];
                move_uploaded_file($_FILES['image2']['tmp_name'],'../product-images/'.$image2);
                $update_sql="update product set categories = '$categories' ,
                name = '$name' ,
                mrp = '$mrp',
                price = '$price' ,
                qty = '$qty' ,
                short_desc = '$short_desc',
                prod_desc = '$prod_desc',
                image= '$image'
                image2= '$image2'
                where id = '$id'";
            }else{
                $update_sql="update product set categories = '$categories' ,
                name = '$name' ,
                mrp = '$mrp',
                price = '$price' ,
                qty = '$qty' ,
                short_desc = '$short_desc'
                prod_desc = '$prod_desc',
                where id = '$id'";
            }
            mysqli_query($con,$update_sql);

           
    
        }else{
            $image= $name.rand(1111,9999).'_' .$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'../product-images/'.$image);
            $image2= $name.rand(1111,9999).'_' .$_FILES['image2']['name'];
            move_uploaded_file($_FILES['image2']['tmp_name'],'../product-images/'.$image2);
            mysqli_query($con,"insert into product(categories,name,mrp,price,qty,short_desc,prod_desc,status,image,image2) values 
            ('$categories','$name','$mrp','$price','$qty','$short_desc','$prod_desc',1,'$image','$image2')");
        }
        header('location:product.php');
        die();
    }
}



//video start 1:48:36

?>


<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group"><label for="categories"
                                    class=" form-control-label">Categories</label>
                               <select name="categories" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                        $res=mysqli_query($con,"select id, categories from categories order by categories asc");
                                        while ($row=mysqli_fetch_assoc($res)){
                                            
                                                echo "<option selected value=".$row['categories'].">".$row[
                                                    'categories']."</option>";
                                        }
                                        ?>
                               </select>

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product Name</label>
                                <input type="text" name="name" placeholder="Enter your Product name"
                                    class="form-control"  value="<?php echo $name?>">

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product MRP</label>
                                <input type="text" name="mrp" placeholder="Enter your Product MRP"
                                    class="form-control"  value="<?php echo $mrp?>">

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product Price</label>
                                <input type="text" name="price" placeholder="Enter your Product Price"
                                    class="form-control"  value="<?php echo $price?>">

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product Qty</label>
                                <input type="text" name="qty" placeholder="Enter your Product Qty "
                                    class="form-control"  value="<?php echo $qty?>">

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Image</label>
                                <input type="file" name="image"
                                    class="form-control" <?php echo $image_required?> >

                            </div>
                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Other Image</label>
                                <input type="file" name="image2"
                                    class="form-control"  >

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product Short Desc.</label>
                                <textarea name="short_desc" placeholder="Enter your Short Desc."
                                    class="form-control"   value="<?php echo $short_desc?>">
                                </textarea>

                            </div>

                            <div class="form-group"><label for="product"
                                    class=" form-control-label">Product Desc.</label>
                                <textarea name="prod_desc" placeholder="Enter your Product Desc."
                                    class="form-control" id="summernote"  value="<?php echo $prod_desc?>">
                                </textarea>

                            </div>
                         
                        </div>

                            
                            <button id="payment-button" name="submit" type="submit"
                                class="btn btn-md btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg?></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
        $('#summernote').summernote({
            placeholder: 'Enter your Product Desc.',
            tabsize: 2,
            height: 100,
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview', 'help']]
            ]
          });
    </script>
<?php include('footer.php')?>