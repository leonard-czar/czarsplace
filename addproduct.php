<?php include_once "adminheader.php";
?>

<?php
$obj = new Admin;
$brands = $obj->getallbrands();


if (isset($_REQUEST['addproduct'])) {
    $filename = $_FILES['watchimage']['name'];
    $filesize = $_FILES['watchimage']['size'];
    $tmpname = $_FILES['watchimage']['tmp_name'];
    $error = $_FILES['watchimage']['error'];
    $filetype = $_FILES['watchimage']['type'];

    if ($error > 0) {
        echo "you have not uploaded any file or the file is corrupt";
        exit;
    }
    if ($filesize > 9097152) {
        echo "Profile photo cannot be more than 9mb";
        exit;
    }
    $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    $arrfilename = explode(".", $filename);

    $file_ext = end($arrfilename);

    $file_ext = strtolower($file_ext);

    if (!in_array($file_ext, $allowed_ext)) {
        echo "Oops, file not supported!";
        exit;
    }




    $pobj = new Admin;

    $product = $pobj->Insertproduct(

        $_REQUEST["watch_name"],
        $_REQUEST["watch_desc"],
        $_REQUEST["watch_price"],
        $_REQUEST["collection"],
        $_REQUEST["ref_no"],
        $_REQUEST["Case_desc"],
        $_REQUEST["gender"],
        $_REQUEST["movement"],
        $_REQUEST["dial"],
        $_REQUEST["bezel"],
        $_REQUEST["crystal"],
        $_REQUEST["caliber"],
        $_REQUEST["watch_function"],
        $_REQUEST["mechanism"],
        $_REQUEST["number_of_jewels"],
        $_REQUEST["total_diameter"],
        $_REQUEST["power_reserve"],
        $_REQUEST["number_of_parts"],
        $_REQUEST["frequency"],
        $_REQUEST["bracelet"],
        $_REQUEST["clasp"],
        $_REQUEST["water_resistance"],
        $_REQUEST["Brandid"],
        $file_ext,

    );
    if ($product == 'success') {
        $add = "Product added Successfully!";
        header("Location: allproducts.php?add=$add");
    }
}

?>
<div class="container">

    <div class="row text-center justify-content-center m-5">
        <h3>Add a Product</h3>
        <div class="col-sm-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="m-sm-3"><textarea name="watch_name" id="" placeholder="Watch Name" class="form-control" require><?php if (isset($_REQUEST['watch_name'])) {
                                                                                                                                echo $_REQUEST['watch_name'];
                                                                                                                            } ?></textarea> </div>
                <div class="m-sm-3"><textarea name="watch_desc" id="" placeholder="Watch Description" class="form-control"><?php if (isset($_REQUEST['watch_desc'])) {
                                                                                                                                echo $_REQUEST['watch_desc'];
                                                                                                                            } ?></textarea></div>
                <div class="m-sm-3"><input type="number" name="watch_price" value="<?php if (isset($_REQUEST['watch_price'])) {
                                                                                        echo $_REQUEST['watch_price'];
                                                                                    } ?>" placeholder="Watch price" class="form-control" required></div>
                <div class="m-sm-3"><input type="text" name="collection" value="<?php if (isset($_REQUEST['collection'])) {
                                                                                    echo $_REQUEST['collection'];
                                                                                } ?>" placeholder="Collection" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="ref_no" value="<?php if (isset($_REQUEST['ref_no'])) {
                                                                                echo $_REQUEST['ref_no'];
                                                                            } ?>" placeholder="Reference Number" class="form-control"></div>
                <div class="m-sm-3"><textarea name="Case_desc" id="" placeholder="Case Description" class="form-control"><?php if (isset($_REQUEST['Case_desc'])) {
                                                                                                                                echo $_REQUEST['Case_desc'];
                                                                                                                            } ?></textarea></div>
                <div class="m-sm-3">
                    <select name="gender" id="" class="form-control">
                        <option value="">Gender</option>
                        <?php if (isset($_REQUEST['gender'])) {
                            $gen = $_REQUEST['gender'];
                            echo "<option value='$gen' selected>$gen</option>";
                        } else {

                        ?>
                            <option value="Men">Men</option>
                            <option value="Ladies">Ladies</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-sm-3"><input type="text" name="movement" value="<?php if (isset($_REQUEST['movement'])) {
                                                                                    echo $_REQUEST['movement'];
                                                                                } ?>" placeholder="Movement" class="form-control"></div>
                <div class="m-sm-3"><textarea name="dial" id="" placeholder="Dial" class="form-control"><?php if (isset($_REQUEST['dial'])) {
                                                                                                            echo $_REQUEST['dial'];
                                                                                                        } ?></textarea></div>
                <div class="m-sm-3"><input type="text" name="bezel" value="<?php if (isset($_REQUEST['bezel'])) {
                                                                                echo $_REQUEST['bezel'];
                                                                            } ?>" placeholder="Bezel" class="form-control"></div>
                <div class="m-sm-3"><textarea name="crystal" id="" placeholder="Crystal" class="form-control"><?php if (isset($_REQUEST['crystal'])) {
                                                                                                                    echo $_REQUEST['crystal'];
                                                                                                                } ?></textarea></div>
                <div class="m-sm-3"><input type="text" name="caliber" value="<?php if (isset($_REQUEST['caliber'])) {
                                                                                    echo $_REQUEST['caliber'];
                                                                                } ?>" placeholder="Caliber" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="watch_function" value="<?php if (isset($_REQUEST['watch_function'])) {
                                                                                        echo $_REQUEST['watch_function'];
                                                                                    } ?>" placeholder="Watch Function" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="mechanism" value="<?php if (isset($_REQUEST['mechanism'])) {
                                                                                    echo $_REQUEST['mechanism'];
                                                                                } ?>" placeholder="Mechanism" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="number_of_jewels" value="<?php if (isset($_REQUEST['number_of_jewels'])) {
                                                                                            echo $_REQUEST['number_of_jewels'];
                                                                                        } ?>" placeholder="Number Of Jewels" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="total_diameter" value="<?php if (isset($_REQUEST['total_diameter'])) {
                                                                                        echo $_REQUEST['total_diameter'];
                                                                                    } ?>" placeholder="Total Diameter" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="power_reserve" value="<?php if (isset($_REQUEST['power_reserve'])) {
                                                                                        echo $_REQUEST['power_reserve'];
                                                                                    } ?>" placeholder="Power Reserve" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="number_of_parts" value="<?php if (isset($_REQUEST['number_of_parts'])) {
                                                                                            echo $_REQUEST['number_of_parts'];
                                                                                        } ?>" placeholder="Number Of Parts" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="frequency" value="<?php if (isset($_REQUEST['frequency'])) {
                                                                                    echo $_REQUEST['frequency'];
                                                                                } ?>" placeholder="Frequency" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="bracelet" value="<?php if (isset($_REQUEST['bracelet'])) {
                                                                                    echo $_REQUEST['bracelet'];
                                                                                } ?>" placeholder="Bracelet" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="clasp" value="<?php if (isset($_REQUEST['clasp'])) {
                                                                                echo $_REQUEST['clasp'];
                                                                            } ?>" placeholder="Clasp" class="form-control"></div>
                <div class="m-sm-3"><input type="text" name="water_resistance" value="<?php if (isset($_REQUEST['water_resistance'])) {
                                                                                            echo $_REQUEST['water_resistance'];
                                                                                        } ?>" placeholder="Water Resistance" class="form-control"></div>
                <div class="m-sm-3"><input type="file" name="watchimage" value="" placeholder="Watch Image" class="form-control" required></div>
                <div class="m-sm-3"><select name="Brandid" id="" class="form-control" required>
                        <option value="">Choose Brand</option>
                        <?php foreach ($brands as $key => $value) {
                            $brandid = $value['brand_id'];
                            $brandname = $value['brand_name'];
                            echo "<option value='$brandid'>$brandname</option>";
                        } ?>
                    </select></div>
                <div class="m-sm-3"><input type="submit" name="addproduct" id="" class="btn btn-primary form-control" value="Add Product"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once "adminfooter.php"; ?>