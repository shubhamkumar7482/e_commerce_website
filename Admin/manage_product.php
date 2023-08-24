<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">



<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>



<?php

include('header.php');
error_reporting(0);
$categories = '';

$sub_categories = '';

$name = '';

$mrp = '';

$price = '';

//$qty='';

$sold = '';

$gst = '';

$image = '';

$image2 = '';

$image3 = '';

$image4 = '';

$short_desc = '';

$prod_desc = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';



$image_required = 'required';



$attrProduct[0]['product_id'] = '';

$attrProduct[0]['size_id'] = '';

$attrProduct[0]['product_code'] = '';

$attrProduct[0]['qty'] = '';

$attrProduct[0]['id'] = '';



if (isset($_GET['id']) && $_GET['id'] != '') {

    $image_required = '';

    $id = get_safe_value($con, $_GET['id']);

    $res = mysqli_query($con, "select * from product where id='$id'");

    $check = mysqli_num_rows($res);

    // Edit Section

    if ($check > 0) {



        $row = mysqli_fetch_assoc($res);

        $categories = $row['categories'];

        $sub_categories = $row['sub_categories'];

        $name = $row['name'];

        $mrp = $row['mrp'];

        $price = $row['price'];

        // $qty=$row['qty'];

        $sold = $row['sold'];

        $gst = $row['gst'];

        $short_desc = $row['short_desc'];

        $prod_desc = $row['prod_desc'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
        $image = $row['image'];

        $image2 = $row['image2'];

        $image3 = $row['image3'];

        $image4 = $row['image4'];



        $resProductAttr = mysqli_query($con, "select * from product_attribute where product_id='$id'");

        $jj = 0;

        while ($rowProductAttr = mysqli_fetch_assoc($resProductAttr)) {

            $attrProduct[$jj]['product_id'] = $rowProductAttr['product_id'];

            $attrProduct[$jj]['size_id'] = $rowProductAttr['size_id'];

            $attrProduct[$jj]['product_code'] = $rowProductAttr['product_code'];

            $attrProduct[$jj]['qty'] = $rowProductAttr['qty'];

            $attrProduct[$jj]['id'] = $rowProductAttr['id'];

            $attrProduct[$rowProductAttr['size_id']]['colors'] = $rowProductAttr['colors'];

            $jj++;
        }
    } else {

        header('location:product.php');

        die();
    }
}



if (isset($_POST['submit'])) {
    // print_r($_POST);
    // die();
    $categories = get_safe_value($con, $_POST['categories']);

    $sub_categories = get_safe_value($con, $_POST['sub_categories']);

    $name = get_safe_value($con, $_POST['name']);

    $slug = get_safe_value($con, $_POST['slug']);

    $mrp = get_safe_value($con, $_POST['mrp']);

    $price = get_safe_value($con, $_POST['price']);

    $qty = get_safe_value($con, $_POST['qty']);

    $sold = get_safe_value($con, $_POST['sold']);

    $gst = get_safe_value($con, $_POST['gst']);

    $short_desc = get_safe_value($con, $_POST['short_desc']);

    $prod_desc = get_safe_value($con, $_POST['prod_desc']);

    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);

    $res = mysqli_query($con, "select * from product where name='$name'");

    $check = mysqli_num_rows($res);









    if ($msg == '') {

        if (isset($_GET['id']) && $_GET['id'] != '') {

            if ($_FILES['image']['name'] != '') {

                $image = $_FILES['image']['name'];

                move_uploaded_file($_FILES['image']['tmp_name'], '../product-images/' . $image);

                $image2 = $_FILES['image2']['name'];

                move_uploaded_file($_FILES['image2']['tmp_name'], '../product-images/' . $image2);

                $image3 = $_FILES['image3']['name'];

                move_uploaded_file($_FILES['image3']['tmp_name'], '../product-images/' . $image3);

                $image4 = $_FILES['image4']['name'];

                move_uploaded_file($_FILES['image4']['tmp_name'], '../product-images/' . $image4);

                $update_sql = "update product set categories = '$categories' ,sub_categories = '$sub_categories' ,

                name = '$name' ,
                
                slug = '$slug',
                
                mrp = '$mrp',

                price = '$price' ,

                sold = '$sold' ,

                gst = '$gst' ,

                short_desc = '$short_desc',

                prod_desc = '$prod_desc',
                
                meta_title = '$meta_title',
                
                meta_keyword = '$meta_keyword',
                
                meta_desc = '$meta_desc',

                image= '$image',

                image2= '$image2',

                image3= '$image3',

                image4= '$image4'

                where id = '$id'";



            } else {

                $update_sql = "update product set categories='$categories' ,sub_categories = '$sub_categories' ,

                name = '$name' ,
                
                slug = '$slug',
                
                mrp = '$mrp',

                price = '$price' ,

                sold = '$sold' ,

                gst = '$gst' ,

                short_desc = '$short_desc',

                prod_desc = '$prod_desc',
                
                meta_title = '$meta_title',
                
                meta_keyword = '$meta_keyword',
                
                meta_desc = '$meta_desc'

                where id = '$id'";
            }

            mysqli_query($con, $update_sql);
        } else {

            $image = $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], '../product-images/' . $image);

            $image2 = $_FILES['image2']['name'];

            move_uploaded_file($_FILES['image2']['tmp_name'], '../product-images/' . $image2);

            $image3 = $_FILES['image3']['name'];

            move_uploaded_file($_FILES['image3']['tmp_name'], '../product-images/' . $image3);

            $image4 = $_FILES['image4']['name'];

            move_uploaded_file($_FILES['image4']['tmp_name'], '../product-images/' . $image4);

            mysqli_query($con, "insert into product(categories,sub_categories,size_id,name,slug,mrp,price,sold,gst,short_desc,prod_desc,meta_title,meta_keyword,meta_desc,status,image,image2,image3,image4) values 

            ('$categories','$sub_categories','$size_id','$name','$slug','$mrp','$price','$sold','$gst','$short_desc','$prod_desc','$meta_title','$meta_keyword','$meta_desc',1,'$image','$image2','$image3','$image4')");

            $id = mysqli_insert_id($con);
        }



        if (isset($_POST['qty'])) {

            foreach ($_POST['qty'] as $key => $val) {

                $qty = get_safe_value($con, $_POST['qty'][$key]);

                $size_id = get_safe_value($con, $_POST['size_id'][$key]);

                $product_code = $_POST['product_code'][$key];

                $attr_id = get_safe_value($con, $_POST['attr_id'][$key]);



                if ($attr_id > 0) {
                    mysqli_query($con, "update product_attribute set size_id='$size_id',qty='$qty',product_code='$product_code', colors='" . implode(",", $_POST['color_id'][$key]) . "' where id='$attr_id'");
                } else {

                    mysqli_query($con, "insert into product_attribute(product_id,size_id,qty,product_code,colors) values('$id','$size_id','$qty','$product_code', '" . implode(",", $_POST['color_id'][$key]) . "')");
                }
            }
        }



?>

        <script>
            window.location.href = 'product.php';
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



                    <div class="card-header"><strong>Product</strong><small> Form</small></div>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="card-body card-block">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>

                                        <select name="categories" class="form-control" id="categories_id" onchange="get_sub_categories('')" required>

                                            <option value="">Select Category</option>

                                            <?php

                                            $res = mysqli_query($con, "select id,categories from categories order by categories asc");

                                            while ($row = mysqli_fetch_assoc($res)) {

                                                if ($row['id'] == $categories) {

                                                    echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                } else {

                                                    echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                }
                                            }

                                            ?>

                                        </select>



                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group"><label for="categories" class=" form-control-label">Sub Categories</label>

                                        <select name="sub_categories" class="form-control" id="sub_categories">

                                            <option value="">Select Sub Category</option>



                                        </select>



                                    </div>

                                </div>

                            </div>





                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group"><label for="product" class=" form-control-label">Product Name</label>

                                        <input type="text" name="name" placeholder="Enter your Product name" class="form-control" value="<?php echo $name ?>" id="name">

                                        <input type="hidden" name="slug" id="slug">

                                    </div>

                                </div>

                                <!--    <div class="col-md-6">-->

                                <!--         <div class="form-group"><label for="product"-->

                                <!--        class=" form-control-label">Product Code </label>-->

                                <!--    <input type="text" name="sold" placeholder="Enter your Product Code "-->

                                <!--        class="form-control"  value="<?php echo $sold ?>">-->



                                <!--</div>-->

                                <!--    </div>-->

                            </div>



                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">Product MRP</label>

                                        <input type="text" name="mrp" placeholder="Enter MRP" class="form-control" value="<?php echo $mrp ?>">



                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">Selling Price</label>

                                        <input type="text" name="price" placeholder="Enter Selling Price" class="form-control" value="<?php echo $price ?>">



                                    </div>

                                </div>



                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">GST</label>

                                        <input type="text" name="gst" placeholder="Enter GST" class="form-control" value="<?php echo $gst ?>">



                                    </div>

                                </div>

                            </div>



                            <div class="form-group" id="product_attr_box">

                                <?php

                                $attrProductLoop = 1;
                                $index = 0;
                                foreach ($attrProduct as $list) { ?>

                                    <div class="row" id="attr_<?php echo $attrProductLoop ?>">



                                        <div class="col-lg-2">

                                            <label for="categories" class=" form-control-label">Size</label>

                                            <select class="form-control" name="size_id[]" id="size_id">

                                                <option>Size</option>

                                                <?php

                                                $res = mysqli_query($con, "select id,size from size order by order_by asc");

                                                while ($row = mysqli_fetch_assoc($res)) {

                                                    if ($list['size_id'] == $row['id']) {

                                                        echo "<option value=" . $row['id'] . " selected>" . $row['size'] . "</option>";
                                                    } else {

                                                        echo "<option value=" . $row['id'] . " >" . $row['size'] . "</option>";
                                                    }
                                                }

                                                ?>

                                            </select>



                                        </div>


                                        <div class="col-lg-4">
                                            <label for="categories" class=" form-control-label">Color</label>

                                            <select class="form-control select" name="color_id[<?php echo $index; ?>][]" id="color_id" multiple>

                                                <option hidden>Color</option>

                                                <?php
                                                $selectedcolor = explode(",", $attrProduct[$list['size_id']]['colors']);

                                                $res = mysqli_query($con, "select id,color from color order by order_by asc");
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                }
                                                ?>

                                            </select>

                                        </div>

                                        <div class="col-lg-1">

                                            <label for="categories" class=" form-control-label">Qty</label>

                                            <input type="text" name="qty[]" placeholder="Qty" class="form-control" value="<?php echo $list['qty'] ?>">

                                        </div>



                                        <div class="col-lg-3">

                                            <div class="form-group"><label for="product" class=" form-control-label">Code </label>

                                                <input type="text" name="product_code[]" placeholder="Code " class="form-control" value="<?php echo $list['product_code'] ?>">



                                            </div>

                                        </div>



                                        <div class="col-lg-2">

                                            <label for="categories" class=" form-control-label"></label>

                                            <?php

                                            if ($attrProductLoop == 1) {

                                            ?>

                                                <label class="text-white">Add More</label>

                                                <button id="" type="button" class="btn btn-info btn-block" onclick="add_more_attr()">

                                                    <span id="payment-button-amount">Add More</span>

                                                </button>

                                            <?php

                                            } else {

                                            ?>
                                                <label class="text-white">&nbsp;</label>
                                                <button id="" type="button" class="btn btn-danger btn-block" onclick="remove_attr('<?php echo $attrProductLoop ?>','<?php echo $list['id'] ?>')">

                                                    <span id="payment-button-amount">Remove</span>

                                                </button>

                                            <?php

                                            }



                                            ?>

                                            <input type="hidden" name="attr_id[]" value='<?php echo $list['id'] ?>' />

                                        </div>

                                    </div>

                                <?php
                                    $index++;
                                    $attrProductLoop++;
                                } ?>

                            </div>





                            <div class="row">

                                <div class="col-md-3">

                                    <div class="form-group"><label for="product" class=" form-control-label">Image</label>

                                        <input type="file" name="image" class="form-control" <?php echo $image_required ?>>



                                    </div>
                                    <?php

                                    if ($image != '') { ?>
                                        <img src="../product-images/<?php echo $image ?>" style="border:2px solid gray; width: 100px; height: 100px;">
                                    <?php } ?>
                                </div>

                                <div class="col-md-3">

                                    <div class="form-group"><label for="product" class=" form-control-label">Image 1</label>

                                        <input type="file" name="image2" class="form-control">



                                    </div>
                                    <?php

                                    if ($image2 != '') { ?>
                                        <img src="../product-images/<?php echo $image2 ?>" style="border:2px solid gray; width: 100px; height: 100px;">
                                    <?php } ?>
                                </div>



                                <div class="col-md-3">

                                    <div class="form-group"><label for="product" class=" form-control-label">Image 2</label>

                                        <input type="file" name="image3" class="form-control">



                                    </div>
                                    <?php

                                    if ($image3 != '') { ?>
                                        <img src="../product-images/<?php echo $image3 ?>" style="border:2px solid gray; width: 100px; height: 100px;">
                                    <?php  } ?>
                                </div>

                                <div class="col-md-3">

                                    <div class="form-group"><label for="product" class=" form-control-label">Image 3</label>

                                        <input type="file" name="image4" class="form-control">



                                    </div>

                                    <?php

                                    if ($image4 != '') { ?>

                                        <img src="../product-images/<?php echo $image4 ?>" style="border:2px solid gray; width: 100px; height: 100px;">
                                    <?php  }  ?>

                                </div>



                            </div>



                            <div class="form-group mt-4"><label for="product" class=" form-control-label">Product Desc.</label>

                                <textarea name="short_desc" placeholder="Enter your Short Desc." class="form-control" value="" id="summernote1">

                                   <?php echo $short_desc ?>

                                </textarea>



                            </div>



                            <div class="form-group"><label for="product" class=" form-control-label">Product Desc.</label>

                                <textarea name="prod_desc" placeholder="Enter your Product Desc." class="form-control" id="summernote" value="">

                                    <?php echo $prod_desc ?>

                                </textarea>



                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">Meta Title</label>

                                        <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control" value="<?php echo $meta_title ?>">



                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">Meta Keyword</label>

                                        <input type="text" name="meta_keyword" placeholder="Enter Meta Keyword" class="form-control" value="<?php echo $meta_keyword ?>">



                                    </div>

                                </div>



                                <div class="col-md-4">

                                    <div class="form-group"><label for="product" class=" form-control-label">Meta Description</label>

                                        <input type="text" name="meta_desc" placeholder="Enter Meta Description" class="form-control" value="<?php echo $meta_desc ?>">



                                    </div>

                                </div>

                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-md btn-block" style="background-color:#f56b23;">

                                <span id="payment-button-amount" class="text-light">Submit Now</span>

                            </button>

                        </div>







                        <div class="field_error"><?php echo $msg ?></div>

                </div>

                </form>



            </div>

        </div>

    </div>

</div>

</div>


<script type="text/javascript">
    function get_sub_categories(sub_cat_id) {

        var categories_id = jQuery("#categories_id").val();

        jQuery.ajax({

            url: 'get_sub_categories.php',

            type: 'POST',

            data: 'categories_id=' + categories_id + '&sub_cat_id=' + sub_cat_id,

            success: function(result) {

                jQuery('#sub_categories').html(result);

            }

        });

    }







    var attr_count = 1;

    function add_more_attr() {

        attr_count++;



        var size_html = jQuery('#attr_1 #size_id').html();
        var color_html = jQuery('#attr_1 #color_id').html();

        size_html = size_html.replace('selected', '');



        var html = '<div class="row mt-3" id="attr_' + attr_count + '"> <div class="col-lg-2"><label for="categories" class=" form-control-label">Size</label><select class="form-control" id="size_id" name="size_id[]">' + size_html + '</select> </div><div class="col-lg-4"><label for="categories" class=" form-control-label">Color</label><select class="form-control select" name="color_id[' + attr_count + '][]" id="color_id" multiple>' + color_html + '</select></div><div class="col-lg-1"><label for="categories" class=" form-control-label">Qty</label><input type="text" name="qty[]" placeholder="Qty" class="form-control" value="<?php echo $list['qty'] ?>"> </div><div class="col-lg-3"><div class="form-group"><label for="product"class=" form-control-label">Code </label><input type="text" name="product_code" placeholder="Code " class="form-control" value="<?php echo $list['product_code'] ?>"></div></div> <div class="col-lg-2"><label for="categories" class=" form-control-label">&nbsp;</label><button id="" type="button" class="btn btn-danger btn-block" onclick=remove_attr("' + attr_count + '")><span id="payment-button-amount">Remove</span></button> </div><input type="hidden" name="attr_id[]" value=""/></div>';

        jQuery('#product_attr_box').append(html);
        jQuery('#attr_' + attr_count + ' select.select').selectpicker();;
    }



    function remove_attr(attr_count, id) {

        jQuery.ajax({

            url: 'remove_product_attr.php',

            data: 'id=' + id,

            type: 'post',

            success: function(result) {

                jQuery('#attr_' + attr_count).remove();

            }

        });

    }
</script>



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



<script>
    $('#summernote1').summernote({

        placeholder: 'Enter your Short Desc.',

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

<?php include('footer.php') ?>

<link rel="stylesheet " type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>


<script type="text/javascript">
    $('select.select').selectpicker();
</script>
<script>
    <?php

    if (isset($_GET['id'])) {

    ?>

        get_sub_categories('<?php echo $sub_categories ?>');

    <?php } ?>
</script>


<script>
    // for Auto slug 

    $(document).on('keyup', "#name", function() {
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