

	<div class="row items">
	    <!-- picture -->
	    <div class="col-md-2">
	        <img class="img-rounded" src="/img_and_icon/<?= $_GET['para2'] ?>.jpg" alt="<?= $item->name ?> photo" width="100" height="100">
	    </div>
		
	    <!-- name, [descrption,] [size,] price -->
	    <div class="col-md-6">
	        <h2 style="color: #CC6699"><strong><?= $item->name ?></strong></h2>
		  
		<?php if (isset($item->description)): ?>
		    <p><?= $item->description ?></p>
		<?php endif ?>
		<br>
		<ul class="align">
		    <?php foreach ($item->price as $price): ?>

		        <?php if (isset($price['size'])): ?>
			    <li><?= $price['size'] ?>:&nbsp&nbsp&nbsp<span>$<?= $price ?></span></li>
			<?php else: ?>
			    <li>$<?= $price ?></li>
			<?php endif ?>

		    <?php endforeach ?>
		</ul>
	    </div>
		
	    <!--size, quantity, submit-->
	    <div class="col-md-4">
	        <?php load_html('order_form', ['item' => $item]) ?>
	    </div>
		
	</div><!-- row -->
