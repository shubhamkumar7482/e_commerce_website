<section class="section recent-part" style="margin-top: 60px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2 class="text-left">FASHION<span style="color:#b38504;"> ACCESSORIES</span></h2>
                        </div>
                    </div>
                </div>
                
                <div class="row row-cols-4 row-cols-md-4 row-cols-lg-4 row-cols-xs-6">
                    <?php
                    $sql = "SELECT * FROM product WHERE product.categories = '3' AND product.status = 1 ORDER BY product.id DESC ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetchAll();
                    foreach ($row as $rows) {?>
                    <div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label"><label class="label-text sale">sale</label></div>
                                <button class="product-wish wish add_to_wishlist" id="<?php echo $rows['id'] ?>"><i class="fas fa-heart"></i></button><a class="product-image" href="product_detail.php?id=<?php echo $rows['id']; ?>">
                                    <img src="product-images/<?php echo $rows['image']; ?>" alt="product" />
                                </a>
                              
                            </div>
                            <div class="product-content">
                               <!-- <div class="d-flex">
                                 <p style="margin-left:20px !important;"><?php include('templates/review-rating.php')?></p> &nbsp; &nbsp;
                                 <p></p><?php echo $rows['sold']; ?></p>
                                 </div> -->
                                <h6 class="product-name"><a href="products.php?category=1"><?php echo $rows['name']; ?></a></h6>
                                <h6 class="product-price">
                                    <del>₹ <?php echo $rows['mrp']; ?></del><span>₹ <?php echo $rows['price']; ?><small>/piece</small></span>
                                </h6>
                                <input type="hidden" name="p_image" id="p_image<?php echo $rows['id'] ?>" value="<?php echo $rows['image'] ?>">
                                <input type="hidden" name="p_name" id="p_name<?php echo $rows['id'] ?>" value="<?php echo $rows['name'] ?>">
                                <input type="hidden" name="p_price" id="p_price<?php echo $rows['id'] ?>" value="<?php echo $rows['price'] ?>">
                                <input class="action-input" title="Quantity Number" type="hidden" name="quantity" id="p_qty<?php echo $rows['id']?>" value="1" />
                                <button class="product-add add_to_cart" title="Add to Cart" name="add_to_cart" id="<?php echo $rows['id'] ?>"><i class="fas fa-shopping-basket" ></i><span> &nbsp; add to cart</span></button>
                            </div>
                        </div>
                    </div>
                        
                    <?php }
                    ?>
                    
                </div>
                <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25">
                    <a href="" class="btn btn-outline"><i class="fas fa-eye"></i><span>show more</span></a>
                </div>
            </div>
        </div>
            </div>
        </section>