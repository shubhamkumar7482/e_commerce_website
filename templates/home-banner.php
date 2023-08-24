<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $banner = "SELECT * FROM banner WHERE status =1";
        // $stmt = $con->prepare($banner);
        $stmt = mysqli_query($con, $banner);
        // $stmt->execute();
        // $row = $stmt->fetchAll();
        // for active coding------------
        $i = 1;
        foreach ($row as $ban) { 
          if ($i > 1) {
            $img = "";
          } else {
            $img = "active";
          }
        ?>
        <div class="carousel-item <?php echo $img; ?>">
            <a href="<?php echo $ban['banner_link'] ?>">
              <img src="banner-images/<?php echo $ban['image'] ?>" class="d-block w-100" alt="...">
              </a>
        </div>
          <?php $i++;
        } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>