<?php
if (!isset($_SESSION['valid_user'])) {
	echo "window.location = \"page=by-dev-authmain\";"
}
?>
