<?php  
	/**
	*	@var array $data - массив новостей
	**/
?>

<h2>Новости</h2>

<div class="news-block container">
	<?php foreach ($data as $item): ?>
		<div class="news-item" style="border: 1px solid black">
			<div class="title">
				<span><?= $item['title']; ?></span>
			</div>

			<div class="description">
				<span><?= $item['description']; ?></span>
			</div>

			<div>
				<!-- <a href="/item/<?= $item['id'] ?>">Link on one news</a> -->
				<a href="/item?id=<?= $item['id'] ?>">Link on one news</a>
			</div>
		</div>
	<?php endforeach ?>
</div>	