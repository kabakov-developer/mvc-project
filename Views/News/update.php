<div class="container">
	<h2>Обновить новость</h2>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		<table border="1" width="50%" cellpadding="5" cellpadding="3">
			<tr>
				<td><input type="" name="title" value="<?= $data['title']; ?>"></td>
			</tr>
			<tr>
				<td>
					<textarea name="description" value="<?= $data['description']; ?>" placeholder="<?= $data['description']; ?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
		</table>
	</form>
</div>