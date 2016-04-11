<?php
// user.php
// add user
require_once dirname(__FILE__) . '/../init.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>add user</title>
</head>
<body>

<form action="./confirm.php" method="post">
name: <input name="name" type="text"><br>
password: <input name="password" type="password"><br>
confirm: <input name="password_confirm" type="password"><br>
address: <input name="name" type="text"><br>
phone: <input name="phone" type="text"><br>
email: <input name="email" type="text"><br>
<button type="submit">register</button>
</form>

<a href="../index.php">back to login</a>

</body>
</html>