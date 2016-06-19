<?php
$aProducts = $aData['product'];
?>
<div class="page_title">Liste des produits</div>
<div class="page">
	<a class="btn btn-s btn-blue" href="./admin.php?p=product_new">NOUVEAU PRODUIT</a>
	<table class="table">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th>Img</th>
				<th>Name</th>
				<th>Description</th>
				<th>Stock</th>
				<th class='small'>&nbsp;</th>
				<th class='small'>&nbsp;</th>
			</tr>
		</thead>
			<?php
			foreach( $aProducts as $iID => $aProduct )
			{
				$sDel = '<a href="./admin.php?p=product&d='.$iID.'">  ❌ </a>';
				$sMod = '<a href="./admin.php?p=product_mod&id='.$iID.'">  📝 </a>';
				echo "<tr><td>".$iID."</td><td>".$aProduct['img']."</td><td> *** </td><td>".$aProduct['mail']."</td><td>".$sAdmin."</td><td>".$sMod."</td><td>".$sDel."</td></tr>";
			}
			?>
		<tbody>
		</tbody>
	</table>
</div>
