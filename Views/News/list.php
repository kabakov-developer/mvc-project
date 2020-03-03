<?php  
	/**
	*	@var array $data - массив новостей
	**/
?>
<div class="container">
	<h2>Новости</h2>
</div>

<div class="news-block container">
	<table border="1" width="100%" cellpadding="5" cellpadding="3">
		<?php foreach ($data as $item): ?>
			<tr>
				<td><?= $item['title']; ?></td>
				<td><?= $item['description']; ?></td>
				<td align="center">
					<a href="/item?id=<?= $item['id'] ?>">View</a>
				</td>
				<td align="center">
					<a href="/update?id=<?= $item['id'] ?>">Update</a>
				</td>
				<td align="center">
					<a href="#">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>	