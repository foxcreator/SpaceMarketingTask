<?php require 'header.php'?>

<h1>Добавить лид</h1>
<form action="/submit_lead" method="POST">
	<label>First Name: <input type="text" name="firstName" required></label><br>
	<label>Last Name: <input type="text" name="lastName" required></label><br>
	<label>Phone: <input type="text" name="phone" required></label><br>
	<label>Email: <input type="email" name="email" required></label><br>
	<button type="submit">Отправить</button>
</form>

<br><a href="/leads">Посмотреть статусы лидов</a>

<?php require 'footer.php'?>

