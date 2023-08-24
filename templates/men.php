<section class="section recent-part" style="margin-top:40px;">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="section-heading">

                    <h2 class="text-left">MODI <span style="color:#F56B23;">JACKETS</span></h2>

                </div>

            </div>

        </div>



        <div class="row row-cols-4 row-cols-md-4 row-cols-lg-4 row-cols-xs-6">

            <?php

            $sql = "SELECT * FROM product WHERE product.categories = '1' AND product.status = 1 ORDER BY product.id DESC limit 12";

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $row = $stmt->fetchAll();

            foreach ($row as $rows) { ?>

                <div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 mt-3">

                    <div class="product-card">

                        <div class="product-media">

                            <div class="product-label"><label class="label-text sale">sale</label></div>

                            <button class="product-wish wish add_to_wishlist" id="<?php echo $rows['id'] ?>"><i class="fas fa-heart"></i></button><a class="product-image" href="/p/<?php echo slug($rows['id'], $conn); ?>">

                              

                                <img src="product-images/<?php echo $rows['image']; ?>" alt="product" />

                            </a>

                           

                        </div>

                        <div class="product-content">

                            <h6 class="product-name"><a href="/p/<?php echo slug($rows['id'], $conn); ?>"><?php echo $rows['name']; ?></a></h6>

                            <h6 class="product-price">

                                <del>₹ <?php echo $rows['mrp']; ?></del><span>₹ <?php echo $rows['price']; ?><small>/piece</small></span>

                            </h6>

                                <input type="hidden" name="p_image" id="p_image<?php echo $rows['id'] ?>" value="<?php echo $rows['image'] ?>">

                                <input type="hidden" name="p_name" id="p_name<?php echo $rows['id'] ?>" value="<?php echo $rows['name'] ?>">

                                <input type="hidden" name="p_price" id="p_price<?php echo $rows['id'] ?>" value="<?php echo $rows['price'] ?>">

                                <input class="action-input" title="Quantity Number" type="hidden" name="quantity" id="p_qty<?php echo $rows['id']?>" value="1" />

                                <button class="product-add add_to_cart" title="Add to Cart" name="add_to_cart" id="<?php echo $rows['id'] ?>"><i class="fas fa-shopping-basket"></i><span> &nbsp; add to cart</span></button>

                        </div>

                    </div>

                </div>



            <?php }

            ?>



        </div>

        <div class="row">

            <div class="col-lg-12">

                <div class="section-btn-25">

                    <a href="shop-now" class="btn btn-outline"><i class="fas fa-eye"></i><span>show more</span></a>

                </div>

            </div>

        </div>

    </div>

</section>