<?php

// this is the function definition file. Define all functions including
// load html page, calculate total cost of shopping cart...

    require('../models/model.php');

    // maximum quantity of items in an order
    define('MAX_QUANT', 100);

    // enable sessions
    session_start();
	

    /**
     * load html page based on parameter.
     */
    function load_html($template, $data = [])
    {
        $path = __DIR__ . '/../views/' . $template . '.php';
        if (file_exists($path))
        {
            extract($data);
            require($path);
        }
    }

    /**
     * load menu.
     */
    function load_menu($title = '')
    {
        global $categories;

		// define url for each menu button
        foreach ($categories as $category)
        {
			$category->url = '/category/' . str_replace(' ', '-', $category->title);
        }

        load_html('menu', ['title' => $title, 'categories' => $categories]);
    }

    /**
     * Retrive a list of items in a spicific category.
     */
    function query_items($category)
    {
        global $xml;

        $items = $xml->xpath("/menu/category[title='$category']/item");
        return $items;
    }

    /**
     * load an error message.
     */
    function error_message($message)
    {
        load_html('header', ['title' => 'Error']);
        load_html('error_message', ['message' => $message]);
        load_html('footer');
        exit;
    }

    /**
     * calculate total order price.
     */
    function total()
    {
        // return early if no orders
        if (empty($_SESSION['orders']))
        {
            return;
        }

        $total = 0;

        foreach ($_SESSION['orders'] as $order)
        {
            // convert price to int to avoid float imprecision
            $price = $order['price'] * 100;

            // add order total price to total
            $total += $price * $order['quantity'];
        }

        return $total / 100;
    }

?>
