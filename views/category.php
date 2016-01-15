	<div class="col-md-9 order-format">
		<?php
			foreach ($items as $item) {
				load_html('item', ['item' => $item]);
			}
		?>	
	</div> <!-- col-md-9 -->
  </div> <!--row-->
</div> <!--container-->
