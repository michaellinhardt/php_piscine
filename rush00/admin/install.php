<?php
$aData = array();

$aData['members'] = array();
$passwd = hash('whirlpool', "admin");
$aData['members'][0] = array( "login" => "admin", "passwd" => $passwd, "mail" => "admin@admin.com", "admin" => 1);

$aData['category'] = array();
$aData['product'] = array();
$aData['panier'] = array();

$aData['settings'] = array();
$aData['settings']['path_data'] = './data';
$aData['settings']['site_title'] = 'Presta-Shop';

$aData['settings']['path_img'] = './product_img/';
if (!is_dir($aData['settings']['path_img']))
	mkdir($aData['settings']['path_img'], 0777);

$aData['setting']['crop_x'] = 150;
$aData['setting']['crop_y'] = 150;
$aData['setting']['cart_x'] = 75;
$aData['setting']['cart_y'] = 75;

if (isset($_POST['submit']))
{
	if (($_POST['title'] = trim($_POST['title'])) == ""
	|| ($_POST['login'] = trim($_POST['login'])) == ""
	|| ($_POST['passwd'] = trim($_POST['passwd'])) == ""
	|| ($_POST['passwd2'] = trim($_POST['passwd2'])) == ""
	|| ($_POST['mail'] = trim($_POST['mail'])) == "")
		$sMsg = "Veuillez remplir tous les champs..";
	else if ($_POST['passwd'] != $_POST['passwd2'])
		$sMsg = "Les deux password ne correspondent pas..";
	else
	{
		$passwd = hash('whirlpool', $_POST['passwd']);
		$aData['members'][0] = array( "login" => $_POST['login'], "passwd" => $passwd, "mail" => $_POST['mail'], "admin" => 1);
		$aData['settings']['site_title'] = $_POST['title'];
		file_put_contents("./install_lock", date("d.m.Y"));
		file_put_contents("./data", serialize($aData));
		redirectHtml("./index.php");
	}
}

// file_put_contents("./data", serialize($aData));
?>

<div class="page_title">Paramêtre de votre boutique en ligne</div>
<div class="page">
	<form class="form_member" method="post" action="./install.php">
		<label>Titre du site</label>
		<input type="text" size="20" name="title" id="title" placeholder="Titre du site" required value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" /><br />
		<label>Login admin</label>
		<input type="text" size="20" name="login" id="login" placeholder="Login admin" required value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" /><br />
		<label>Password admin</label>
		<input type="password" size="20" name="passwd" id="passwd" placeholder="Password admin" required /><br />
		<label>Password admin (verif)</label>
		<input type="password" size="20" name="passwd2" id="passwd2" placeholder="Password verif" required /><br />
		<label>E-Mail admin</label>
		<input type="email" size="20" name="mail" id="mail" placeholder="E-mail admin" required value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>" /><br /><br />
		<input type="submit" name="submit" id="submit" class="btn btn-s btn-blue" value="VALIDER" />
	</form>
	<?php
		if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>';
	 ?>
</div>
