


<div class="container">
  <div class="row">
	  <div class="col-md-2 nav-format">
		  <div class="btn-group-vertical">
			<?php foreach ($categories as $category): ?>
				<a href="<?= $category->url ?>" class="btn btn-success btn-md<?= ($title == $category->title) ? ' current-cat' : '' ?>" style="font-size: 16px; text-align: left">
					<strong><?= $category->title ?></strong>
				</a>
			<?php endforeach ?>
		  </div>
	  </div> <!-- end of col-md-2 -->


