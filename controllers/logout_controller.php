<?php
declare(strict_types=1);
session_start();

unset($_SESSION['auth']);

echo"<script language=\"JavaScript\">document.location.href=\"index.php?page=homepage\" </script>";