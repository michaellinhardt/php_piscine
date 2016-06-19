<?php
$aProducts = $aData['product'];
$cat = (isset($_GET['cat']) && (isset($aData['category'][intval($_GET['cat'])]))) ? intval($_GET['cat']) : NULL;
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
				<p class="description"><?= $aProduct['description'] ?></p>
				<div class="product_btn">
					<a class="btn btn-s" href="./index.php?add=<?= $iID ?>" class="product_add" />&nbsp;&nbsp;&nbsp;➕&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
					<a class="btn btn-s" href="./index.php?add=<?= $iID ?>" class="product_del" />&nbsp;&nbsp;&nbsp;➖&nbsp;&nbsp;&nbsp;</a>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<div id="panier">
		<div class="page_title">Votre panier</div>
		blabla
	</div>
	<hr class="clear" />
</div>
