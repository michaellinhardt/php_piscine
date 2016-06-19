<?php
$aCat = $aData['category'];
if (isset($_POST['add_cat']))
{
	$sMsg = "Nouvelle catégorie: ";
	if (($_POST['name'] = trim($_POST['name'])) == "")
		$sMsg .= "Vous devez remplir tout les champs..";
	else if (isCat($aCat, $_POST['name']))
		$sMsg .= "Cette catégorie existe déjà..";
	else if (!($aData = addCat($aData, $_POST['name'])))
		$sMsg .= "Problème durant l'ajout de la catégorie..";
	else
	{
		$sMsg .= "Ajouté avec succès.";
		$aCat = $aData['category'];
	}
}
if (isset($_POST['mod_cat']) && isset($aCat[intval($_GET['m'])]))
{
	$sMsg = "Modification de catégorie: ";
	if (($_POST['name'] = trim($_POST['name'])) == "")
		$sMsg .= "Vous devez remplir tous les champs..";
	else if (isCat($aCat, $_POST['name']))
		$sMsg .= "Cette catégorie existe déjà..";
	else if (!($aData = modCat($aData, intval($_GET['m']), $_POST['name'])))
		$sMsg .= "Problème durant la modification de la catégorie..";
	else
	{
		$sMsg .= "Modification avec succès.";
		$aCat = $aData['category'];
	}
}
if (isset($_GET['d']))
{
	$sMsg2 = "Suppression catégorie: ";
	if (!is_numeric($_GET['d']) || !isset($aCat[intval($_GET['d'])]))
		$sMsg2 .= "Impossible de supprimer la catégorie ?!";
	else if (!($aData = delCat($aData, intval($_GET['d']))))
		$sMsg .= "Problème durant la suppression..";
	else
	{
		$sMsg2 .= "Supprimé avec succès.";
		$aCat = $aData['category'];
	}
}
if (isset($_GET['m']) && is_numeric($_GET['m']) && isset($aCat[intval($_GET['m'])]) && !isset($_POST['mod_cat']))
{
	$sMsg3 = '<form class="form form2" method="post" action="./admin.php?p=category&m='.intval($_GET['m']).'">';
	$sMsg3 .= '<input type="submit" name="mod_cat" id="mod_cat" class="btn btn-s btn-blue" value="Modifier" />';
	$sMsg3 .= '<input type="text" size="50" name="name" id="name" value="'.$aCat[intval($_GET['m'])].'" />';
	$sMsg3 .= '</form>';
}
?>
<div class="page_title">Liste des catégorie</div>
<div class="page">
	<form class="form form2" method="post" action="./admin.php?p=category">
		<input type="submit" name="add_cat" id="add_cat" class="btn btn-s btn-blue" value="Ajouter" />
		<input type="text" size="50" name="name" id="name" value="" placeholder="Nom de la nouvelle catégorie" />
	</form>
	<?php if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>';
		if (isset($sMsg2))
				echo '<p class="msg">' . $sMsg2 . '</p>';
		if (isset($sMsg3))
				echo $sMsg3; ?>
	<table class="table">
		<thead>
			<tr>
				<th class='small'>&nbsp;</th>
				<th class='small'>&nbsp;</th>
				<th class='small'>ID</th>
				<th>Nom</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ( $aCat as $iID => $sName )
		{
			$sDel = '<a href="./admin.php?p=category&d='.$iID.'">  ❌ </a>';
			$sMod = '<a href="./admin.php?p=category&m='.$iID.'">  📝 </a>';
			echo '<tr><td>'.$sDel.'</td><td>'.$sMod.'</td><td>'.$iID.'</td><td>'.$sName.'</td></tr>';
		} ?>
		</tbody>
	</table>
</div>
