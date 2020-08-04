<?php

namespace Cart;


class Cart {

    /*
        * Initialization of the cart.
    */
    function __construct() {
        // start of the session so we can grab the cart OR create a new session.
        session_start();
        
        // if there is no session cart, we create a SESSION with the name of 'cart' and set it as an array (so we can make an associative array).
        if (!isset($_SESSION['cart'])) {

            $_SESSION['cart'] = [];
        
        } else {
            $cart = $_SESSION['cart'];
        }
    }

    /*
        * Add a new item to the cart.
    */
    public function addItemToCart($itemId, $amount  = null) {

        /* 
            We go through all the items within the associative array and check if the given itemId is found.
            If we do find a value, we increment the amount by 1.

            nthPositionInAssociativeArray = The associative array position.
            cartItem = The associative array's, array. This is an array.
        */
        foreach ($_SESSION['cart'] as $nthPositionInAssociativeArray => $cartItem) {
    

            if($cartItem["itemId"] == $itemId) { 

                if ($amount == null) { // no amount given, we increment it by one

                    $_SESSION['cart'][$nthPositionInAssociativeArray]['amount'] =  $_SESSION['cart'][$nthPositionInAssociativeArray]['amount'] + 1;
                } else { // amount was given, we replace the given amount with the amount given.
                    
                    $_SESSION['cart'][$nthPositionInAssociativeArray]['amount'] =  $amount;
                }        

                return;
            }
        }    
    
        // if the item was not already in it, we create a new one.
        $itemId = $_POST['itemId'];
        
        array_push($_SESSION['cart'], ["itemId" => (int)$itemId, "amount" => 1]);
    
    }

    public function grabAllItems() {

        return $_SESSION["cart"];
    }


    public function grabItem($itemId) {
        
        foreach ($_SESSION['cart'] as $nthPositionInAssociativeArray => $cartItem) {
    
            if($cartItem["itemId"] == $itemId) { 

                return $_SESSION['cart'][$nthPositionInAssociativeArray];
            }
        }    
    }


    public function reset() {

        unset($_SESSION["cart"]);
    }


    public function removeItem($itemId) {


        foreach ($_SESSION['cart'] as $nthPositionInAssociativeArray => $cartItem) {
    
            if($cartItem["itemId"] == $itemId) { 

               
                unset($_SESSION['cart'][$nthPositionInAssociativeArray]);
            }
        }    
    }
}


