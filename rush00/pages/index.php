<?php
$aProducts = $aData['product'];
?>
<div class="page_title">Liste des produits</div>
<div id="product_content">
	<div id="product_list">
	<?php foreach( $aProducts as $iID => $aProduct ) { ?>
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
