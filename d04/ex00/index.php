<?php
session_start();
if ($_GET['submit'] == "OK" && isset($_GET['login']))
	$_SESSION['login'] = $_GET['login'];
if ($_GET['submit'] == "OK" && isset($_GET['passwd']))
	$_SESSION['passwd'] = $_GET['passwd'];
?>
<form method="GET" action="./index.php">
	Identifiant: <input type="text" name="login" id="login" value="<?php if (isset($_SESSION['login'])) echo $_SESSION['login']; ?>" />
	<br />
	Mot de passe: <input type="password" name="passwd" id="passwd" value="<?php if (isset($_SESSION['passwd'])) echo $_SESSION['passwd']; ?>" />
	<br />
	<input type="submit" value="OK" name="submit" />
</form>
