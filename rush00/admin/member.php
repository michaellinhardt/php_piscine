<?php
$aMembers = $aData['members'];
?>

<div class="page_title">Liste des membres</div>
<div class="page">
	<table class="table" id="box-table-a">
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
				echo "<tr><td>".$iID."</td><td>".$aMember['login']."</td><td> *** </td><td>".$aMember['mail']."</td><td> 🗒 </td><td> ❌ </td></tr>";
			?>
		<tbody>
		</tbody>
	</table>
</div>
