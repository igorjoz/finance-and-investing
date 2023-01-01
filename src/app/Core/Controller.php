<?php

function products(&$model)
{
    // $cat = $_GET['cat'];
    // $products = get_products_by_category($cat);
    // $model['products'] = $products;
    return 'products_view';
}

function edit(&$model)
{
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // if (!empty($_POST['name']) /* && ...*/) {
    //     $id = isset($_POST['id']) ? 
    //         $_POST['id'] : null;
    //     $product = [
    //         'name' => $_POST['name'],
    //         'price' => (int) $_POST['price'],
    //         'description' => $_POST['description']
    //     ];
    // if (save_product($id, $product)) {
    //     return 'redirect:products';
    // }
    // }
    // }
    // elseif (!empty($_GET['id'])) {
    //     $product = get_product($_GET['id']);
    // }

    //$model['product'] = $product;
    return 'edit_view';
}

// function home_index(&$model)
// {
//     return 'home_view';
// }