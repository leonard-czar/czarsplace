<?php
include_once "indexheader.php";
include_once "index_redirect.php";
?>

<?php
$homepage = "Dashboard";

$watchobj = new Customer();


$brandobj = new Customer();
$brands = $brandobj->getallbrands();


?>
<div class="row " style="justify-content:center;background-color: rgba(5, 12, 36, 0.7);z-index:-1">
  <div class="col-sm-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="img-fluid ">
            <img src="images/banner1.jpg" class="d-block w-100 opacity-50" alt="...">
          </div>
          <!--moved the text to the middle of an image or banner -->
          <div class="position-absolute top-50 start-50 translate-middle mb-5 " style="background-color:rgb(47,49,59,1);text-align:inherit;width:max-content;box-shadow:7px 5px 17px 10px black;">
            <span class="bannertxt">Your Haven For Luxury Wristwatches.</span>
            <br>
          </div>
        </div>
        <div class="carousel-item">
          <div class="img-fluid "><img src="images/ban.jpg" class="d-block w-100 opacity-50" alt="...">
          </div>
          <!--moved the text to the middle of an image or banner -->
          <div class="position-absolute top-50 start-50 translate-middle mb-5" style="background-color:rgb(251,208,121,1);width:max-content;border-radius:2%;box-shadow:7px 5px 17px 1px rgb(251,208,121,1);">
            <span class="bannertxt" style="color:rgb(0,0,0,0.9) ;">Quality with class crafted just for you.</span>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-sm-5 mb-sm-5 text-center">
  <h3>OUR COLLECTIONS</h3>
  <hr>


</div>
<div class="container-fluid-sm m-sm-3">
  <?php

  if (count($brands) > 0) {

    foreach ($brands as $key => $val) {
  ?><div class="row">
        <div class="col-sm mb-sm-5 mt-sm-1 text-center">
          <div style="margin-left:50px;position:relative; ">
            <img src="images/<?php echo $val['brand_image'] ?>" alt="" width="110" class="img-fluid">

          </div>
          <hr>
        </div>

      </div>


      <div class="row">

        <?php $watches = $watchobj->getallwatches($val['brand_id']);
        foreach ($watches as $key => $value) {
        ?>
          <div class="col-sm-3 mb-sm-5 ">
            <form action='index_watchspec.php' method='post' style="text-align: center;">
              <img src="images/<?php echo $value['watch_image'] ?>" alt="" class="img-fluid">

              <div style="text-align: center;font-size: 1vw;color:rgba(0, 5, 0,0.6);" class="mb-sm-2">
                <b><?php echo $value['watch_description']; ?></b>
              </div>
              <input type="submit" value="<?php echo $value['watch_Name']; ?>" class="btn btn-sm col-sm-10" style="background-color: #050C24;color:burlywood;font-size: 1.2vw;" name="btnsubmit">
              <br>
              <input type="hidden" value="<?php echo $val['brand_name']; ?>" name="brandname">
              <input type="hidden" value="<?php echo $value['watch_id']; ?>" name="productid">
              <input type="hidden" value="<?php echo $value['watch_price']; ?>" name="productprice">

              <input type="hidden" value="<?php echo $value['watch_image']; ?>" name="productimg">
              <input type="hidden" value="<?php echo $value['watch_description']; ?>" name="productdesc">
              <input type="hidden" value="<?php echo $value['collection']; ?>" name="Collection">
              <input type="hidden" value="<?php echo $value['reference_number']; ?>" name="Reference Number">
              <input type="hidden" value="<?php echo $value['gender']; ?>" name="Gender">
              <input type="hidden" value="<?php echo $value['movement']; ?>" name="Movement">
              <input type="hidden" value="<?php echo $value['dial']; ?>" name="Dial">
              <input type="hidden" value="<?php echo $value['Bezel']; ?>" name="Bezel">
              <input type="hidden" value="<?php echo $value['crystal']; ?>" name="Crystal">
              <input type="hidden" value="<?php echo $value['caliber']; ?>" name="Caliber">
              <input type="hidden" value="<?php echo $value['watch_function']; ?>" name="Watch function">
              <input type="hidden" value="<?php echo $value['mechanism']; ?>" name="Mechanism">
              <input type="hidden" value="<?php echo $value['number_of_jewels']; ?>" name="Number of Jewels">
              <input type="hidden" value="<?php echo $value['total_diameter']; ?>" name="Total Diameter">
              <input type="hidden" value="<?php echo $value['power_reserve']; ?>" name="Power Reserve">
              <input type="hidden" value="<?php echo $value['number_of_parts']; ?>" name="Number Of Parts">
              <input type="hidden" value="<?php echo $value['frequency']; ?>" name="Frequency">
              <input type="hidden" value="<?php echo $value['bracelet']; ?>" name="bracelet">
              <input type="hidden" value="<?php echo $value['clasp']; ?>" name="Clasp">
              <input type="hidden" value="<?php echo $value['water_resistance']; ?>" name="Water Resistance">

            </form>
          </div>

        <?php  } ?>

      </div>
  <?php

    }
  } ?>
</div>



<?php
include_once "indexfooter.php";
?>