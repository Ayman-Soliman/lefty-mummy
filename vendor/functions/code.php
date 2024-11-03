<?php
include '../../config/dbcon.php';
include '../functions/myfunctions.php';
session_start();
if (isset($_POST['add-category-btn'])) {
    $cat_name = mysqli_real_escape_string($con,$_POST['cat_name']);
    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $cat_image = mysqli_real_escape_string($con,$_FILES['cat_image']['name']);

    $path = '../uploads/';

    $img_ext = pathinfo($cat_image, PATHINFO_EXTENSION);

    $img_name = time() . '.' . $img_ext;
    
    $cat_query = "INSERT INTO categories (cat_name, cat_image, discription, keywords, status)
    VALUES('$cat_name', '$img_name', '$discription', '$keywords', '$status')";

    $cat_query_run = mysqli_query($con, $cat_query);
    if ($cat_query_run) {
        move_uploaded_file($_FILES['cat_image']['tmp_name'], $path.$img_name);
        redirect('../add-category.php',"message_success", "Category Added Successfully");
    }else{
        redirect('../add-category.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-category-btn'])) {
    
    $cat_id = mysqli_real_escape_string($con,$_POST['cat_id']);
    $cat_name = mysqli_real_escape_string($con,$_POST['cat_name']);
    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $cat_image = mysqli_real_escape_string($con,$_FILES['cat_image']['name']);
    $cat_old_image = mysqli_real_escape_string($con,$_POST['old_image']);
    if ($cat_image != "") {
        
        $img_ext = pathinfo($cat_image
        , PATHINFO_EXTENSION);
        
        $update_image = time() . '.' . $img_ext;
    }else {
        $update_image = $cat_old_image;
    }
    
    $path = '../uploads/';
    $cat_update_query = "UPDATE categories SET cat_name='$cat_name', cat_image='$update_image', discription='$discription', keywords='$keywords', status='$status' WHERE id='$cat_id' ";
    

    $cat_query_run = mysqli_query($con, $cat_update_query);
    if ($cat_query_run) {
        if ($_FILES['cat_image']['name'] !="") {
            move_uploaded_file($_FILES['cat_image']['tmp_name'], $path.$update_image);
            if (file_exists('../uploads/'.$cat_old_image)) {
                unlink('../uploads/'.$cat_old_image);
            }
        }
        redirect('../edit-category.php?id='.$cat_id,"message_success", "Category Updated Successfully");
    }else{
        redirect('../edit-category.php?id='.$cat_id,"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['add-sub-category-btn'])) {
    $sub_cat_name = mysqli_real_escape_string($con,$_POST['sub_cat_name']);
    $parent_cat_id = mysqli_real_escape_string($con,$_POST['country_id']);
    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $sub_cat_image = mysqli_real_escape_string($con,$_FILES['sub_cat_image']['name']);

    $path = '../uploads/';

    $img_ext = pathinfo($sub_cat_image, PATHINFO_EXTENSION);

    $img_name = time() . '.' . $img_ext;
    
    $sub_cat_query = "INSERT INTO sub_categories (sub_cat_name,parent_cat_id, sub_cat_image, discription, keywords, status)
    VALUES('$sub_cat_name','$parent_cat_id', '$img_name', '$discription', '$keywords', '$status')";

    $sub_cat_query_run = mysqli_query($con, $sub_cat_query);
    if ($sub_cat_query_run) {
        move_uploaded_file($_FILES['sub_cat_image']['tmp_name'], $path.$img_name);
        redirect('../add-sub-category.php',"message_success", "Sub Category Added Successfully");
    }else{
        redirect('../add-sub-category.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-sub-category-btn'])) {

    $sub_cat_id = mysqli_real_escape_string($con,$_POST['sub_cat_id']);
    $sub_cat_name = mysqli_real_escape_string($con,$_POST['sub_cat_name']);
    $parent_cat_id = mysqli_real_escape_string($con,$_POST['parent_cat_id']);
    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $sub_cat_image = mysqli_real_escape_string($con,$_FILES['sub_cat_image']['name']);
    $sub_cat_old_image = mysqli_real_escape_string($con,$_POST['old_image']);
    if ($sub_cat_image != "") {
        
        $img_ext = pathinfo($sub_cat_image, PATHINFO_EXTENSION);
        
        $update_image = time() . '.' . $img_ext;
    }else {
        $update_image = $sub_cat_old_image;
    }
    $path = '../uploads/';

    $sub_cat_update_query = " UPDATE sub_categories SET parent_cat_id='$parent_cat_id', sub_cat_name='$sub_cat_name', sub_cat_image='$update_image', discription='$discription', keywords='$keywords', status='$status' WHERE id='$sub_cat_id' ";
    
    
    $sub_cat_query_run = mysqli_query($con, $sub_cat_update_query);
    if ($sub_cat_query_run) {
        if ($_FILES['sub_cat_image']['name'] !="") {
            move_uploaded_file($_FILES['sub_cat_image']['tmp_name'], $path.$update_image);
            if (file_exists('../uploads/'.$sub_cat_old_image)) {
                unlink('../uploads/'.$sub_cat_old_image);
            }
        }
        redirect('../edit-sub-category.php?id='.$sub_cat_id.'&parent_cat_id='.$parent_cat_id,"message_success", "Sub Category Updated Successfully");
    }else{
        redirect('../edit-sub-category.php?id='.$sub_cat_id.'&parent_cat_id='.$parent_cat_id,"message_error", "Something Went Wrong");
    }
}else if (isset($_POST['add-product-btn'])) {

    $seller_id = mysqli_real_escape_string($con,$_POST['seller_id']);
    $prod_name = mysqli_real_escape_string($con,$_POST['prod_name']);
    $prod_slug = mysqli_real_escape_string($con,str_replace(' ', '_',$_POST['prod_slug']));
    $parent_cat_id = mysqli_real_escape_string($con,$_POST['parent_cat_id']);
    $sub_cat_id = mysqli_real_escape_string($con,$_POST['sub_cat_id']);
    
    $thumb_image = mysqli_real_escape_string($con,$_FILES['thumb_image']['name']);
    $one_image = mysqli_real_escape_string($con,$_FILES['one_image']['name']);
    $two_image = mysqli_real_escape_string($con,$_FILES['two_image']['name']);
    $three_image = mysqli_real_escape_string($con,$_FILES['three_image']['name']);
    $four_image = mysqli_real_escape_string($con,$_FILES['four_image']['name']);

    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $original_price = mysqli_real_escape_string($con,$_POST['original_price']);
    $price_discount = mysqli_real_escape_string($con,$_POST['price_discount']);
    $price_after_discount = mysqli_real_escape_string($con,$_POST['price_after_discount']);
    $trending = mysqli_real_escape_string($con,isset($_POST['trending'])?'1':'0');
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');
    $prev_rate = mysqli_real_escape_string($con,$_POST['prev_rate']);
    
    $design_file = mysqli_real_escape_string($con,$_FILES['design_file']['name']);
    $design_path = '../designsFiles/';
    
    
    
    $design_ext = pathinfo($design_file, PATHINFO_EXTENSION);

    $design_name = time() . '.' . $design_ext;
    $prod_query = "INSERT INTO products (parent_cat_id, sub_cat_id, seller_id, prod_name, prod_slug, discription, keywords, original_price, price_discount, price_after_discount, status, prev_rate, trending, design_file)
    VALUES('$parent_cat_id','$sub_cat_id','$seller_id','$prod_name', '$prod_slug', '$discription', '$keywords','$original_price','$price_discount','$price_after_discount', '$status', '$prev_rate', '$trending','$design_name')";

    $prod_query_run = mysqli_query($con, $prod_query);
    if ($prod_query_run) {
        $prod_id = mysqli_insert_id($con);
        move_uploaded_file($_FILES['design_file']['tmp_name'], $design_path.$design_name);
        
        $design_imgs_path = '../designsImages/';
        $thumb_image_ext = pathinfo($thumb_image, PATHINFO_EXTENSION);
        $one_image_ext = $one_image ?  pathinfo($one_image, PATHINFO_EXTENSION):null;
        $two_image_ext = $two_image ?  pathinfo($two_image, PATHINFO_EXTENSION):null;
        $three_image_ext = $three_image ?  pathinfo($three_image, PATHINFO_EXTENSION):null;
        $four_image_ext = $four_image ?  pathinfo($four_image, PATHINFO_EXTENSION):null;
        
        // $thumb_image_ext = $thumb_image ?  pathinfo($thumb_image, PATHINFO_EXTENSION):'';
        // $one_image_ext = pathinfo($one_image, PATHINFO_EXTENSION);
        // $two_image_ext = pathinfo($two_image, PATHINFO_EXTENSION);
        // $three_image_ext = pathinfo($three_image, PATHINFO_EXTENSION);
        // $four_image_ext = pathinfo($four_image, PATHINFO_EXTENSION);

        $thumb_image_name = $thumb_image_ext ? time() . '_thumb.' . $thumb_image_ext: null;
        $one_imag_name = $one_image_ext ? time() . '_one.' . $one_image_ext: null;
        $two_image_name = $two_image_ext ? time() . '_two.' . $two_image_ext: null;
        $three_image_name = $three_image_ext ? time() . '_three.' . $three_image_ext: null;
        $four_image_name = $four_image_ext ? time() . '_four.' . $four_image_ext: null;

        // $one_imag_name = time() . '_one.' . $one_image_ext;
        // $two_image_name = time() . '_two.' . $two_image_ext;
        // $three_image_name = time() . '_three.' . $three_image_ext;
        // $four_image_name = time() . '_four.' . $four_image_ext;

        $prod_imgs_query = "INSERT INTO products_images (prod_id, thumb_image, img_one, img_two, img_three, img_four)
        VALUES('$prod_id','$thumb_image_name','$one_imag_name','$two_image_name','$three_image_name', '$four_image_name')";
        $prod_imgs_query_run = mysqli_query($con, $prod_imgs_query);
        if ($prod_imgs_query_run) {
            move_uploaded_file($_FILES['thumb_image']['tmp_name'], $design_imgs_path.$thumb_image_name);
            move_uploaded_file($_FILES['one_image']['tmp_name'], $design_imgs_path.$one_imag_name);
            move_uploaded_file($_FILES['two_image']['tmp_name'], $design_imgs_path.$two_image_name);
            move_uploaded_file($_FILES['three_image']['tmp_name'], $design_imgs_path.$three_image_name);
            move_uploaded_file($_FILES['four_image']['tmp_name'], $design_imgs_path.$four_image_name);
        }

        redirect('../add-product.php',"message_success", "Product Added Successfully");
    }else{
        redirect('../add-product.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-product-btn'])) {

    $seller_id = mysqli_real_escape_string($con,$_POST['seller_id']);
    $prod_id = mysqli_real_escape_string($con,$_POST['prod_id']);
    $prod_name = mysqli_real_escape_string($con,$_POST['prod_name']);
    $prod_slug = mysqli_real_escape_string($con,str_replace(' ', '_',$_POST['prod_slug']));
    $parent_cat_id = mysqli_real_escape_string($con,$_POST['parent_cat_id']);
    $sub_cat_id = mysqli_real_escape_string($con,$_POST['sub_cat_id']);
    
    $thumb_image = mysqli_real_escape_string($con,$_FILES['thumb_image']['name']);
    $old_thumb_image = mysqli_real_escape_string($con,$_POST['old_thumb_image']);
    $one_image = mysqli_real_escape_string($con,$_FILES['one_image']['name']);
    $old_one_image = mysqli_real_escape_string($con,$_POST['old_one_image']);
    $two_image = mysqli_real_escape_string($con,$_FILES['two_image']['name']);
    $old_two_image = mysqli_real_escape_string($con,$_POST['old_two_image']);
    $three_image = mysqli_real_escape_string($con,$_FILES['three_image']['name']);
    $old_three_image = mysqli_real_escape_string($con,$_POST['old_three_image']);
    $four_image = mysqli_real_escape_string($con,$_FILES['four_image']['name']);
    $old_four_image = mysqli_real_escape_string($con,$_POST['old_four_image']);

    $discription = mysqli_real_escape_string($con,$_POST['discription']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $original_price = mysqli_real_escape_string($con,$_POST['original_price']);
    $price_discount = mysqli_real_escape_string($con,$_POST['price_discount']);
    $price_after_discount = mysqli_real_escape_string($con,$_POST['price_after_discount']);
    $trending = mysqli_real_escape_string($con,isset($_POST['trending'])?'1':'0');
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');
    $prev_rate = mysqli_real_escape_string($con,$_POST['prev_rate']);

    
    $design_file = mysqli_real_escape_string($con,$_FILES['design_file']['name']);
    $old_design_file = mysqli_real_escape_string($con,$_POST['old_design_file']);
    
    $design_path = '../designsFiles/';
    
    if ($design_file!='') {
        # code...
        $design_ext = pathinfo($design_file, PATHINFO_EXTENSION);
        $design_name = time() . '.' . $design_ext;
    }else {
        $design_name = $old_design_file;
        # code...
    }

    // $prod_query = "INSERT INTO products (parent_cat_id, sub_cat_id, seller_id, prod_name, discription, keywords, original_price, price_discount, price_after_discount, status, design_file);
    // VALUES('$parent_cat_id','$sub_cat_id','$seller_id','$prod_name','$discription', '$keywords','$original_price','$price_discount','$price_after_discount', '$status', '$design_name')";
    $prod_query = " UPDATE products SET parent_cat_id='$parent_cat_id', sub_cat_id='$sub_cat_id', seller_id='$seller_id', prod_name='$prod_name', prod_slug='$prod_slug',discription='$discription', keywords='$keywords',original_price='$original_price',price_discount='$price_discount',price_after_discount='$price_after_discount', status='$status', prev_rate='$prev_rate', trending='$trending',design_file='$design_name' WHERE id='$prod_id' ";


    $prod_query_run = mysqli_query($con, $prod_query);
    if ($prod_query_run) {
        // $prod_id = mysqli_insert_id($con);
        // move_uploaded_file($_FILES['design_file']['tmp_name'], $design_path.$design_name);
        if ($_FILES['design_file']['name'] !="") {
            move_uploaded_file($_FILES['design_file']['tmp_name'], $design_path.$design_name);
            if (file_exists($design_path.$old_design_file)) {
                unlink($design_path.$old_design_file);
            }
        }
        
        $design_imgs_path = '../designsImages/';
        if ($thumb_image!='') {
            # code...
            $thumb_image_ext = pathinfo($thumb_image, PATHINFO_EXTENSION);
            $thumb_image_name = $thumb_image_ext ? time() . '_thumb.' . $thumb_image_ext: null;
        }else {
            $thumb_image_name = $old_thumb_image;
            # code...
        }
        if ($one_image!='') {
            # code...
            $one_image_ext = pathinfo($one_image, PATHINFO_EXTENSION);
            $one_image_name = $one_image_ext ? time() . '_one.' . $one_image_ext: null;
        }else {
            $one_image_name = $old_one_image;
            # code...
        }
        if ($two_image!='') {
            # code...
            $two_image_ext = pathinfo($two_image, PATHINFO_EXTENSION);
            $two_image_name = $two_image_ext ? time() . '_two.' . $two_image_ext: null;
        }else {
            $two_image_name = $old_two_image;
            # code...
        }
        if ($three_image!='') {
            # code...
            $three_image_ext = pathinfo($three_image, PATHINFO_EXTENSION);
            $three_image_name = $three_image_ext ? time() . '_three.' . $three_image_ext: null;
        }else {
            $three_image_name = $old_three_image;
            # code...
        }
        if ($four_image!='') {
            # code...
            $four_image_ext = pathinfo($four_image, PATHINFO_EXTENSION);
            $four_image_name = $four_image_ext ? time() . '_four.' . $four_image_ext: null;
        }else {
            $four_image_name = $old_four_image;
            # code...
        }
        // $thumb_image_ext = pathinfo($thumb_image, PATHINFO_EXTENSION);
        // $one_image_ext = $one_image ?  pathinfo($one_image, PATHINFO_EXTENSION):null;
        // $two_image_ext = $two_image ?  pathinfo($two_image, PATHINFO_EXTENSION):null;
        // $three_image_ext = $three_image ?  pathinfo($three_image, PATHINFO_EXTENSION):null;
        // $four_image_ext = $four_image ?  pathinfo($four_image, PATHINFO_EXTENSION):null;
        
        // $thumb_image_ext = $thumb_image ?  pathinfo($thumb_image, PATHINFO_EXTENSION):'';
        // $one_image_ext = pathinfo($one_image, PATHINFO_EXTENSION);
        // $two_image_ext = pathinfo($two_image, PATHINFO_EXTENSION);
        // $three_image_ext = pathinfo($three_image, PATHINFO_EXTENSION);
        // $four_image_ext = pathinfo($four_image, PATHINFO_EXTENSION);

        // $thumb_image_name = $thumb_image_ext ? time() . '_thumb.' . $thumb_image_ext: null;
        // $one_imag_name = $one_image_ext ? time() . '_one.' . $one_image_ext: null;
        // $two_image_name = $two_image_ext ? time() . '_two.' . $two_image_ext: null;
        // $three_image_name = $three_image_ext ? time() . '_three.' . $three_image_ext: null;
        // $four_image_name = $four_image_ext ? time() . '_four.' . $four_image_ext: null;

        // $one_imag_name = time() . '_one.' . $one_image_ext;
        // $two_image_name = time() . '_two.' . $two_image_ext;
        // $three_image_name = time() . '_three.' . $three_image_ext;
        // $four_image_name = time() . '_four.' . $four_image_ext;

        // $prod_imgs_query = "INSERT INTO products_images (prod_id, thumb_image, img_one, img_two, img_three, img_four)
        // VALUES('$prod_id','$thumb_image_name','$one_imag_name','$two_image_name','$three_image_name', '$four_image_name')";
        $prod_imgs_query = " UPDATE products_images SET  thumb_image='$thumb_image_name', img_one='$one_image_name', img_two='$two_image_name',img_three='$three_image_name', img_four='$four_image_name' WHERE prod_id='$prod_id' ";

        $prod_imgs_query_run = mysqli_query($con, $prod_imgs_query);
        if ($prod_imgs_query_run) {
            if ($_FILES['thumb_image']['name'] !="") {
                move_uploaded_file($_FILES['thumb_image']['tmp_name'], $design_imgs_path.$thumb_image_name);
                if (file_exists($design_imgs_path.$old_thumb_image)) {
                    unlink($design_imgs_path.$old_thumb_image);
                }
            }
            if ($_FILES['one_image']['name'] !="") {
                move_uploaded_file($_FILES['one_image']['tmp_name'], $design_imgs_path.$one_image_name);
                if (file_exists($design_imgs_path.$old_one_image)) {
                    unlink($design_imgs_path.$old_one_image);
                }
            }
            if ($_FILES['two_image']['name'] !="") {
                move_uploaded_file($_FILES['two_image']['tmp_name'], $design_imgs_path.$two_image_name);
                if (file_exists($design_imgs_path.$old_two_image)) {
                    unlink($design_imgs_path.$old_two_image);
                }
            }
            if ($_FILES['three_image']['name'] !="") {
                move_uploaded_file($_FILES['three_image']['tmp_name'], $design_imgs_path.$three_image_name);
                if (file_exists($design_imgs_path.$old_three_image)) {
                    unlink($design_imgs_path.$old_three_image);
                }
            }
            if ($_FILES['four_image']['name'] !="") {
                move_uploaded_file($_FILES['four_image']['tmp_name'], $design_imgs_path.$four_image_name);
                if (file_exists($design_imgs_path.$old_four_image)) {
                    unlink($design_imgs_path.$old_four_image);
                }
            }
            // move_uploaded_file($_FILES['thumb_image']['tmp_name'], $design_imgs_path.$thumb_image_name);
            // move_uploaded_file($_FILES['one_image']['tmp_name'], $design_imgs_path.$one_imag_name);
            // move_uploaded_file($_FILES['two_image']['tmp_name'], $design_imgs_path.$two_image_name);
            // move_uploaded_file($_FILES['three_image']['tmp_name'], $design_imgs_path.$three_image_name);
            // move_uploaded_file($_FILES['four_image']['tmp_name'], $design_imgs_path.$four_image_name);
        }

        redirect('../edit-product.php?id='.$prod_id,"message_success", "Product Edited Successfully");
    }else{
        redirect('../edit-product.php?id='.$prod_id,"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['delete-product-btn'])) {

    $seller_id = $_SESSION['auth_user']['id'];
    $prod_id = mysqli_real_escape_string($con,$_POST['prod_id']);
    $design_file_query = "SELECT * FROM products WHERE id='$prod_id'";
    $design_file_query_run = mysqli_query($con, $design_file_query);
    $prod_data = mysqli_fetch_array($design_file_query_run);
    $design_file = $prod_data['design_file'];
    $design_path = '../designsFiles/';
    $design_imgs_path = '../designsImages/';

    $prod_query = " DELETE FROM products WHERE id='$prod_id'";
    $prod_query_run = mysqli_query($con, $prod_query);
    if ($prod_query_run) {
        if (file_exists($design_path.$design_file)) {
        unlink($design_path.$design_file);
        }

        $images_query = "SELECT * FROM products_images WHERE id='$prod_id'";
        $images_query_run = mysqli_query($con, $images_query);
        $images_data = mysqli_fetch_array($images_query_run);
        $thumb_image = $images_data['thumb_image'];
        $img_one = $images_data['img_one'];
        $img_two = $images_data['img_two'];
        $img_three = $images_data['img_three'];
        $img_four = $images_data['img_four'];

        $prod_imgs_query = " DELETE FROM products_images WHERE prod_id='$prod_id' ";

        $prod_imgs_query_run = mysqli_query($con, $prod_imgs_query);
        if ($prod_imgs_query_run) {
            if (file_exists($design_imgs_path.$thumb_image)) {
                unlink($design_imgs_path.$thumb_image);
                }
            if (file_exists($design_imgs_path.$img_one)) {
                unlink($design_imgs_path.$img_one);
                }
            if (file_exists($design_imgs_path.$img_two)) {
                unlink($design_imgs_path.$img_two);
                }
            if (file_exists($design_imgs_path.$img_three)) {
                unlink($design_imgs_path.$img_three);
                }
            if (file_exists($design_imgs_path.$img_four)) {
                unlink($design_imgs_path.$img_four);
                }
        }
        // redirect('../my-products.php',"message_success", "Product deleted Successfully");
        echo 200;
    }else{
        // redirect('../my-products.php',"message_error", "Something Went Wrong");
        echo 500;
    }
}else if (isset($_POST['add-post-btn'])) {
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $sammary = mysqli_real_escape_string($con,$_POST['sammary']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $post_cover = mysqli_real_escape_string($con,$_FILES['post_cover']['name']);

    $path = '../uploads/posts/';

    $img_ext = pathinfo($post_cover, PATHINFO_EXTENSION);

    $img_name = time() . '.' . $img_ext;
    
    $post_query = "INSERT INTO posts (title, post_slug, post_sammary, content, post_cover, keywords, status)
    VALUES('$title', '$slug', '$sammary', '$content', '$img_name', '$keywords', '$status')";

    $post_query_run = mysqli_query($con, $post_query);
    if ($post_query_run) {
        move_uploaded_file($_FILES['post_cover']['tmp_name'], $path.$img_name);
        redirect('../add-post.php',"message_success", "Post Added Successfully");
    }else{
        redirect('../add-post.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-post-btn'])) {
    
    $post_id = mysqli_real_escape_string($con,$_POST['post_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $sammary = mysqli_real_escape_string($con,$_POST['sammary']);
    $content = mysqli_real_escape_string($con,$_POST['content']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    $post_cover = mysqli_real_escape_string($con,$_FILES['post_cover']['name']);

    $post_old_image = mysqli_real_escape_string($con,$_POST['old_image']);

    
    
    
    if ($post_cover != "") {
        
        $img_ext = pathinfo($post_cover, PATHINFO_EXTENSION);
        
        $update_image = time() . '.' . $img_ext;
    }else {
        $update_image = $post_old_image;
    }
    
    $path = '../uploads/posts/';
    $post_update_query = "UPDATE posts SET title='$title', post_slug='$slug', post_sammary='$sammary', content='$content', post_cover='$update_image', keywords='$keywords', status='$status' WHERE id='$post_id' ";
    

    $post_query_run = mysqli_query($con, $post_update_query);
    if ($post_query_run) {
        if ($_FILES['post_cover']['name'] !="") {
            move_uploaded_file($_FILES['post_cover']['tmp_name'], $path.$update_image);
            if (file_exists('../uploads/posts/'.$post_old_image)) {
                unlink('../uploads/posts/'.$post_old_image);
            }
        }
        redirect('../edit-post.php?id='.$post_id,"message_success", "Post Updated Successfully");
    }else{
        redirect('../edit-post.php?id='.$post_id,"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['delete-post-btn'])) {

    // $seller_id = $_SESSION['auth_user']['id'];
    $post_id = mysqli_real_escape_string($con,$_POST['post_id']);
    $post_cover = mysqli_real_escape_string($con,$_POST['post_cover']);
    
    $post_imgs_path = '../uploads/posts/';

    $post_query = " DELETE FROM posts WHERE id='$post_id'";
    $post_query_run = mysqli_query($con, $post_query);
    if ($post_query_run) {
        
        if ($post_cover != "default.png") {
            if (file_exists($post_imgs_path.$post_cover)) {
                unlink($design_path.$design_file);
            }
        }

        // redirect('../my-products.php',"message_success", "Product deleted Successfully");
        echo 200;
    }else{
        // redirect('../my-products.php',"message_error", "Something Went Wrong");
        echo 500;
    }
}else if (isset($_POST['add-store-btn'])) {
    $country_name = mysqli_real_escape_string($con,$_POST['country_name']);
    $country_abbr = mysqli_real_escape_string($con,$_POST['country_abbr']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    // $flag_img = mysqli_real_escape_string($con,$_FILES['flag_img']['name']);

    // if ($flag_img !="") {
    //     # code...
    //     $path = '../uploads/';
        
    //     $img_ext = pathinfo($flag_img, PATHINFO_EXTENSION);
        
    //     $img_name = time() . '.' . $img_ext;
    // }else {
    //     $img_name="default.png";
    // }
    
    $store_query = "INSERT INTO stores (name, abbr, status)
    VALUES('$country_name', '$country_abbr', '$status')";

    $store_query_run = mysqli_query($con, $store_query);
    if ($store_query_run) {
        // move_uploaded_file($_FILES['flag_img']['tmp_name'], $path.$img_name);
        redirect('../add-amazon-store.php',"message_success", "Store Added Successfully");
    }else{
        redirect('../add-amazon-store.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-store-btn'])) {

    $store_id = mysqli_real_escape_string($con,$_POST['store_id']);
    $country_name = mysqli_real_escape_string($con,$_POST['country_name']);
    $country_abbr = mysqli_real_escape_string($con,$_POST['country_abbr']);
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');

    // $flag_img = mysqli_real_escape_string($con,$_FILES['flag_img']['name']);

    // if ($flag_img !="") {
    //     # code...
    //     $path = '../uploads/';
        
    //     $img_ext = pathinfo($flag_img, PATHINFO_EXTENSION);
        
    //     $img_name = time() . '.' . $img_ext;
    // }else {
    //     $img_name="default.png";
    // }
    
    // $store_query = "INSERT INTO stores (name, abbr, status)
    // VALUES('$country_name', '$country_abbr', '$status')";
    $store_query = "UPDATE stores SET name='$country_name', abbr='$country_abbr', status='$status' WHERE id='$store_id'";

    

    $store_query_run = mysqli_query($con, $store_query);
    if ($store_query_run) {
        // move_uploaded_file($_FILES['flag_img']['tmp_name'], $path.$img_name);
        redirect('../all-stores.php',"message_success", "Store Added Successfully");
    }else{
        redirect('../all-stores.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['add-apparel-btn'])) {

    $seller_id = mysqli_real_escape_string($con,$_POST['seller_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $store_id = mysqli_real_escape_string($con,$_POST['store_id']);
    
    $thumb_img = mysqli_real_escape_string($con,$_FILES['thumb_img']['name']);
    $path = '../uploads/apparel/';
        
        $img_ext = pathinfo($thumb_img, PATHINFO_EXTENSION);
        
        $img_name = time() . '.' . $img_ext;

    $description = mysqli_real_escape_string($con,$_POST['description']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $url = mysqli_real_escape_string($con,$_POST['url']);

    $trending = mysqli_real_escape_string($con,isset($_POST['trending'])?'1':'0');
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');
    
    
    $apparel_query = "INSERT INTO apparel (store_id, title, slug, description, thumb_img, keywords, price, url, trending, status)
    VALUES('$store_id', '$title', '$slug', '$description', '$img_name', '$keywords','$price','$url', '$trending', '$status')";

    $apparel_query_run = mysqli_query($con, $apparel_query);
    if ($apparel_query_run) {
        
        
            move_uploaded_file($_FILES['thumb_img']['tmp_name'], $path.$img_name);

        redirect('../add-apparel.php',"message_success", "Apparel Added Successfully");
    }else{
        redirect('../add-apparel.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-apparel-btn'])) {

    $seller_id = mysqli_real_escape_string($con,$_POST['seller_id']);
    $shirt_id = mysqli_real_escape_string($con,$_POST['shirt_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $store_id = mysqli_real_escape_string($con,$_POST['store_id']);
    
    $thumb_img = mysqli_real_escape_string($con,$_FILES['post_cover']['name']);

    $shirt_old_image = mysqli_real_escape_string($con,$_POST['old_image']);

    
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $keywords = mysqli_real_escape_string($con,$_POST['keywords']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $url = mysqli_real_escape_string($con,$_POST['url']);

    $trending = mysqli_real_escape_string($con,isset($_POST['trending'])?'1':'0');
    $status = mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0');
    
    if ($thumb_img != "") {
        
        $img_ext = pathinfo($thumb_img, PATHINFO_EXTENSION);
        
        $update_image = time() . '.' . $img_ext;
    }else {
        $update_image = $shirt_old_image;
    }
    $path = '../uploads/apparel/';
    echo $update_image;
    // $apparel_query = "INSERT INTO apparel (store_id, title, slug, description, thumb_img, keywords, price, url, trending, status)
    // VALUES('$store_id', '$title', '$slug', '$description', '$img_name', '$keywords','$price','$url', '$trending', '$status')";
    $apparel_query = "UPDATE apparel SET store_id='$store_id', title='$title', slug='$slug', description='$description', thumb_img='$update_image', keywords='$keywords', price='$price',url='$url',trending='$trending', status='$status' WHERE id='$shirt_id'";

    $apparel_query_run = mysqli_query($con, $apparel_query);

    if ($apparel_query_run) {
        if ($_FILES['post_cover']['name'] !="") {
            move_uploaded_file($_FILES['post_cover']['tmp_name'], $path.$update_image);
            if (file_exists('../uploads/apparel/'.$shirt_old_image)) {
                unlink('../uploads/apparel/'.$shirt_old_image);
            }
        }
        
        redirect('../all-apparel.php',"message_success", "Apparel Added Successfully");
    }else{
        redirect('../all-apparel.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['add-media-btn'])) {
    // var_dump($_FILES['media']);
    if (isset($_FILES['media'])) {
        $path = '../uploads/media-library/';
        $files =$_FILES['media'];
        // var_dump($files['name']);
        $count = count($files['name']);
        // echo $count;
        for ($i=0; $i < $count; $i++) { 
             $media_ext = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
             $orginal_name = mysqli_real_escape_string($con,$files['name'][$i]);
             $media_name = time() . '_lm_' . $i . '.' . $media_ext;

             $media_query = "INSERT INTO media (name, orginal_name) VALUES('$media_name', '$orginal_name')";

             $media_query_run = mysqli_query($con, $media_query);
            if ($media_query_run) {
                move_uploaded_file($_FILES['media']['tmp_name'][$i], $path.$media_name);
            }else{
                redirect('../all-media.php',"message_error", "Something Went Wrong");
            }
        }
        redirect('../all-media.php',"message_success", "Media Added Successfully");
    }else {
        redirect('../all-media.php',"message_error", "Something Went Wrong");
    }
}else if (isset($_POST['add-promo-code-btn'])) {

    $promo_code = mysqli_real_escape_string($con,$_POST['promo_code']);
    $discount = mysqli_real_escape_string($con,$_POST['discount']);
    $working_days = mysqli_real_escape_string($con,$_POST['working_days']);
    
    $promo_query = "INSERT INTO promo_codes ( promo_code, discount, working_days)
    VALUES('$promo_code','$discount','$working_days')";

    $promo_query_run = mysqli_query($con, $promo_query);
    if ($promo_query_run) {

        redirect('../all-promo-codes.php',"message_success", "Promo Code Added Successfully");
    }else{
        redirect('../all-promo-codes.php',"message_error", "Something Went Wrong");

    }
}else if (isset($_POST['edit-promo-code-btn'])) {

    $promo_id = mysqli_real_escape_string($con,$_POST['promo_id']);
    $promo_code = mysqli_real_escape_string($con,$_POST['promo_code']);
    $discount = mysqli_real_escape_string($con,$_POST['discount']);
    $working_days = mysqli_real_escape_string($con,$_POST['working_days']);

    $promo_query = "UPDATE promo_codes SET promo_code='$promo_code', discount='$discount',working_days='$working_days' WHERE id='$promo_id'";

    $promo_query_run = mysqli_query($con, $promo_query);
    if ($promo_query_run) {

        redirect('../all-promo-codes.php',"message_success", "Promo Code Added Successfully");
    }else{
        redirect('../all-promo-codes.php',"message_error", "Something Went Wrong");

    }
}