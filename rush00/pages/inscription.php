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
		$iNewID = -1;
		foreach( $aData['members'] as $iID => $aOsef )
			$iNewID = $iID;
		$_SESSION['panier']['owned'] = $iNewID;
		$_SESSION['id_members'] = $iNewID;
		$sMsg = "Inscription réalisé avec success";
		redirectHtml("./index.php");
	}
}
?>

<div class="page_title">Nouveau membre</div>
<div class="page">
	<form class="form_member" method="post" action="./index.php?p=inscription">
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
			echo '<p class="msg">' . $sMsg . '</p>';
	 ?>
</div>
