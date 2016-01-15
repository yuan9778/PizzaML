<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (isset($title)): ?>
        <title>Three Aces | <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Three Aces</title>
    <?php endif ?>
  
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/jpg" href="../img_and_icon/3aces.jpg">
  </head>
  
  <body>
    <!--for banner -->
    <div class="container">
	<dir class="row">
	    <div class="well well-sm">
                <img src="../img_and_icon/3aces.jpg" class="img-rounded" alt="three aces" width="50" height="50">
		    <a href="/" style="font-size: 30px; color:#CC6699; vertical-align: middle"><strong>&nbspThree Aces</strong></a>
		    <a href="/shopping_cart.php" style="float: right">
			<span class="glyphicon glyphicon-size glyphicon-shopping-cart"></span>
			<span style="font-size: 28px; color: black"><strong>&nbsp$<?= number_format(total(), 2) ?></strong></span>
	           </a>
	    </div> 
	</dir>
    </dir>
	
  <!--render menu -->
  <?php (isset($title)) ? load_menu($title) : load_menu() ?>
