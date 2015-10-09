
<!-- size, quantity, submit -->

<form class="form-inline" action="/order.php" method="post" role="form">

<!-- pass information of category and item to $_POST, which will be used for order.php -->
  <input type="hidden" name="cat" value="<?= $_GET['para2'] ?>" />
  <input type="hidden" name="item" value="<?= $item->name ?>" />

  <?php if (isset($item->price[0]['size'])): ?> <!-- multiple size available -->
  
		<!--different size in drop-down box -->
      <select class="form-control form-font-style" name="size">
        <?php foreach ($item->price as $price): ?>
            <option value="<?= $price['size'] ?>"><?= $price['size'] ?></option>
        <?php endforeach ?>
      </select>

		<!-- pass information of price to $_POST, which will be used for order.php, for multiple size item-->
      <?php foreach ($item->price as $price): ?>
          <input type="hidden" name="<?= $price['size'] ?>" value="<?= $price ?>" />
      <?php endforeach ?>
      
  <!-- pass information of price to $_POST, which will be used for order.php, for single size item-->
  <?php else: ?>
      <input type="hidden" name="price" value="<?= $item->price ?>" />
  <?php endif ?>

  <input class="form-control form-font-style" type="number" name="quantity" value="1" min="1" max="<?= MAX_QUANT ?>" />
  <input class="form-control form-font-style" type="submit" value="Order">

</form>
