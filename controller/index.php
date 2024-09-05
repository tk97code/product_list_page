<?php
    require('../model/database.php');
    require('../model/product_db.php');
    require('../model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == null) {
        $action = filter_input(INPUT_GET,'action');
        if ($action == null) {
            $action = 'list_products';
        }
    }

    if ($action == 'list_products') {
        $category_id = filter_input(INPUT_GET,'category_id', FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1;
        }
        $categories = get_categories();
        $category_name = get_category_name($category_id);
        $products = get_products_by_category($category_id);
        include('../view/product_list.php');
    } else if ($action == 'delete_product') { 
        $product_id = filter_input(INPUT_POST,'product_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST,'category_id', FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false ||
            $product_id == null || $product_id == false) {
            $error = "missing or incorrect product id or category id";
            include("../errors/error.php");
        } else {
            delete_product($product_id);
            header("Location: .?category_id=$category_id");
        }
    } else if ($action == 'show_add_form') {
        $categories = get_categories();
        include('../view/product_add.php');
    } else if ($action = 'add_product') {
        $category_id = filter_input(INPUT_POST,'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST,'code');
        $name = filter_input(INPUT_POST,'name');
        $price = filter_input(INPUT_POST,'price');
        if ($category_id == null || $category_id == false ||
            $code == null || $name == null || 
            $price == null || $price == false) {
            $error = "invalid product data. Try again.";
            include("../errors/error.php");
        } else {
            add_product($category_id, $code, $name, $price);
            header("Location: .?category_id=$category_id");
        }
    }
?>