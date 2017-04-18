<?php
if (!isset($_SESSION['valid_user'])) {
	header('Location: ?page=by-dev-authmain', true, 301);
	exit();
}
?>
