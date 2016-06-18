<?php
$aMembers = $aData['members'];
if (!isset($_GET['id']) || !isset($aMembers[intval($_GET['id'])]) || !is_numeric($_GET['id']))
	redirectHtml("./admin.php?p=member");
if (isset($_POST['submit']))
{
	if ($_POST['passwd'] == "")
		$_POST['passwd'] = NULL;
	if ($_POST['login'] == "" || $_POST['mail'] == "")
		$sMsg = "Vous devez remplir tout les champs..";
	else if (!modMember($aData, intval($_GET['id']), $_POST['login'], $_POST['passwd'], $_POST['mail'], intval($_POST['admin'])))
		$sMsg = "Problème durant la modification du membre..";
	else
	{
		$sMsg = "Membre modifié avec succès, vous allez être redirigé..";
		redirectHtml("./admin.php?p=member");
	}
}
$aMember = $aMembers[intval($_GET['id'])];
?>

<div class="page_title">Modification d'un membre</div>
<div class="page">
	<form class="form_member" method="post" action="./admin.php?p=member_mod&id=<?= $_GET['id'] ?>">
		<label>Login</label>
		<input type="text" size="20" name="login" id="login" value="<?= $aMember['login'] ?>" required /><br />
		<label>Password</label>
		<input type="password" size="20" name="passwd" id="passwd" value="" /><br />
		<label>E-Mail</label>
		<input type="email" size="20" name="mail" id="mail" value="<?= $aMember['mail'] ?>" required /><br />
		<label>Admin</label>
		<select name="admin" id="admin">
			<option value="0" <?php if ($aMember['admin'] == 0) echo ' selected="selected"'; ?>>Non</option>
			<option value="1" <?php if ($aMember['admin'] == 1) echo ' selected="selected"'; ?>>Oui</option>
		</select><br /><br />
		<input type="submit" name="submit" id="submit" class="btn btn-s btn-blue" value="VALIDER" />
	</form>
	<?php
		if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>';
	 ?>
</div>
