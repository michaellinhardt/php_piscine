p<?php
session_start();
include './functions.php';
if (is_file('./install_lock'))
	redirectHtml("./index.php");
include './layout/install_header.php';
include './admin/install.php';
include './layout/install_footer.php';
?>
