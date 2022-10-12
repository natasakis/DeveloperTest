<?php
session_start();
// PAGE TITLE
$page = "all-products-page";
if (!empty($_GET['page'])) {
     $pagPage = $_GET['page'];
 } else {
     $pagPage = 1;
 }

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

try {
    // GET PRODUCTS
    $products = Product::getAllProducts();

    // TERM AND SORT
    $term = "";
    $sort = "";
    $perpage = "";
    $categ = "";

    if (!empty($_GET['term'])) {
        $term = $_GET['term'];
    }
    if (!empty($_GET['sort'])) {
        $sort = $_GET['sort'];
    }
    if (!empty($_GET['categ'])) {
        $categ = $_GET['categ'];
    }
    if ($sort != "") {
        $products = Product::sortProductBy($sort, $products);
    }
    if ($term != "") {
        $products = Product::filteredProducts($term);
    }
    if ($categ != "") {
        $products = Product::getCategoryProducts($categ,$products);
    }
        
    if ((!empty($_GET['select'])) && $_GET['select']!=count($products) ){
        $select = $_GET['select'];
        $_SESSION['select']=$select;
        $total_items = count($products);
        $total_pages = ceil($total_items/intval($_SESSION['select']));
        $offset = intval(($pagPage-1)*(intval($_SESSION['select'])));
        //var_dump($offset);
        //var_dump(intval($_SESSION['select']));
        $products = array_slice($products,$offset,intval($_SESSION['select']));
    }    else {
            $select=count($products);
            $total_pages=1;
        }


    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']));
        $shoppingCart->updateSession();
    }


} catch (\Throwable $th) {
    header("Location: ./");
}




// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-products.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
