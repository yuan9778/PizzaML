<?php

    // this is another controller file for updating shopping card (change quantity, removing orders)
    require('../functions/functions.php');
    require('../models/model.php');

    // if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if some remove checkboxes were checked
        if (!empty($_POST['remove'])) {
            // search through orders
            foreach ($_SESSION['orders'] as $id => $order) {
                if (in_array($id, $_POST['remove'])) {
                    // remove order
                    unset($_SESSION['orders'][$id]);
                }
            }
        }

        // quantities inputs
        foreach ($_POST as $key => $quantity) {
            // except remove checkboxes, update or submits
            if ($key != 'remove' && $key != 'checkout' && $key != 'update') 
                // validate submission
                if (empty($_POST[$key])) {
                    error_message('please specify a quantity');
                }
                // quantity must be a positive integer
                else if (!preg_match('/^\d+$/', $quantity)) {
                    error_message('quantity must be a positive integer');
                }
                // validate quantity range
                else if ($quantity < 1 || $quantity > MAX_QUANT) {
                    error_message('quantity must be between 1 and ' . MAX_QUANT);
                }
            }

            // retrieve order id in input name
            $id = str_replace('_qty', '', $key);

            // compare orders ids
            if (array_key_exists($id, $_SESSION['orders'])) 
                // update quantity
                $_SESSION['orders'][$id]['quantity'] = $quantity;
            }
        }
    }

    // render page
    load_html('header', ['title' => 'Shopping Cart']);

    if (empty($_SESSION['orders'])) {
        // if cart is empty
        load_html('empty_cart');
    }
    else {
        load_html('shopping_cart');
    }

    load_html('footer');

?>
