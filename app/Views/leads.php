<?php require 'header.php'?>
<h1>Статусы лидов</h1>

<form method="GET" action="/leads">
	<label>Дата от: <input type="date" name="start_date"></label>
	<label>Дата до: <input type="date" name="end_date"></label>
	<button type="submit">Фильтровать</button>
</form>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Status</th>
		<th>FTD</th>
	</tr>

	<?php if (!empty($leads)): ?>
		<?php foreach ($leads as $lead): ?>
			<tr>
				<td><?= $lead['id'] ?></td>
				<td><?= $lead['email'] ?></td>
				<td><?= $lead['status'] ?></td>
				<td><?= $lead['ftd'] ?></td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="4">Нет данных</td></tr>
	<?php endif; ?>
</table>
<?php require 'footer.php'?>
