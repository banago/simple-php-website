<?php
if (!isset($_SESSION['valid_user'])) {
    Header('Location: ?page=by-dev-authmain');
}
?>
