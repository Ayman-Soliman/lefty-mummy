<?php
include '../../config/dbcon.php';
if (isset($_POST['parent_cat_id'])) {
    // echo $_POST['parent_cat_id'];
    $parent_cat_id = $_POST['parent_cat_id'];
    // global $con;
    $get_sub_cat_qurey =  "SELECT * FROM sub_categories WHERE parent_cat_id = $parent_cat_id";
    $sub_categories = mysqli_query($con, $get_sub_cat_qurey);
    // if (mysqli_num_rows($sub_categories)>0) {
    ?>
    <option disabled selected hidden>Choose Sub-Category...</option>
    <?php
    while ($row = mysqli_fetch_array($sub_categories)) {
        # code...
        ?>
        <option value="<?=$row['id']?>" ><?=$row['sub_cat_name']?></option>;
        <?php
    }
    // }
}
if (isset($_POST['parent_cat_id'])&& isset($_POST['subCatId'])) {
    // echo $_POST['parent_cat_id'];
    $parent_cat_id = $_POST['parent_cat_id'];
    $sub_cat_id = $_POST['subCatId'];
    // global $con;
    $get_sub_cat_qurey =  "SELECT * FROM sub_categories WHERE parent_cat_id = $parent_cat_id";
    $sub_categories = mysqli_query($con, $get_sub_cat_qurey);
    // if (mysqli_num_rows($sub_categories)>0) {
    ?>
    <option disabled hidden>Choose Sub-Category...</option>
    <?php
    while ($row = mysqli_fetch_array($sub_categories)) {
        # code...
        ?>
        <option value="<?=$row['id']?>" <?=$row['id'] ==$sub_cat_id?'selected':'' ?>><?=$row['sub_cat_name']?></option>;
        <?php
    }
    // }
}