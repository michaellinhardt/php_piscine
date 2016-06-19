<?php
$aCarts = $aData['panier'];
if (!isset($_GET['id']) || !isset($aCarts[intval($_GET['id'])]) || !is_numeric($_GET['id']))
	redirectHtml("./admin.php?p=panier");
$aProducts = array();
foreach( $aData['panier'][(intval($_GET['id']))]['list'] as $iIDProduct => $iQte )
{
	$aProducts[$iIDProduct] = $aData['product'][$iIDProduct];
	$aProducts[$iIDProduct]['stock'] = $iQte;
}
?>
<div class="page_title">Liste des produits du panier</div>
<div class="page">
	<table class="table">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th class='small'>Img</th>
				<th class='small'>Qte</th>
				<th>Name</th>
				<th>Prix</th>
				<th>Description</th>
			</tr>
		</thead>
			<?php
			foreach( $aProducts as $iID => $aProduct )
			{
				echo "<tr><td>".$iID."</td><td><img src='".$aProduct['pics_cart']."' /></td><td>".$aProduct['stock']."</td>";
				echo "<td>".$aProduct['name']."</td><td>".$aProduct['prix']."</td><td>".$aProduct['description']."</td></tr>";
			}
			?>
		<tbody>
		</tbody>
	</table>
</div>
