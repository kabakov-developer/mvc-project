<div class="container">
	<h2>Новость</h2>

	<div class="news-block">
		<form method="post" action="<?php $_PHP_SELF ?>">
			<div class="news-item" style="border: 1px solid black">
				<div class="title">
					<span><?= $data['title']; ?></span>
				</div>

				<div class="description">
					<span><?= $data['description']; ?></span>
				</div>
				   <input name="delete" type="submit" id="delete" value="Delete">
			</div>
		</form>
	</div>	
</div>