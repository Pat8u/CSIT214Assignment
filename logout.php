<?php
require 'sqlinfo.php';
session_start();
session_unset();
session_destroy();
echo 'Successfully logged out. To go back to home page, click <a href = "/">here</a>.';
exit;
?>
