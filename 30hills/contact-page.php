<?php
session_start();
//if(empty($_SESSION['user'])) {
//    header("Location: ./all-products-page.php");
//}

$page = 'contact-page';

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";

// USING MODELS
//use Models\Product\User;

//try {
//    $user = new User($_SESSION['user']);
//    $logeduser = $user->getUser();
//} catch (\Throwable $th) {
//    header("Location: ./");
//}
$systemErrors = [];
$name="";
$email="";
$subject="";
$message="";
try {
    if(!empty($_POST['send']) && $_POST['send']== "yes") {
        // NAME
        $name = (string) $_POST['name'];
        $name = trim($name);
        if(empty($name)) {
            $systemErrors['name'] = "Field name is required!";
        }
        // EMAIL
        $email = (string) $_POST['email'];
        $email = trim($email);
        if(empty($email)) {
            $systemErrors['email'] = "Field email is required!";
        }
        $subject = (string) $_POST['subject'];
        if(empty($subject)) {
            $systemErrors['subject'] = "Field subject is required!";
        }
        $message = (string) $_POST['message'];
        if(empty($message)) {
            $systemErrors['message'] = "Field message is required!";
        }
        if(empty($systemErrors)) {
            mail($email,$subject,$message);
             header('Location: ./thank-you-page2.php');
        }
    }
} catch (\Throwable $th) {
    $_SESSION['cart'] = [];
    header("Location: ./");
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-contact.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";