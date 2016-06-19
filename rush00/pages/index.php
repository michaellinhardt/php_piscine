<?php
$aProducts = $aData['product'];
$cat = (isset($_GET['cat']) && (isset($aData['category'][intval($_GET['cat'])]))) ? intval($_GET['cat']) : NULL;
$catlink = ($cat === NULL) ? '' : '&cat=' . $cat;
if (isset($_GET['add']) && isset($aProducts[(intval($_GET['add']))]))
{
	$aData = addPanier($aData, intval($_GET['add']));
	$aProducts = $aData['product'];
}
if (isset($_GET['del']) && isset($aProducts[(intval($_GET['del']))]))
{
	$aData = delPanier($aData, intval($_GET['del']));
	$aProducts = $aData['product'];
}
if (isset($_GET['close']) && count($_SESSION['panier']['list']) > 0)
	$aData = closePanier($aData);
?>
<div class="page_title">Liste des produits</div>
<p class="cat">Catégorie: <a href="./index.php">Aucune!</a>&nbsp;&nbsp;
<?php foreach( $aData['category'] as $iID => $sCat ) { ?>
	<a href="./index.php?cat=<?= $iID ?>"><?= $sCat ?></a>,&nbsp;
<?php } ?>
</p>
<div id="product_content">
	<div id="product_list">
	<?php foreach( $aProducts as $iID => $aProduct )
	 	if ((isset($cat) && isset($aProduct['cat'][$cat])) || !isset($cat)) { ?>
		<div class="product">
			<div class="product_center">
				<p class="title"><?= $aProduct['name'] ?></p>
				<img src="<?= $aProduct['pics_crop'] ?>" />
				<p class="qte">Qte: <?= $aProduct['stock'] ?></p>
				<p class="qte">Prix: <?= $aProduct['prix'] ?></p>
				<p class="description"><?= $aProduct['description'] ?></p>
				<div class="product_btn">
					<a class="btn btn-s" href="./index.php?add=<?= $iID . $catlink ?>" class="product_add">&nbsp;&nbsp;&nbsp;➕&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
					<a class="btn btn-s" href="./index.php?del=<?= $iID . $catlink ?>" class="product_del">&nbsp;&nbsp;&nbsp;➖&nbsp;&nbsp;&nbsp;</a>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<div id="panier">
		<div class="page_title">Votre panier</div><br />
		<?php if (count($_SESSION['panier']['list']) == 0)
			echo 'Panier vide..';
		else { ?>
		<table class="table">
			<thead>
				<tr>
					<th class='small'>Img</th>
					<th class='small'>Qte</th>
					<th>Name</th>
					<th>Prix</th>
					<th class='small'>&nbsp;</th>
					<th class='small'>&nbsp;</th>
				</tr>
			</thead>
				<?php
				foreach( $_SESSION['panier']['list'] as $iID => $iQte )
				{
					$aItem = $aData['product'][$iID];
					$sImg = '<img src="'.$aItem['pics_cart'].'" />';
					$sMore ='<a class="btn btn-s" href="./index.php?add='.$iID.$catlink.'" class="product_add">&nbsp;➕&nbsp;</a>';
					$sLess ='<a class="btn btn-s" href="./index.php?del='.$iID.$catlink.'" class="product_del">&nbsp;➖&nbsp;</a>';
					echo "<td>".$sImg."</td><td>".$iQte."</td><td>".$aItem['name']."</td><td>".$aItem['prix']."</td><td>".$sMore."</td><td>".$sLess."</td></tr>";
				}
				?>
			<tbody>
			</tbody>
		</table>
		<p>Cout total: <?= $_SESSION['panier']['total'] ?>e</p>
		<?php } if (count($_SESSION['panier']['list']) > 0 && $_SESSION['id_members'] > -1) { ?>
			<a class="btn btn-s btn-blue panier_close" href="./index.php?close=1">Valider le panier</a>
		<?php } ?>
	</div>
	<hr class="clear" />
</div>
