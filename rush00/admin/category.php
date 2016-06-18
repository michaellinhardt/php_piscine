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
		$sMsg = "Problème durant l'ajout de la catégorie..";
	else
	{
		$sMsg = "Ajouté avec succès.";
		$aCat = $aData['category'];
	}
}
?>
<div class="page_title">Liste des catégorie</div>
<div class="page">
	<form id="form_category" class="form" method="post" action="./admin.php?p=category">
		<input type="submit" name="add_cat" id="add_cat" class="btn btn-s btn-blue" value="Ajouter" />
		<input type="text" size="50" name="name" id="name" value="" placeholder="Nom de la nouvelle catégorie" />
	</form>
	<?php if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>'; ?>
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
