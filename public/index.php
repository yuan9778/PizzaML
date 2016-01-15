<?php
	// load functions
    require('../functions/functions.php');

	// this is the main controller that handle the request from URL
    if (isset($_GET['para1'])) {
        $cat   = $_GET['para2'];
        $cat   = str_replace('-', ' ', $cat);
        $items = query_items($cat);

        load_html('header', ['title' => $cat]);
        load_html('category', ['items' => $items]);
        load_html('footer');
    }
    else {
        load_html('header');
        load_html('index');
        load_html('footer');
    }
?>
