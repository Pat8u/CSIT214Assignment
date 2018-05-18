<?php
require 'sqlinfo.php';
session_start();
session_unset();
session_destroy();
echo "Logged out!\n";
header("Location:index.html");
exit;
?>