<?php require_once dirname(__FILE__) . '/init.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

<h2>login</h2>
<form action="./check_login.php" method="post">
name: <input name="name" type="text"><br>
password: <input name="password" type="password"><br>
<button type="submit">login</button>
</form>

<a href="./users/add.php">register</a>

</body>
</html>