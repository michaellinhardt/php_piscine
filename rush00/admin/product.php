<?php
if (isset($_GET['d']) && is_numeric($_GET['d']) && isset($aData['product'][intval($_GET['d'])]))
	$aData = delProduct( $aData, intval($_GET['d']) );
$aProducts = $aData['product'];
?>
<div class="page_title">Liste des produits</div>
<div class="page">
	<a class="btn btn-s btn-blue" href="./admin.php?p=product_new">NOUVEAU PRODUIT</a>
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
			foreach( $aProducts as $iID => $aProduct )
			{
				$sDel = '<a href="./admin.php?p=product&d='.$iID.'">  ❌ </a>';
				$sMod = '<a href="./admin.php?p=product_mod&id='.$iID.'">  📝 </a>';
				$sCat = '<a href="./admin.php?p=product_cat&id='.$iID.'">  👜 </a>';
				echo "<tr><td>".$iID."</td><td><img src='".$aProduct['pics_cart']."' /></td><td>".$aProduct['stock']."</td>";;
				echo "<td>".$aProduct['name']."</td><td>".$aProduct['description']."</td><td>".$sCat."</td><td>".$sMod."</td><td>".$sDel."</td></tr>";
			}
			?>
		<tbody>
		</tbody>
	</table>
</div>
