<?php
$aProducts = $aData['product'];
if (!isset($_GET['id']) || !isset($aProducts[intval($_GET['id'])]) || !is_numeric($_GET['id']))
	redirectHtml("./admin.php?p=product");
$aProduct = $aProducts[intval($_GET['id'])];
if (isset($_POST['submit']))
{
	$aExt[1] = 'jpeg';
	if (isset($_FILES['pics']) && $_FILES['pics']['name'] == "")
		unset($_FILES['pics']);
	else if (isset($_FILES['pics']))
	{
		$sFolder = $aData['settings']['path_img'];
		$sRef = strtoupper(dechex(rand( 1000000000, 9000000000 )) . count($aProducts));
		$aExt = explode("/", $_FILES['pics']['type']);
		$sFile = $sFolder . $sRef . '.' . $aExt[1];
	}
	if (($_POST['name'] = trim($_POST['name'])) == "" || ($_POST['description'] = trim($_POST['description'])) == ""
	|| !is_numeric($_POST['stock']) || !is_numeric($_POST['prix']))
		$sMsg = "Vous devez remplir tout les champs..";
	else if ($aExt[1] != 'jpeg')
		$sMsg = "Fichier Jpeg uniquement pour les images..";
	else if (isProduct2($aProducts, intval($_GET['id']), $_POST['name']))
		$sMsg = "Ce produit existe déjà..";
	else if (isset($_FILES['pics']) && !(move_uploaded_file($_FILES['pics']['tmp_name'], $sFile)))
		$sMsg = "Impossible de télécharger la photo..";
	else
	{
		if (isset($_FILES['pics']))
		{
			unlink($aProduct['pics']);
			unlink($aProduct['pics_crop']);
			unlink($aProduct['pics_cart']);
			$sFileCrop = $sFolder . $sRef . '_croped.' . $aExt[1];
			$sFileCart = $sFolder . $sRef . '_cart.' . $aExt[1];
			copy($sFile, $sFileCrop);
			copy($sFile, $sFileCart);
			resizeImage($sFileCrop, $aData['setting']['crop_x'], $aData['setting']['crop_y']);
			resizeImage($sFileCart, $aData['setting']['cart_x'], $aData['setting']['cart_y']);
			$aData['product'][intval($_GET['id'])]['pics'] = $sFile;
			$aData['product'][intval($_GET['id'])]['pics_crop'] = $sFileCrop;
			$aData['product'][intval($_GET['id'])]['pics_cart'] = $sFileCart;
		}
		$aData['product'][intval($_GET['id'])]['name'] = $_POST['name'];
		$aData['product'][intval($_GET['id'])]['description'] = $_POST['description'];
		$aData['product'][intval($_GET['id'])]['stock'] = intval($_POST['stock']);
		$aData['product'][intval($_GET['id'])]['prix'] = intval($_POST['prix']);
		saveData($aData);
		$aProducts = $aData['product'];
		$aProduct = $aProducts[intval($_GET['id'])];
		redirectHtml("./admin.php?p=product");
	}
}
?>

<div class="page_title">Modification du produit</div>
<div class="page">
	<form class="form_member" method="post" action="./admin.php?id=<?= intval($_GET['id']) ?>&p=product_mod" enctype="multipart/form-data">
		<label>Nom</label>
		<input type="text" size="20" name="name" id="name" required value="<?= $aProduct['name']; ?>" /><br />
		<label>Description</label>
		<input type="text" size="20" name="description" id="description" required value="<?= $aProduct['description']; ?>" /><br />
		<label>Prix</label>
		<input type="text" size="20" name="prix" id="prix" required value="<?= $aProduct['prix']; ?>" /><br />
		<label>Stock</label>
		<input type="text" size="20" name="stock" id="stock" required value="<?= $aProduct['stock']; ?>" /><br />
		<label>Image</label>
		<input id="pics" name="pics" type="file"  />
		<input type="submit" name="submit" id="submit" class="btn btn-s btn-blue" value="VALIDER" />
	</form>
	<?php
		if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>';
	 ?>
</div>
