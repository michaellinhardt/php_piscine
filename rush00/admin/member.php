<?php
if (isset($_GET['d']) && is_numeric($_GET['d']) && $_GET['d'] != '0' && isset($aData['members'][intval($_GET['d'])]))
	$aData = delMember( $aData, intval($_GET['d']) );
$aMembers = $aData['members'];
?>

<div class="page_title">Liste des membres</div>
<div class="page">
	<a class="btn btn-s btn-blue" href="./admin.php?p=member_new">NOUVEAU MEMBRE</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Login</th>
				<th>Password</th>
				<th>Mail</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
			<?php
			foreach( $aMembers as $iID => $aMember )
			{
				$sDel = '<a href="./admin.php?p=member&d='.$iID.'">  ❌ </a>';
				echo "<tr><td>".$iID."</td><td>".$aMember['login']."</td><td> *** </td><td>".$aMember['mail']."</td><td> 🗒 </td><td>".$sDel."</td></tr>";
			}
			?>
		<tbody>
		</tbody>
	</table>
</div>
