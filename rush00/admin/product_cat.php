<?php
$aProducts = $aData['product'];
if (!isset($_GET['id']) || !isset($aProducts[intval($_GET['id'])]) || !is_numeric($_GET['id']))
	redirectHtml("./admin.php?p=product");
if (isset($_GET['add']) && is_numeric($_GET['add']) && !isset($aProducts[intval($_GET['id'])]['cat'][intval($_GET['add'])]))
{
	$aData = addCatProduct($aData, intval($_GET['id']), intval($_GET['add']));
	$aProducts = $aData['product'];
}
if (isset($_GET['del']) && is_numeric($_GET['del']) && isset($aProducts[intval($_GET['id'])]['cat'][intval($_GET['del'])]))
{
	$aData = delCatProduct($aData, intval($_GET['id']), intval($_GET['del']));
	$aProducts = $aData['product'];
}
$aProduct = $aProducts[intval($_GET['id'])];
if (!isset($aProduct['cat']))
	$aProduct['cat'] = array();
$aCatProduct = $aProduct['cat'];
$aCat = $aData['category'];
?>
<div class="page_title">Catégorie du produit</div>
<div class="page">
	<h4>Produit:</h4>
	<table class="table">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th class='small'>Img</th>
				<th class='small'>Stock</th>
				<th>Name</th>
				<th>Description</th>
				<th class='small'>&nbsp;</th>
				<th class='small'>&nbsp;</th>
				<th class='small'>&nbsp;</th>
			</tr>
		</thead>
			<?php
				echo "<tr><td>".intval($_GET['id'])."</td><td><img src='".$aProduct['pics_cart']."' /></td><td>".$aProduct['stock']."</td>";;
				echo "<td>".$aProduct['name']."</td><td>".$aProduct['description']."</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
			?>
		<tbody>
		</tbody>
	</table>
	<h4>Catégorie actuel:</h4>
	<table class="table" id ="cat_product">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th>Nom</th>
			</tr>
		</thead>
			<?php foreach ($aCatProduct as $iID => $sName) {
				echo "<tr><td>".$iID."</td><td><a href='./admin.php?id=".intval($_GET['id'])."&p=product_cat&del=".$iID."'>".$sName."</a></td></tr>";
			} ?>
		<tbody>
		</tbody>
	</table>
	<h4>Catégorie disponible:</h4>
	<table class="table" id ="cat_dispo">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th>Nom</th>
			</tr>
		</thead>
			<?php foreach ($aCat as $iID => $sName) {
				if (!isset($aCatProduct[$iID]))
					echo "<tr><td>".$iID."</td><td><a href='./admin.php?id=".intval($_GET['id'])."&p=product_cat&add=".$iID."'>".$sName."</a></td></tr>";
			} ?>
		<tbody>
		</tbody>
	</table>
</div>
