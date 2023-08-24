<section class="inner-section mb-5">

    <div class="container">

        <div class="row">

            <div class="col">

                <div class="section-heading">

                     <h2 class="text-left">RELATED <span style="color:#F56B23;">PRODUCTS</span></h2>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col">

                <ul class="new-slider slider-arrow">

                    <?php
                     
                    $sql = "SELECT * FROM product WHERE product.status = 1 ORDER BY product.id DESC ";

                    $stmt = $conn->prepare($sql);

                    $stmt->execute();

                    $row = $stmt->fetchAll();

                    foreach ($row as $rows) { ?>

                    <li>

                        <div class="product-card">

                            <div class="product-media">

                                <!--<div class="product-label"><label class="label-text new">new</label></div>-->

                                <button class="product-wish wish"><i class="fas fa-heart"></i></button>

                                <a class="product-image" href="/p/<?php echo slug($rows['id'], $conn); ?>">

                                     <img src="/product-images/<?php echo $rows['image']; ?>" alt="product" />

                                </a>





                            </div>

                            <div class="product-content">

                                <div class="d-flex">

                                 <p style="margin-left:20px !important;"><?php include('templates/review-rating.php')?></p> &nbsp; &nbsp;

                                 <p></p><?php echo $rows['sold']; ?></p>

                                 </div>

                                <h6 class="product-name"><a href=""><?php echo $rows['name']; ?></a></h6>

                                <h6 class="product-price">

                                    <del>₹ <?php echo $rows['mrp']; ?></del><span>₹

                                        <?php echo $rows['price']; ?><small>/piece</small></span>

                                </h6>

                                <input type="hidden" name="p_image" id="p_image<?php echo $rows['id'] ?>"

                                    value="<?php echo $rows['image'] ?>">

                                <input type="hidden" name="p_name" id="p_name<?php echo $rows['id'] ?>"

                                    value="<?php echo $rows['name'] ?>">

                                <input type="hidden" name="p_price" id="p_price<?php echo $rows['id'] ?>"

                                    value="<?php echo $rows['price'] ?>">

                                <input class="action-input" title="Quantity Number" type="hidden" name="quantity"

                                    id="p_qty<?php echo $rows['id']?>" value="1" />

                                <button class="product-add add_to_cart" title="Add to Cart" name="add_to_cart"

                                    id="<?php echo $rows['id'] ?>"><i

                                        class="fas fa-shopping-basket"></i><span>add</span></button>



                            </div>

                        </div>

                    </li>

                    <?php }

                    ?>



                </ul>

            </div>

        </div>

</section>