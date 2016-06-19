<?php
$aProducts = $aData['product'];
if (isset($_POST['submit']))
{
	$sFolder = $aData['settings']['path_img'];
	$sRef = strtoupper(dechex(rand( 1000000000, 9000000000 )) . count($aProducts));
	$aExt = explode("/", $_FILES['pics']['type']);
	$sFile = $sFolder . $sRef . '.' . $aExt[1];
	if (($_POST['name'] = trim($_POST['name'])) == "" || ($_POST['description'] = trim($_POST['description'])) == ""
	|| !is_numeric($_POST['stock']) || !is_numeric($_POST['prix']) || !isset($_FILES['pics']))
		$sMsg = "Tous les champs doivent être remplis et valide..";
	else if ($aExt[1] != 'jpeg')
		$sMsg = "Fichier Jpeg uniquement pour les images..";
	else if (isProduct($aProducts, $_POST['name']))
		$sMsg = "Ce produit existe déjà..";
	else if (!(move_uploaded_file($_FILES['pics']['tmp_name'], $sFile)))
		$sMsg = "Impossible de télécharger la photo..";
	else
	{
		$sFileCrop = $sFolder . $sRef . '_croped.' . $aExt[1];
		$sFileCart = $sFolder . $sRef . '_cart.' . $aExt[1];
		copy($sFile, $sFileCrop);
		copy($sFile, $sFileCart);
		resizeImage($sFileCrop, $aData['setting']['crop_x'], $aData['setting']['crop_y']);
		resizeImage($sFileCart, $aData['setting']['cart_x'], $aData['setting']['cart_y']);
		$aNewProduct['name'] = $_POST['name'];
		$aNewProduct['description'] = $_POST['description'];
		$aNewProduct['stock'] = intval($_POST['stock']);
		$aNewProduct['prix'] = intval($_POST['prix']);
		$aNewProduct['pics'] = $sFile;
		$aNewProduct['pics_crop'] = $sFileCrop;
		$aNewProduct['pics_cart'] = $sFileCart;
		addProduct($aData, $aNewProduct);
		redirectHtml("./admin.php?p=product");
	}
}
?>

<div class="page_title">Ajout d'un nouveau produit</div>
<div class="page">
	<form class="form_member" method="post" action="./admin.php?p=product_new" enctype="multipart/form-data">
		<label>Nom</label>
		<input type="text" size="20" name="name" id="name" placeholder="Nom du produit" required /><br />
		<label>Description</label>
		<input type="text" size="20" name="description" id="description" placeholder="Description du produit" required /><br />
		<label>Prix</label>
		<input type="text" size="20" name="prix" id="prix" placeholder="Quantitée en stock" required /><br />
		<label>Stock</label>
		<input type="text" size="20" name="stock" id="stock" placeholder="Quantitée en stock" required /><br />
		<label>Image</label>
		<input required id="pics" name="pics" type="file"  />
		<input type="submit" name="submit" id="submit" class="btn btn-s btn-blue" value="VALIDER" />
	</form>
	<?php
		if (isset($sMsg))
			echo '<p class="msg">' . $sMsg . '</p>';
	 ?>
</div>
