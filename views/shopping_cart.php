        <div class="col-md-9 order-format table-responsive">

	        <h2>Shopping Cart</h2>
	        <br>

	        <form class="form-inline" method="post" action="/shopping_cart.php" role="form">
	            <table class="table form-font-style">
		            <thead>
		                <tr>
			                <th>Category</th>
			                <th>Item</th>
			                <th>Size</th>
			                <th>Quantity</th>
			                <th>Price</th>
			                <th>Remove</th>
		                </tr>
		            </thead>

		            <tbody>  
		                <?php foreach ($_SESSION['orders'] as $id => $order): ?>
			                <tr>
				                <td><?= str_replace('-', ' ', $order['cat']) ?></td>
				                <td><?= $order['item'] ?></td>
				                <td><?= (isset($order['size'])) ? $order['size'] : '' ?></td>
				                <td><input class="form-control" type="number" name="<?= $id ?>_qty" value="<?= $order['quantity'] ?>" min="1" max="<?= MAX_QUANT ?>"></td>
				                <td ><?= number_format($order['price'] * $order['quantity'], 2) ?></td>
				                <td><input type="checkbox" name="remove[]" value="<?= $id ?>"></td>
			                </tr>
		                <?php endforeach ?>

		                <tr>
			                <td colspan="4">TOTAL</td>
			                <td><strong>$<?= number_format(total(), 2) ?></strong></td>
			                <td></td>
		                </tr>		  
		            </tbody>
	            </table>	  
	            <br>

		        <input class="form-control form-font-style" type="submit" name="update" value="Update Cart">
	        </form>	
	        <br>
	        <br>	

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="sample@sample.com">
	            <input type="hidden" name="item_name" value="Three Aces Pizza Store Order:">
	            <input type="hidden" name="amount" value="<?= number_format(total(), 2) ?>">
	            <input type="hidden" name="currency_code" value="USD">
	            <input type="hidden" name="bn" value="IC_Sample">
	            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	        </form>
        </div> <!--col-md-9-->
    </div> <!--row-->
</div> <!--container-->
