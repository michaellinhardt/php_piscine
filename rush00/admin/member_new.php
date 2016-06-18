<?php
$aMembers = $aData['members'];
if (isset($_POST['submit']))
{
	if ($_POST['login'] == "" || $_POST['passwd'] == "" || $_POST['mail'] == "")
		$sMsg = "Vous devez remplir tout les champs..";
	else if (isMember($aMembers, $_POST['login']))
		$sMsg = "Ce login existe déjà..";
	else if (!addMember($aData, $_POST['login'], $_POST['passwd'], $_POST['mail'], 0))
		$sMsg = "Problème durant l'ajout du membre..";
	else
	{
		$sMsg = "Membre ajouté avec succès, vous allez être redirigé..";
		redirectHtml("./admin.php?p=member");
	}
}
?>

<div class="page_title">Ajout d'un nouveau membre</div>
<div class="page">
	<form class="form_member" method="post" action="./admin.php?p=member_new">
		<label>Login</label>
		<input type="text" size="20" name="login" id="login" placeholder="Login" required /><br />
		<label>Password</label>
		<input type="password" size="20" name="passwd" id="passwd" placeholder="Password" required /><br />
		<label>E-Mail</label>
		<input type="email" size="20" name="mail" id="mail" placeholder="E-mail" required /><br /><br />
		<input type="submit" name="submit" id="submit" class="btn btn-s btn-blue" value="VALIDER" />
	</form>
	<?php
		if (isset($sMsg))
			echo '<p>' . $sMsg . '</p>';
	 ?>
</div>
