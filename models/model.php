<?php

    // load menu.xml
    $xml = simplexml_load_file('../models/three_aces_menu.xml');

    // select each categories elements
    $categories = $xml->category;

?>
