<?php
session_start();
if(!empty($_SESSION['cart']))
{
    if(!empty($_POST['remove']))
    {
        foreach ($_POST['remove'] as $productId)
        {
            foreach($_SESSION['cart'] as $key=>$item)
            {
                if($item==$productId)
                {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
}
header("Location:./shoppingcart.php");