<?php
$aCarts = $aData['panier'];
?>
<div class="page_title">Liste des panier validé</div>
<div class="page">
	<table class="table">
		<thead>
			<tr>
				<th class='small'>ID</th>
				<th class='small'>Validation</th>
				<th>Nombre d'article</th>
				<th>Prix total</th>
				<th>Propriétaire</th>
				<th class='small'>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ( $aCarts as $iID => $aCart )
		{
			$sView = '<a href="./admin.php?p=panier_view&id='.$iID.'">  🖨 </a>';
			$iPrice = $aCart['total'];
			$sOwner = $aData['members'][($aCart['owner'])]['login'];
			$iNb = 0;
			foreach( $aCart['list'] as $iQte )
				$iNb += $iQte;
			echo '<tr><td>'.$iID.'</td><td>'.$aCart['date'].'</td><td>'.$iNb.'</td><td>'.$iPrice.'</td><td>'.$sOwner.'</td><td>'.$sView.'</td></tr>';
		} ?>
		</tbody>
	</table>
</div>
